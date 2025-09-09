<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer_project extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'location',
        'shoot_for_id',
        'portfolio_link',
        'description',
    ];


     //child of user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //child of shoot for
    public function shoot_for()
    {
        return $this->belongsTo(Shoot_for::class);
    }

    //parent for project images
      public  function project_images()
    {
        return $this->hasMany('App\Models\Project_images');
    }
}
