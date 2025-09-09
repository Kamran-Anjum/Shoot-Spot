<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isactive',
    ];


    
    //parent for booking
      public  function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
