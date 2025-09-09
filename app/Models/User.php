<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'fcm_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

 
    //parent for customer
      public  function customer()
    {
        return $this->hasMany('App\Models\customer');
    }
    //parent for photographer
      public  function photographer()
    {
        return $this->hasMany('App\Models\photographer');
    }

    //parent for photographer project
      public  function photographer_project()
    {
        return $this->hasMany('App\Models\photographer_project');
    }

    //parent for booking
      public  function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }





     public static function  check_email($email){
         $query= User::select('id')->where('email',$email)->get();
         if (!empty($query[0])) {
                    
                  return 0;
                 }
                 else{
                    return 1;   
                }
          
        }
}
