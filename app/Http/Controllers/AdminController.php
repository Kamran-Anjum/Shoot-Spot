<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Photographer;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\ContactUs;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasrole('admin')) {
                 $count_photographer=Photographer::all()->count();
                 $count_customer=Customer::all()->count();
                 $count_booking=Booking::all()->count();
                 $count_msg = ContactUs::where(['is_view'=>0])->count();
                return view('admin.dashboard',compact('count_photographer','count_customer', 'count_booking', 'count_msg'));
            }
            else{
                Auth::logout();
                return redirect('/admin');
            }
        }else{
            return redirect('/admin');
        }
      

    }

     public function login_form()
    {
    	if (Auth::check()) {
		    	
	    		return redirect('/admin/dashboard');
		}
		else{
        		return view('admin.admin-login');
			
    	}
    }

    //admin registration
     public function register_form()
    {
    	   
        		return view('admin.admin-register');
			
    }
    
     public function register(Request $request)
    {
        $check=User::check_email($request->email);
        if ($check) {
                 if($request->isMethod('post')){
                 $data = $request->input();
                 $user = new User;
                 $user->name = $data['name'];
                 $user->email = $data['email'];
                 $user->password = bcrypt($data['password']);
                 // $user->role = 'admin';
                 $user->assignRole('admin');
                 $user->save();
                     return redirect()->back()->with('flash_message_success','Successfulyy Registered! ');
                }
                else{
                     return redirect()->back()->with('flash_message_error',' Opps..Not Registered! ');
                }
        }
        else{
            return redirect()->back()->with('flash_message_error',' This email is already registered. ');
        }
    }


    //login ADMIN
     public function login(Request $request)
    {
    	
		if($request->isMethod('post')){
    		$data = $request->input();

			if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]))
            {
                 if(Auth::user()->hasrole('admin')){
                  $check=true;
                }else{
                    Auth::logout();
                    $check=false;                    
                }
            }
            else{
                $check=false;
             
            }
            $user=Auth::user();
            if ($check) {
                 return redirect('/admin/dashboard');
            }
            else{
                return redirect()->back()->with('flash_message_error','  Wronge email or password!  ');  
            }

			
		}
    }
 //chnage password
     public function change_pwd()
    {
         return view('admin.change-password');            
    }
     public function change_password(Request $request)
    {
       // dd($request->currentPassword);
         if (!(Hash::check($request->currentPassword, Auth::user()->password))) {
            // The passwords matches
             return redirect()->back()->with('flash_message_error',' Your current password does not matches with the password you provided. Please try again.  ');
           
        }

        if(strcmp($request->currentPassword, $request->newPassword) == 0){
            //Current password and new password are same
              return redirect()->back()->with('flash_message_error',' New Password cannot be same as your current password. Please choose a different password. ');
        }

        // Change Password
        $user = Auth::user();       
        $pass=bcrypt($request->newPassword);
         $result=$user->update(['password'=>$pass]);
        if ($result) {
            return redirect('/admin/logout'); 
        }
        else{
            return redirect()->back()->with('flash_message_success','password not changed');
        }


    }

    //project index
    public function project_index(){
        return view('admin.project.project_index');
    }
    
      //admin logout
    public function logout(){
    	Auth::logout();
    	return view('admin.admin-login');
    }




}
