<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class Photographer extends Model
{
    use HasFactory;
     protected $fillable = [
        'first_name',
        'last_name',
        'phone_code',
        'phone_number',
        'date_of_birth',
        'gender',
        'location',
        'experience',
        'bio',
        'spaces_photograph_id',
        'equip_other_name',
        'user_id',
        'isactive',
    ];

    
    //child of user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //child of user
    public function photography_equipment()
    {
        return $this->belongsTo(Photography_equipment::class);
    }

    //child of user
    public function spaces_photographed()
    {
        return $this->belongsTo(Spaces_photographed::class);
    }

    
      public static function saveImage($image){
                     $extension=$image->getClientOriginalExtension();
                    $random = 'photographer';
                    $filename=$random.'_'.rand(1111,9999).'.'.$extension;
                    $img=public_path().'/images/frontend-images/photographer/'.$filename;

                    $temp=  $image->getRealPath();
                      // dd(is_writable(public_path().'/img/'.$filename));
                    $img = Image::make($temp)->save($img);
                    return $filename;
    }

          public static function oldImage($id){
         $file=Photographer::select('image')->where('id',$id)->get();
         // dd($file);
        $filename=$file[0]->image;
       
         return $filename;
      }

       public  static function deleteOldImage($old_image){
    
        $image='/images/frontend-images/photographer/'.$old_image;
        $image=public_path().$image;
            
            //delete previous image
            if(File::exists( $image)) {
                
                File::delete($image);
                 
             }
    }


}
