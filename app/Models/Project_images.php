<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_images extends Model
{
    use HasFactory;
    protected $fillable = [
        'photographer_project',
        'images',
    ];


    
    //child of photographer project
    public function photographer_project()
    {
        return $this->belongsTo(photographer_project::class);
    }
}
