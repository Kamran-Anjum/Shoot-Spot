<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class Shoot_for extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'isactive',
        'image',
    ];



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



public static function saveImage($image){
        $extension=$image->getClientOriginalExtension();
        $random = 'shoot_for';
        $filename=$random.'_'.rand(1111,9999).'.'.$extension;
        $img=public_path().'/images/backend-images/shootfor/'.$filename;
        $temp=  $image->getRealPath();
        $img = Image::make($temp)->save($img);
        return $filename;
}

public static function oldImage($id){
         $file=Shoot_for::select('image')->where('id',$id)->get();
         // dd($file);
        $filename=$file[0]->image;
       
         return $filename;
}

public  static function deleteOldImage($old_image){
    
        $image='/images/backend-images/shootfor/'.$old_image;
        $image=public_path().$image;
            
            //delete previous image
            if(File::exists( $image)) {
                
                File::delete($image);
                 
             }
}

}
