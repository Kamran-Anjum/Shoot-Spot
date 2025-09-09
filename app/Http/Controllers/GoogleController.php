<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use App\Models\Customer;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/customer/index');
     
            }else{
                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'password' => encrypt('test12345')
                // ]);

                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->password = bcrypt('12345');
                $newUser->is_active = 1;
                $newUser->google_id = $user->id;
				$newUser->save();
                $newUser->assignRole('customer');

        		$userid = $newUser->id;

        		$customer = new Customer;
        		$customer->user_id = $userid;
                $customer->first_name = $data['name'];
                $customer->email = $data['email'];
                $customer->isactive = 1;
                $customer->save();
    
                Auth::login($newUser);
     
                return redirect('/customer/index');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
