<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo_code extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'amount',
        'type',
        'active_from',
        'expire_date',
        'isactive',
    ];




    //parent for booking
      public  function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }



}

