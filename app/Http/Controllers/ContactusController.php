<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Exception;
use App\Models\User;
use App\Models\ContactUs;
use App\Models\Customer;
use Validator;

class ContactusController extends Controller
{
    public function contactmsgsend(Request $request)
    {
    	if($request->isMethod('post')){

            $data = $request->all();
            
            $contactus = new ContactUs();
            $contactus->first_name = $data['fname'];
            $contactus->last_name = $data['lname'];
            $contactus->phone = $data['number'];
            $contactus->email = $data['email'];
            $contactus->message = $data['msg'];
            $contactus->date = date('Y-m-d');
            $contactus->save();

            return redirect()->back()->with('flash_message_success', 'Message Send Successfully!');

        }
    }

    public function viewcontactmsg()
    {
    	$contact_msgs = ContactUs::orderBy('id','desc')->get();

    	foreach ($contact_msgs as $contact_msg) {

			$chk_status = ContactUs::where('is_view', '=', 0)->update([
				'is_view' => 1
			]);
        	
        }

    	return view('admin.contactus.view-contact-msg')->with(compact('contact_msgs'));

    }


    // api for contact us 
    public function appcontactmsgsend(Request $request)
	{

		$data = $request->all();

        if(!empty($data['first_name']) && !empty($data['last_name']) && !empty($data['number']) && !empty($data['email']) && !empty($data['msg'])){

        	$contactus = new ContactUs();
            $contactus->first_name = $data['first_name'];
            $contactus->last_name = $data['last_name'];
            $contactus->phone = $data['number'];
            $contactus->email = $data['email'];
            $contactus->message = $data['msg'];
            $contactus->date = date('Y-m-d');
            $contactus->save();

            if ($contactus) {

                $out = array();

		        $status = "msg send successfully!";

		        $out[] = array("response"=>$status);

		        return[ "code" => "200", "msg" => $out];

            }else{

            	$out = array();

		        $status = "msg not send!";

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
