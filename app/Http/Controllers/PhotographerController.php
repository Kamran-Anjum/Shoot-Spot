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
use DateTime;
use App\Models\User;
use App\Models\Customer;
use App\Models\Photographer;
use App\Models\Photographer_project;
use App\Models\Project_images;
use App\Models\Booking;
use App\Models\Shoot_for;
use App\Models\Package_request;
use App\Models\Photography_equipment;
use App\Models\Spaces_photographed;

class PhotographerController extends Controller
{
    // photographer regitser from website frontend
    public function photographerregister(Request $request)
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
                $user->assignRole('photographer');

                $userid = $user->id;

                $photographer = new Photographer;
                $photographer->user_id = $userid;
                $photographer->first_name = $data['first_name'];
                $photographer->last_name = $data['last_name'];
                $photographer->email = $data['email'];
                $photographer->phone_code = $data['phone_code'];
                $photographer->phone_number = $data['phone_number'];
                $photographer->gender = $data['gender'];
                $photographer->date_of_birth = $data['date_of_birth'];
                $photographer->bio = $data['bio'];
                $photographer->address = $data['address'];
                $photographer->experience = $data['experience'];
                $photographer->equipment_id = $data['equipment_id'];
                $photographer->spaces_photograph_id = $data['spaces_photograph_id'];
                $photographer->equip_other_name = $data['equip_other_name'];
                $photographer->isactive = 1;

                if($request->hasFile('image')){

                    $image_tmp = $request->file('image');

                    if($image_tmp->isValid()){

                        $name = $image_tmp->getClientOriginalName();
                        $filename = 'photographer'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/photographer/');
                        $image_tmp->move($destinationPath, $filename);

                        $photographer->image = $filename;
                    }
                }

                $photographer->save();

                if ($user && $photographer) {

                    return redirect()->back()->with('flash_message_success', 'Register Successfully!');

                }else{

                    return redirect()->back()->with('flash_message_error', 'Not Register Successfully!');

                }
            }

        }
    }

    // photographer login 
    public function photographerlogin(Request $request){
        
        if($request->isMethod('post')){

            $data = $request->input();

            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'] ])){
                // Code: To set session
                /*
                Session::put('adminSession',$data['email']);
                */
                return redirect('/photographer/index');

            }else{

                return redirect('/sign-in')->with('flash_message_error','Invalid E-mail or Password');

            }

        }
        
    }

    // photographer logout
    public function photographerlogout(){

        Auth::logout();

        return redirect('/sign-in')->with('flash_message_success','Logged Out Successfully');
    }

    // photographer profile
    public function photographerprofile(){

        $user = Auth::user();
        $user_id = $user->id;

        $projects = Photographer_project::where(['user_id'=>$user_id])->orderBy('id','desc')->get();

        $projects_count = Photographer_project::where(['user_id'=>$user_id])->count();

        $project_images = DB::table('photographer_projects as pp')
                        ->join('project_images as pi', 'pp.id', '=', 'pi.photographer_project_id')
                        ->select('pp.user_id as user_id', 'pi.*')
                        ->where(['pp.user_id'=>$user_id])
                        ->orderBy('pp.id','desc')
                        ->get();

        return view('frontend.photographer.index')->with(compact('projects', 'projects_count', 'project_images'));

    }

    public function photographerprojectdetail($project_id)
    {

        $project_detail = DB::table('photographer_projects as pp')
                        ->join('shoot_fors as sf', 'pp.shoot_for_id', '=', 'sf.id')
                        ->select('pp.*','sf.name as shoot_for_name')
                        ->where(['pp.id'=>$project_id])
                        ->first();

        $project_images = Project_images::where(['photographer_project_id'=>$project_id])->get();

        $project_image_count = Project_images::where(['photographer_project_id'=>$project_id])->count();

        return view('frontend.photographer.view-project-details')->with(compact('project_detail', 'project_images', 'project_image_count'));

    }

    public function photographercreateprojectsweb(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        if($request->isMethod('post')){

            $data = $request->input();

            // dd($request->image);

            $photographer_project = new Photographer_project();
            $photographer_project->title = $data['title'];
            $photographer_project->location = $data['location'];
            $photographer_project->portfolio_link = $data['portfolio_link'];
            $photographer_project->description = $data['description'];
            $photographer_project->user_id = $user_id;
            $photographer_project->shoot_for_id  = $data['shoot_for_id'];
            $photographer_project->save();

            $p_p_id = $photographer_project->id;

            for ($i=0; $i < count($request->image); $i++) { 

                if($request->hasFile('image')){

                    $image_tmp = $request->file('image')[$i];

                    if($image_tmp->isValid()){

                        $name = $image_tmp->getClientOriginalName();
                        $filename = 'project'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/p-p-images/');
                        $image_tmp->move($destinationPath, $filename);

                    }
                }

                $project_images = new Project_images();
                $project_images->photographer_project_id = $p_p_id;
                $project_images->images = $filename;
                $project_images->save();
                
            }

            if ($photographer_project && $project_images) {

                return redirect('/photographer/index')->with('flash_message_success', 'Project Created Successfully!');

            }else{

                return redirect()->back()->with('flash_message_error', 'Project Not Created!');

            }            

        }

        $shoot_fors = Shoot_for::where(['isactive'=>1])->orderBy('id','desc')->get();

        return view('frontend.photographer.create-project')->with(compact('shoot_fors'));

    }

    public function photographerviewbooking(){

        $user = Auth::user();
        $user_id = $user->id;

        // counter query start
        $cur_date = date("Y-m-d");

        $ongoing_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['full_date', '=', $cur_date] ])->count();

        $upcoming_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['full_date', '<', $cur_date] ])->count();

        $complete_booking_count = Booking::where([ ['user_photographer_id', '=', $user_id], ['status', '=', "Completed"] ])->count();
        // counter query end

        // query for view attandance

        $ongoing_bookings = DB::table('bookings as b')
                            ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_photographer_id', '=', $user_id], ['b.full_date', '=', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $upcoming_bookings = DB::table('bookings as b')
                            ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_photographer_id', '=', $user_id], ['b.full_date', '>', $cur_date] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        $complete_bookings = DB::table('bookings as b')
                            ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                            ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                            ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                            ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                            ->where([ ['b.user_photographer_id', '=', $user_id], ['status', '=', "Completed"] ])
                            ->orderBy('b.id', 'desc')
                            ->get();

        return view('frontend.photographer.view-bookings')->with(compact('ongoing_booking_count', 'upcoming_booking_count', 'complete_booking_count', 'ongoing_bookings', 'upcoming_bookings', 'complete_bookings'));

    }

    public function photographerviewbookingdeatils($booking_id){

        $user = Auth::user();
        $user_id = $user->id;

        $cur_date = date("Y-m-d");

        // query for view attandance

        $booking = DB::table('bookings as b')
                    ->join('customers as c', 'b.user_id', '=', 'c.user_id')
                    ->join('package_requests as pr', 'b.package_request_id', '=', 'pr.id')
                    ->join('shoot_fors as sf', 'b.shoot_for_id', '=', 'sf.id')
                    ->select('b.*', 'c.first_name as first_name', 'c.last_name as last_name','c.image as image', 'c.phone_code as code', 'c.phone_number as number', 'pr.name as pck_req_name', 'sf.name as shootfor_name')
                    ->where([ 'b.id'=>$booking_id ])
                    ->first();

        return view('frontend.photographer.view-booking-detail')->with(compact('cur_date', 'booking'));

    }

    public function photographerbookingcheckin(Request $request, $booking_id)
    {

        $selected_date = DateTime::createFromFormat("U", strtotime(date("Y-m-d")));
        $year=$selected_date->format('Y');
        $month=$selected_date->format('M');
        $day=$selected_date->format('l');
        $date=$selected_date->format('d');

        $chk_in_time = date("H:i");

        $chk_in = $day." ".$month." ".$date." ".$year." ".$chk_in_time;

        $cancel = Booking::where(['id'=>$booking_id])->update([
            'status' => "Completed",
            'user_photographer_check_in' => $chk_in
        ]);

        return redirect()->back()->with('flash_message_success','Check In Successfully!');


    }

    public function photographermessage(){

        $user_id = Auth::user()->id;

        $firestore = new FirestoreClient([
            'projectId' => 'bookvr-9981a',
            'keyFile' => json_decode(file_get_contents(ENV('FIREBASE_CREDENTIALS')), true)
        ]);

        $getchatlist = $firestore->collection('chats')->documents();
        // $query = $getchatlist->where($user_id, '==', $user_id)->documents();

        // $rows = '';

        // foreach ($getchatlist as $key) {
        //  $rows = $key['chatId'];
        //  $sn = $key['members'];

        //  for ($i=0; $i < count($sn); $i++) { 
        //      $members = $sn[$i];
        //  }

        //  dd($rows, $sn, $members);
        // }

        // dd($query, $user_id);

        $users = User::get();

        return view('frontend.photographer.messages')->with(compact('users', 'getchatlist'));

    }

    public function photographersettings(){

        $user = Auth::user();
        $user_id = $user->id;

        $photographer = DB::table('photographers as p')
                        ->join('photography_equipments as pe', 'p.equipment_id', '=', 'pe.id')
                        ->join('spaces_photographeds as sp', 'p.spaces_photograph_id', '=', 'sp.id')
                        ->select('p.*', 'pe.name as eqp_name', 'sp.name as spaces_name')
                        ->where(['p.user_id'=>$user_id])
                        ->first(); 

        return view('frontend.photographer.settings')->with(compact('photographer'));

    }

    public function photographereditprofile(Request $request){

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

            Photographer::where([ 'user_id'=>$user_id ])->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone_code' => $data['phone_code'],
                'phone_number' => $data['phone_number'],
                'gender' => $data['gender'],
                'date_of_birth' => $data['date_of_birth'],
                'bio' => $data['bio'],
                'address' => $data['address'],
                'experience' => $data['experience'],
                'equipment_id' => $data['equipment_id'],
                'spaces_photograph_id' => $data['spaces_photograph_id'],
                'equip_other_name' => $data['equip_other_name'],
                'image' => $filename,
            ]);

            return redirect('/photographer/settings')->with('flash_message_success','Profile Edit Successfully!');

        }

        $photographer = Photographer::where(['user_id'=>$user_id])->first();

        $equipments = Photography_equipment::where(['isactive'=>1])->orderBy('id','desc')->get();

        $spaces = Spaces_photographed::where(['isactive'=>1])->get();

        return view('frontend.photographer.edit-profile')->with(compact('photographer', 'equipments', 'spaces'));

    }

    public function photographerchangepassword(Request $request){

        if($request->isMethod('post')){

            $data = $request->all();

            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['currentPassword'];

            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['newPassword']);
                // echo $password;
                // die;
                User::where('email',Auth::user()->email)->update(['password' => $password]);

                return redirect('/photographer/settings')->with('flash_message_success','Password updated successfully');

            }else{

                return redirect()->back()->with('flash_message_error','Incorrect current password ');

            }

            //echo '<pre>'.print_r($data); die;
        }else{
            return view('frontend.photographer.change-password');
        }

        return view('frontend.photographer.change-password');

    }

    // show to admin panel
    public function viewphotographers()
    {
        $photographers = DB::table('photographers as p')
                        ->join('users as u', 'p.user_id', '=', 'u.id')
                        ->join('photography_equipments as pe', 'p.equipment_id', '=', 'pe.id')
                        ->join('spaces_photographeds as sp', 'p.spaces_photograph_id', '=', 'sp.id')
                        ->select('p.*', 'u.name as userName', 'pe.name as eqp_name', 'sp.name as spaces_name')
                        ->orderBy('p.id', 'desc')
                        ->get();

        return view('admin.photographer.view-photographer')->with(compact('photographers'));

    }

    public function viewphotographerdetails($user_id)
    {
        $photographer = DB::table('photographers as p')
                        ->join('users as u', 'p.user_id', '=', 'u.id')
                        ->join('photography_equipments as pe', 'p.equipment_id', '=', 'pe.id')
                        ->join('spaces_photographeds as sp', 'p.spaces_photograph_id', '=', 'sp.id')
                        ->select('p.*', 'u.name as userName', 'pe.name as eqp_name', 'sp.name as spaces_name')
                        ->where(['p.user_id'=>$user_id])
                        ->first();

        return view('admin.photographer.view-detail')->with(compact('photographer'));

    }

    public function deletephotographerr($user_id)
    {
        if (!empty($user_id)){

            User::where(['id'=>$user_id])->delete();

            Photographer::where(['user_id'=>$user_id])->delete();

            return redirect()->back()->with('flash_message_success','Photographer Deleted Successfully!');

        }
    }

    // photographer api part
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

            	if (!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['email']) && !empty($data['password']) && !empty($data['phone_code']) && !empty($data['phone_number']) && !empty($data['gender']) && !empty($data['date_of_birth']) && !empty($data['image']) && !empty($data['confirm_password']) && !empty($data['address']) && !empty($data['bio']) && !empty($data['experience']) ) {
            		
	                $user = new User;
	                $user->name = $data['first_name'].' '.$data['last_name'];
	                $user->email = $data['email'];
	                $user->password = bcrypt($data['password']);
	                $user->is_active = 1;
					$user->save();
	                $user->assignRole('photographer');

            		$userid = $user->id;

            		$photographer = new Photographer;
            		$photographer->user_id = $userid;
	                $photographer->first_name = $data['first_name'];
	                $photographer->last_name = $data['last_name'];
	                $photographer->email = $data['email'];
	                $photographer->phone_code = $data['phone_code'];
	                $photographer->phone_number = $data['phone_number'];
	                $photographer->gender = $data['gender'];
	                $photographer->date_of_birth = $data['date_of_birth'];
	                $photographer->bio = $data['bio'];
	                $photographer->address = $data['address'];
	                $photographer->experience = $data['experience'];
	                $photographer->equipment_id = $data['equipment_id'];
	                $photographer->spaces_photograph_id = $data['spaces_photograph_id'];
	                $photographer->equip_other_name = $data['equip_other_name'];
	                $photographer->isactive = 1;

	                if($request->hasFile('image')){

	                	$image_tmp = $request->file('image');

	                    if($image_tmp->isValid()){

        					$name = $image_tmp->getClientOriginalName();
	                        $filename = 'photographer'.rand(1111,9999999).$name;
	                        $destinationPath = public_path('/images/frontend-images/photographer/');
        					$image_tmp->move($destinationPath, $filename);

	                        $photographer->image = $filename;
	                    }
	                }

	                $photographer->save();

	                if ($user && $photographer) {

	                	$out = array();

				        $status = "photographer registered successfully!";

				        $out[] = array("response"=>$status);

				        return[ "code" => "200", "msg" => $out];
	                }

            	}else{

                	$out = array();

			        $status = "failed!";

			        $out[] = array("response"=>$status);

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
                        $filename = 'photographer'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/photographer/');
    					$image_tmp->move($destinationPath, $filename);
	                }

	            }else{

	                $filename = $data['current_image'];

	            }

                $userupdate = User::where([ 'id'=>$data['user_id'] ])->update([
                	'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                ]);

                $photographerupdate = Photographer::where([ 'user_id'=>$data['user_id'] ])->update([
                	'first_name' => $data['first_name'],
                	'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'phone_code' => $data['phone_code'],
                	'phone_number' => $data['phone_number'],
                    'gender' => $data['gender'],
                    'date_of_birth' => $data['date_of_birth'],
	                'bio' => $data['bio'],
	                'address' => $data['address'],
	                'experience' => $data['experience'],
	                'equipment_id' => $data['equipment_id'],
	                'spaces_photograph_id' => $data['spaces_photograph_id'],
	                'equip_other_name' => $data['equip_other_name'],
                    'image' => $filename,
                ]);

                if ($userupdate && $photographerupdate) {

                    $out = array();

                    $status = "profile updated!";

                    $out[] = array("response"=>$status);

                    return[ "code" => "200", "msg" => $out];
                    # code...
                }

                

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
 
    public function createprojectapi(Request $request)
	{

		$data = $request->all();

        if(!empty($data['user_id']) && !empty($data['title']) && !empty($data['location']) && !empty($data['description']) ){

        	$photographer_project = new Photographer_project();
            $photographer_project->title = $data['title'];
            $photographer_project->location = $data['location'];
            $photographer_project->portfolio_link = $data['portfolio_link'];
            $photographer_project->description = $data['description'];
            $photographer_project->user_id = $data['user_id'];
            $photographer_project->shoot_for_id  = $data['shoot_for_id'];
            $photographer_project->save();

            $p_p_id = $photographer_project->id;

            for ($i=0; $i < count($request->image); $i++) { 

            	if($request->hasFile('image')){

                	$image_tmp = $request->image[$i];

                    if($image_tmp->isValid()){

                    	$name = $image_tmp->getClientOriginalName();
                        $filename = 'project'.rand(1111,9999999).$name;
                        $destinationPath = public_path('/images/frontend-images/p-p-images/');
    					$image_tmp->move($destinationPath, $filename);

                    }
                }

            	$project_images = new Project_images();
	            $project_images->photographer_project_id = $p_p_id;
	            $project_images->images = $filename;
	            $project_images->save();
            	
            }

            if ($photographer_project && $project_images) {

                $out = array();

		        $status = "project create successfully!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "200", "msg" => $out];

            }else{

            	$out = array();

		        $status = "not created!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "201", "msg" => $out];

            }

        }else{

            $out = array();

	        $status = "fields are required!";

	        $out[] = array("response"=>$status);

	        return[ "code" => "201", "msg" => $out];

        }
		
	}

	public function getphotographerprojecttitleapi($photographer_id)
    {

        $projects = Photographer_project::where(['user_id'=>$photographer_id])->orderBy('id','desc')->get();

        $projects_count = Photographer_project::where(['user_id'=>$photographer_id])->count();

        if($projects_count > 0){

            $out = array();

            foreach ($projects as $project) {

                $out[] = array(
                	"user_id"=>$project->user_id,
                    "project_id"=>$project->id,  
                    "project_title"=>$project->title,
                );
                
            }

            return[ "code" => "200", "msg" => $out];

        }else{

            $out = array();

            $status = "no data yet";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

    public function getphotographerprojectimagesapi($photographer_id)
    {

        $project_images = DB::table('photographer_projects as pp')
	                    ->join('project_images as pi', 'pp.id', '=', 'pi.photographer_project_id')
	                    ->select('pp.user_id as user_id', 'pi.*')
	                    ->where(['pp.user_id'=>$photographer_id])
	                    ->orderBy('pp.id','desc')
	                    ->get();

        $projects_count = Photographer_project::where(['user_id'=>$photographer_id])->count();

        if($projects_count > 0){

            $out = array();

            foreach ($project_images as $project_image) {

                $out[] = array(
                    "user_id"=>$project_image->user_id, 
                    "project_id"=>$project_image->photographer_project_id,  
                    "project_image_id"=>$project_image->id, 
                    "project_image"=>"https://bookvrapp.com/public/images/frontend-images/p-p-images/".$project_image->images,
                );
                
            }

            return[ "code" => "200", "msg" => $out];

        }else{

            $out = array();

            $status = "no data yet";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

    public function getphotographerprojectdetailsapi($project_id)
    {

        $project_detail = DB::table('photographer_projects as pp')
	                    ->join('shoot_fors as sf', 'pp.shoot_for_id', '=', 'sf.id')
	                    ->select('pp.*','sf.name as shoot_for_name')
	                    ->where(['pp.id'=>$project_id])
	                    ->first();

        $project_images = Project_images::where(['photographer_project_id'=>$project_id])->get();

        if($project_detail){

            $out = array();

            $out[] = array(
                "user_id"=>$project_detail->user_id, 
                "project_id"=>$project_detail->id,  
                "project_title"=>$project_detail->title,
                "location"=>$project_detail->location, 
                "portfolio_link"=>$project_detail->portfolio_link,  
                "description"=>$project_detail->description, 
                "shoot_for"=>$project_detail->shoot_for_name,
            );

            for ($i=0; $i < count($project_images) ; $i++) { 

                $out[] = array(

                    "image_id" => $project_images[$i]["id"],
                    "project_image" => "https://bookvrapp.com/public/images/frontend-images/p-p-images/".$project_images[$i]["images"],

                );

            } 

            return[ "code" => "200", "msg" => $out];

        }else{

            $out = array();

            $status = "no data yet";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

}
