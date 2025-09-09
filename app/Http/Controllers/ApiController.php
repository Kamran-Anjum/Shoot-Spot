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
use Exception;
use App\Models\User;
use App\Models\Photography_equipment;
use App\Models\Spaces_photographed;
use App\Models\Shoot_for;
use App\Models\Package_request;
use App\Models\Customer;
use App\Models\Photographer;
use App\Models\Notification;
use Validator;

class ApiController extends Controller
{

    public function getcustomernotificationcount($user_id)
    {

        $noti_count = Notification::where(['send_to'=> $user_id, 'status'=>0])->count();

        if($noti_count > 0){

            $out = array();

            $out[] = array("noti_count"=>$noti_count);

            return[ "code" => "200", "msg" => $out];

        }else{

            $out = array();

            $status = "no notification yet";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }

    public function getcustomernotificationapi($user_id)
    {

        $noti_count = Notification::where(['send_to'=> $user_id])->count();

        $count_nill = Notification::where(['send_to'=>$user_id])->update([
                'status' => 1,
            ]);

        $notification = DB::table('notifications as n')
                        ->join('bookings as b', 'n.booking_id', '=', 'b.id')
                        ->select('n.*', 'b.status as booking_status')
                        ->where(['n.send_to'=>$user_id])
                        ->orderBy('n.id', 'desc')
                        ->get();

        if($noti_count > 0){

            $out = array();

            foreach ($notification as $noti) {

                $out[] = array(
                    "noti_id"=>$noti->id,  
                    "user_id"=>$noti->send_to,
                    "booking_id"=>$noti->booking_id,  
                    "description"=>$noti->description,
                    "booking_status"=>$noti->booking_status,
                );
                
            }

            return[ "code" => "200", "msg" => $out];

        }else{

            $out = array();

            $status = "no notification yet";

            $out[] = array("response"=>$status);

            return[ "code" => "201", "msg" => $out];

        }

    }
    
    // api for equipment show in app 
    public function getequipment()
    {

        $equipments = Photography_equipment::where(['isactive'=>1])->orderBy('id','desc')->get();

        $equipments_count = Photography_equipment::where(['isactive'=>1])->count();

        if($equipments_count > 0){

            $out = array();

            foreach ($equipments as $equipment) {

                $out[] = array(
                    "equipment_id"=>$equipment->id,  
                    "equipment_name"=>$equipment->name,
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

    // api for spaces photograph show in app 
    public function getspacesphotograph()
    {

        $spaces = Spaces_photographed::where(['isactive'=>1])->get();

        $spaces_count = Spaces_photographed::where(['isactive'=>1])->count();

        if($spaces_count > 0){

            $out = array();

            foreach ($spaces as $space) {

                $out[] = array(
                    "spaces_id"=>$space->id,  
                    "spaces_name"=>$space->name,
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

    // api for shhot for show in app 
    public function getshootfor()
    {

        $shootfors = Shoot_for::where(['isactive'=>1])->orderBy('id','desc')->get();

        $shootfors_count = Shoot_for::where(['isactive'=>1])->count();

        if($shootfors_count > 0){

            $out = array();

            foreach ($shootfors as $shootfor) {

                $out[] = array(
                    "shootfor_id"=>$shootfor->id,  
                    "shootfor_name"=>$shootfor->name,
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

    // api for package show in app 
    public function getpackage()
    {

        $packages = Package_request::where(['isactive'=>1])->orderBy('id','desc')->get();

        $packages_count = Package_request::where(['isactive'=>1])->count();

        if($packages_count > 0){

            $out = array();

            foreach ($packages as $package) {

                $out[] = array(
                    "package_id"=>$package->id,  
                    "package_name"=>$package->name,
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

    // login api for both app users
    public function loginapi(Request $request)
    {

        $data = $request->all();

        if ( !empty($data['email']) && !empty($data['password']) ) {

            $login_usercount = User::where('email', $data['email'])->count();
            
            if ($login_usercount > 0) {
            
                $login_user = User::where('email', $data['email'])->first();

                if(Hash::check($data['password'], $login_user->password)){

                    $token = $login_user->createToken('app-login-token')->plainTextToken;

                    $user = User::where(['id'=> $login_user->id])->with('roles')->first();

                    $role_name = $user->roles->first()->name;

                    $out = array();

                    $status = $role_name." login"; 

                    if ($role_name == "customer") {

                        $customer = Customer::where(['user_id'=>$login_user->id])->first();             

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
                            "image"=>"https://bookvrapp.com/public/images/frontend-images/customer/".$customer->image,
                            "current_image"=>$customer->image,
                        );
                        
                    } else {
                        
                        $photographer = DB::table('photographers as p')
                                        ->join('photography_equipments as pe', 'p.equipment_id', '=', 'pe.id')
                                        ->join('spaces_photographeds as sp', 'p.spaces_photograph_id', '=', 'sp.id')
                                        ->select('p.*', 'pe.name as eqp_name', 'sp.name as spaces_name')
                                        ->where(['p.user_id'=>$login_user->id])
                                        ->first();             

                        $out[] = array(
                            "response"=>$status,
                            "user_id"=>$login_user->id,  
                            "first_name"=>$photographer->first_name, 
                            "last_name"=>$photographer->last_name,
                            "email"=>$photographer->email, 
                            "phone_code"=>$photographer->phone_code,
                            "phone_number"=>$photographer->phone_number, 
                            "gender"=>$photographer->gender,
                            "date_of_birth"=>$photographer->date_of_birth,
                            "address"=>$photographer->address, 
                            "bio"=>$photographer->bio,
                            "experience"=>$photographer->experience,
                            "equipment_id"=>$photographer->equipment_id,
                            "equipment"=>$photographer->eqp_name,
                            "spaces_photograph_id"=>$photographer->spaces_photograph_id,
                            "spaces"=>$photographer->spaces_name,
                            "equip_other_name"=>$photographer->equip_other_name,
                            "image"=>"https://bookvrapp.com/public/images/frontend-images/photographer/".$photographer->image,
                            "current_image"=>$photographer->image,
                        );

                    }

                    return[ "code" => "200", "msg" => $out, "token" => $token];

                }else{

                    $out = array();

                    $status = "email and password not match!";

                    $out[] = array("response"=>$status);

                    return[ "code" => "201", "msg" => $out];
                }

            }else{

                $out = array();

                $status = "email not register for this app";

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

    // change password for both app users
    public function changepasswordapi(Request $request){

        $data = $request->all();

        if(!empty($data['email']) && !empty($data['currentPassword']) && !empty($data['newPassword']) && !empty($data['confirmnewPassword'])){

            $check_password = User::where(['email' => $data['email'] ])->first();
            $current_password = $data['currentPassword'];

            $count = User::where(['email'=>$data['email']])->count();

            if ($count > 0 ) {

                if(Hash::check($current_password,$check_password->password)){

                    $password = bcrypt($data['newPassword']);

                    User::where('email', $data['email'] )->update(['password' => $password]);

                    $out = array();

                    $status = "password updated!";

                    $out[] = array("response"=>$status);

                    return[ "code" => "200", "msg" => $out];

                }else{

                    $out = array();

                    $status = "current password not match!";

                    $out[] = array(
                        "response"=>$status,
                    );

                    return[ "code" => "201", "msg" => $out];

                }
            }else{

                $out = array();

                $status = "email not match!";

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

    // forggot password for both app users
    public function forggotpasswordapi(Request $request){

        $data = $request->all();

        if(!empty($data['email']) && !empty($data['newPassword'])){

            $check_password = User::where(['email' => $data['email'] ])->first();

            $count = User::where(['email'=>$data['email']])->count();

            if ($count > 0 ) {

                $password = bcrypt($data['newPassword']);

                User::where('email', $data['email'] )->update(['password' => $password]);

                $out = array();

                $status = "password updated!";

                $out[] = array("response"=>$status);

                return[ "code" => "200", "msg" => $out];

            }else{

                $out = array();

                $status = "email not match!";

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

}
