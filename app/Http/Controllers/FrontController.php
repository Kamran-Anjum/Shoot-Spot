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

class FrontController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }

    public function photographer(){
    	return view('frontend.photographer');
    }
    
    public function about_us(){
    	return view('frontend.about-us');
    }
    
    public function contact_us(){
    	return view('frontend.contact-us');
    }
    
    public function business(){
    	return view('frontend.business');
    }
    
    public function faq(){
    	return view('frontend.faq');
    }
    
    public function sign_in(){
    	return view('frontend.sign-in');
    }

    public function sign_up(){

        $equipments = Photography_equipment::where(['isactive'=>1])->orderBy('id','desc')->get();

        $spaces = Spaces_photographed::where(['isactive'=>1])->get();

    	return view('frontend.sign-up')->with(compact('equipments', 'spaces'));
    }

    public function term_condition(){
        return view('frontend.term-condition');
    }
    
    public function term_condition_photographer(){
        return view('frontend.term-condition-photographer');
    }
    
    public function privacy_policy(){
        return view('frontend.privacy-policy');
    }

    public function gallery(){
        return view('frontend.gallery');
    }

    public function resources(){
        return view('frontend.resources');
    }

    
}
