<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Google\Cloud\Firestore\FirestoreClient;
use Google\Cloud\Firestore\Query;
use Google\Cloud\Firestore\QuerySnapshot;
use Google\Cloud\Firestore\DocumentReference;
use Google\Cloud\Firestore\CollectionReference;
use Google\Cloud\Core\Timestamp;
use Kreait\Firebase\Firestore;
use Exception;
use Validator;
use Image;
use App\Models\User;
use App\Models\Customer;
use App\Models\Photographer;
use App\Models\Notification;
use App\Models\Booking;
use App\Models\Shoot_for;
use App\Models\Package_request;

class CustomerController extends Controller
{
    // customer regitser from website frontend
    public function customerregister(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();

            // dd($data);

            $usercount = User::where(['email'=>$data['email']])->count();

            if($usercount>0){               

                 return redirect()->back()->with('flash_message_error', 'Email Already Exist');

            }else{
                    
                $user = new User;
                $user->name = $data['first_name'].' '.$data['last_name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->is_active = 1;
                $user->save();
                $user->assignRole('customer');

                $userid = $user->id;

                $customer = new Customer;
                $customer->user_id = $userid;
                $customer->first_name = $data['first_name'];
                $customer->last_name = $data['last_name'];
                $customer->email = $data['email'];
                $customer->phone_code = $data['phone_code'];
                $customer->phone_number = $data['phone_number'];
                $customer->gender = $data['gender'];
                $customer->date_of_birth = $data['date_of_birth'];
                $customer->isactive = 1;

                if($request->hasFile('image')){

                    $image_tmp = $request->file('image');

                    if($image_tmp->isValid()){

                        $name = $image_tmp->getClientOriginalName();
                        $filename = 'customer'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/customer/');
                        $image_tmp->move($destinationPath, $filename);

                        $customer->image = $filename;
                    }
                }

                $customer->save();

                if ($user && $customer) {

                    return redirect()->back()->with('flash_message_success', 'Register Successfully!');

                }else{

                    return redirect()->back()->with('flash_message_error', 'Not Register Successfully!');

                }
                
            }

        }
    }

    // photographer login 
    public function customerlogin(Request $request){
        
        if($request->isMethod('post')){

            $data = $request->input();

            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'] ])){
                // Code: To set session
                /*
                Session::put('adminSession',$data['email']);
                */
                return redirect('/customer/index');

            }else{

                return redirect('/sign-in')->with('flash_message_error','Invalid E-mail or Password');

            }

        }
        
    }

    // customer logout
    public function customerlogout(){

        Auth::logout();

        return redirect('/sign-in')->with('flash_message_success','Logged Out Successfully');
    }

    // customer profile
    public function cusmoterprofile(){

        $user = Auth::user();
        $user_id = $user->id;

        $customer = Customer::where(['user_id'=>$user_id])->first();

        $shoot_fors = Shoot_for::where(['isactive'=>1])->orderBy('id','desc')->get();

        $packages = Package_request::where(['isactive'=>1])->orderBy('id','desc')->get();       

        return view('frontend.customer.index')->with(compact('customer', 'shoot_fors', 'packages'));

    }

    public function customerviewbooking(){

        $user = Auth::user();
        $user_id = $user->id;

        // counter query start
        $cur_date = date("Y-m-d");

        $ongoing_booking_count = Booking::where([ ['user_id', '=', $user_id], ['full_date', '=', $cur_date] ])->count();

        $upcoming_booking_count = Booking::where([ ['user_id', '=', $user_id], ['full_date', '<', $cur_date] ])->count();

        $complete_booking_count = Booking::where([ ['user_id', '=', $user_id], ['status', '=', "Completed"] ])->count();
        // counter query end

        // query for view attandance

        $ongoing_bookings = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_id', '=', $user_id], ['b.full_date', '=', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $upcoming_bookings = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_id', '=', $user_id], ['b.full_date', '>', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $complete_bookings = DB::table('bookings as b')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['user_id', '=', $user_id], ['status', '=', "Completed"] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        return view('frontend.customer.view-bookings')->with(compact('ongoing_booking_count', 'upcoming_booking_count', 'complete_booking_count', 'ongoing_bookings', 'upcoming_bookings', 'complete_bookings'));

    }

    public function customermessage(){

        $user_id = Auth::user()->id;

        $firestore = new FirestoreClient([
            'projectId' => 'bookvr-9981a',
            'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
        ]);

        $getchatlist = $firestore->collection('chats')->documents();

        $users = User::get();

        return view('frontend.customer.messages')->with(compact('users', 'getchatlist'));

    }

    public function customernotification(){

        $user = Auth::user();
        $user_id = $user->id;

        $noti_count = Notification::where(['send_to'=> $user_id])->count();

        $count_nill = Notification::where(['send_to'=>$user_id])->update([
                'status' => 1,
            ]);

        $notifications = DB::table('notifications as n')
                        ->join('bookings as b', 'n.booking_id', '=', 'b.id')
                        ->select('n.*', 'b.status as booking_status')
                        ->where(['n.send_to'=>$user_id])
                        ->orderBy('n.id', 'desc')
                        ->get();

        return view('frontend.customer.notification')->with(compact('noti_count', 'notifications'));

    }

    public function customersettings(){

        $user = Auth::user();
        $user_id = $user->id;

        $customer = Customer::where(['user_id'=>$user_id])->first();

        return view('frontend.customer.settings')->with(compact('customer'));

    }

    public function customereditprofile(Request $request){

        $user = Auth::user();
        $user_id = $user->id;

        if($request->isMethod('post')){

            $data = $request->all();

            if($request->hasFile('image')){

                $image_tmp = $request->file('image');

                if($image_tmp->isValid()){

                    $name = $image_tmp->getClientOriginalName();
                    $filename = 'customer'.rand(1111,9999999).$name;
                    $destinationPath = public_path('/images/frontend-images/customer/');
                    $image_tmp->move($destinationPath, $filename);

                }

            }else{

                $filename = $data['current_image'];

            }

            User::where([ 'id'=>$user_id ])->update([
                'name' => $data['first_name']." ".$data['last_name'],
                'email' => $data['email'],
            ]);

            Customer::where([ 'user_id'=>$user_id ])->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_code' => $data['phone_code'],
                'phone_number' => $data['phone_number'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'image' => $filename
            ]);

            return redirect('/customer/settings')->with('flash_message_success','Profile Edit Successfully!');

        }

        $customer = Customer::where(['user_id'=>$user_id])->first();

        return view('frontend.customer.edit-profile')->with(compact('customer'));

    }

    public function customerchangepassword(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['currentPassword'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['newPassword']);
                // echo $password;
                // die;
                User::where('email',Auth::user()->email)->update(['password' => $password]);

                return redirect('/customer/settings')->with('flash_message_success','Password updated successfully');

            }else{

                return redirect()->back()->with('flash_message_error','Incorrect current password ');

            }

            //echo '<pre>'.print_r($data); die;
        }else{
            return view('frontend.customer.change-password');
        }

        return view('frontend.customer.change-password');

    }

	// show to admin panel
	public function viewcustomers()
    {
    	$customers = DB::table('customers as c')
                    ->join('users as u', 'c.user_id', '=', 'u.id')
                    ->select('c.*', 'u.name as userName')
                    ->orderBy('c.id', 'desc')
                    ->get();

    	return view('admin.customer.view-customer')->with(compact('customers'));

    }

    public function viewcustomerdetails($user_id)
    {
    	$customer = DB::table('customers as c')
                    ->join('users as u', 'c.user_id', '=', 'u.id')
                    ->select('c.*', 'u.name as userName')
                    ->where(['c.user_id'=>$user_id])
                    ->first();

    	return view('admin.customer.view-detail')->with(compact('customer'));

    }

    public function deletecustomer($user_id)
    {
    	if (!empty($user_id)){

			User::where(['id'=>$user_id])->delete();

			Customer::where(['user_id'=>$user_id])->delete();

            return redirect()->back()->with('flash_message_success','Customer Deleted Successfully!');

        }
    }


    // customer api part
    public function registerapi(Request $request)
    {

        $data = $request->all();

        if (!empty($data['email'])) {

            $usercount = User::where(['email'=>$data['email']])->count();

            if($usercount>0){               

                $out = array();

                $status = "E-mail already exists";

                $out[] = array("response"=>$status);

                return[ "code" => "201", "msg" => $out];

            }else{

                if (!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['email']) && !empty($data['password']) && !empty($data['phone_code']) && !empty($data['phone_number']) && !empty($data['gender']) && !empty($data['date_of_birth']) && !empty($data['image']) && !empty($data['confirm_password']) ) {
                    
                    $user = new User;
                    $user->name = $data['first_name'].' '.$data['last_name'];
                    $user->email = $data['email'];
                    $user->password = bcrypt($data['password']);
                    $user->is_active = 1;
                    $user->save();
                    $user->assignRole('customer');

                    $userid = $user->id;

                    $customer = new Customer;
                    $customer->user_id = $userid;
                    $customer->first_name = $data['first_name'];
                    $customer->last_name = $data['last_name'];
                    $customer->email = $data['email'];
                    $customer->phone_code = $data['phone_code'];
                    $customer->phone_number = $data['phone_number'];
                    $customer->gender = $data['gender'];
                    $customer->date_of_birth = $data['date_of_birth'];
                    $customer->isactive = 1;

                    if($request->hasFile('image')){

                        $image_tmp = $request->file('image');

                        if($image_tmp->isValid()){

                            $name = $image_tmp->getClientOriginalName();
                            $filename = 'customer'.rand(1111,9999999).$name;
                            $destinationPath = public_path('/images/frontend-images/customer/');
                            $image_tmp->move($destinationPath, $filename);

                            $customer->image = $filename;
                        }
                    }

                    $customer->save();

                    if ($user && $customer) {

                        $out = array();

                        $status = "customer registered successfully!";

                        $out[] = array("response"=>$status);

                        return[ "code" => "200", "msg" => $out];
                    }

                }else{

                    $out = array();

                    $status = "failed!";

                    $out[] = array(
                        "response"=>$status,
                    );

                    return[ "code" => "201", "msg" => $out];
                }
            }

        }else{
            $out = array();

            $status = "fields are required!";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];
        }  

    }

    public function loginwithgoogle(Request $request)
    {

        $data = $request->all();

        if (!empty($data['google_id'])) {

        	$login_user = User::where('google_id', $data['google_id'])->first();
     
	        if($login_user){

	            $token = $login_user->createToken('app-login-token')->plainTextToken;

	            $user = User::where(['id'=> $login_user->id])->with('roles')->first();

                $role_name = $user->roles->first()->name;

                $out = array();

                $status = $role_name." login"; 

                $customer = Customer::where(['user_id'=>$login_user->id])->first(); 

                if (!empty($customer->image)) {
                	$image = "https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image;
                } else {
                	$image = null;
                }
                                        

                $out[] = array(
                    "response"=>$status,
                    "user_id"=>$login_user->id,  
                    "first_name"=>$customer->first_name, 
                    "last_name"=>$customer->last_name,
                    "email"=>$customer->email, 
                    "phone_code"=>$customer->phone_code,
                    "phone_number"=>$customer->phone_number, 
                    "gender"=>$customer->gender,
                    "date_of_birth"=>$customer->date_of_birth,
                    "loyalty_points"=>$customer->loyalty_points, 
                    "image"=>$image,
                    "current_image"=>$customer->image,
                    "google_id"=>$login_user->google_id,
                );

	            return response()->json([ "code" => "200", "msg" => $out, "token" => $token]);
	 
	        }else{

	            // $newUser = User::create([
	            //     'name' => $data['name'],
	            //     'email' => $data['email'],
	            //     'google_id'=> $data['google_id'],
	            //     'password' => encrypt('test12345')
	            // ]);

	            $newUser = new User;
                $newUser->name = $data['name'];
                $newUser->email = $data['email'];
                $newUser->password = bcrypt('12345');
                $newUser->is_active = 1;
                $newUser->google_id = $data['google_id'];
				$newUser->save();
                $newUser->assignRole('customer');

        		$userid = $newUser->id;

        		$customer = new Customer;
        		$customer->user_id = $userid;
                $customer->first_name = $data['name'];
                $customer->email = $data['email'];
                $customer->isactive = 1;
                $customer->save();

	            $token = $newUser->createToken('app-login-token')->plainTextToken;

	            $user = User::where(['id'=> $newUser->id])->with('roles')->first();

                $role_name = $user->roles->first()->name;

                $status = $role_name." login";

                if (!empty($customer->image)) {
                	$image = "https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image;
                } else {
                	$image = null;
                }

	            $out = array();

	            $status = $role_name." login"; 

	            $out[] = array(
	                "response"=>$status,
                    "user_id"=>$newUser->id,  
                    "first_name"=>$customer->first_name, 
                    "last_name"=>$customer->last_name,
                    "email"=>$customer->email, 
                    "phone_code"=>$customer->phone_code,
                    "phone_number"=>$customer->phone_number, 
                    "gender"=>$customer->gender,
                    "date_of_birth"=>$customer->date_of_birth,
                    "loyalty_points"=>$customer->loyalty_points, 
                    "image"=>$image,
                    "current_image"=>$customer->image,
                    "google_id"=>$newUser->google_id,
	            );

	            return response()->json([ "code" => "200", "msg" => $out, "token" => $token]);
	            
	        } 

        }else{

        	$out = array();

	        $status = "google_id is missing!";

	        $out[] = array("response"=>$status);

	        return[ "code" => "201", "msg" => $out];

        }

    }

    public function editprofileapi(Request $request){

        $data = $request->all();

        if(!empty($data['email']) && !empty($data['first_name']) && !empty($data['last_name']) && !empty($data['user_id']) && !empty($data['phone_code']) && !empty($data['phone_number']) && !empty($data['gender']) && !empty($data['date_of_birth']) ){

            // $count = User::where(['email'=>$data['email']])->count();

            // if ($count > 0 ) {

                User::where([ 'id'=>$data['user_id'] ])->update([
                	'email' => $data['email'],
                ]);

                if($request->hasFile('image')){

	                $image_tmp = $request->file('image');

	                if($image_tmp->isValid()){

	                    $name = $image_tmp->getClientOriginalName();
                        $filename = 'customer'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/customer/');
    					$image_tmp->move($destinationPath, $filename);

	                }

	            }else{

	                $filename = $data['current_image'];

	            }

                User::where([ 'id'=>$data['user_id'] ])->update([
                	'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                ]);

                Customer::where([ 'user_id'=>$data['user_id'] ])->update([
                	'first_name' => $data['first_name'],
                	'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_code' => $data['phone_code'],
                	'phone_number' => $data['phone_number'],
                    'gender' => $data['gender'],
                    'date_of_birth' => $data['date_of_birth'],
                    'image' => $filename
                ]);

                $out = array();

		        $status = "profile updated!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "200", "msg" => $out];

          //   }else{

          //   	$out = array();

		        // $status = "email not match!";

		        // $out[] = array("response"=>$status);

		        // return[ "code" => "201", "msg" => $out];

          //   }

        }else{

            $out = array();

	        $status = "fields are required!";

	        $out[] = array("response"=>$status);

	        return[ "code" => "201", "msg" => $out];

        }
    }

    
}
