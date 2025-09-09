<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaces_photographed extends Model
{
    use HasFactory;

	protected $fillable = [
        'name',
        'isactive',
    ];

    
    //parent for photographer
      public  function photographer()
    {
        return $this->hasMany('App\Models\photographer');
    }
}
