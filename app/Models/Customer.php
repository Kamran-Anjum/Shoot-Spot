<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;


class Customer extends Model
{
    use HasFactory;
     protected $fillable = [
        'first_name',
        'last_name',
        'phone_code',
        'email',
        'phone_number',
        'date_of_birth',
        'gender',
        'loyalty_points',
        'user_id',
        'isactive',
    ];

    
    //child of user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


      public static function saveImage($image){
                     $extension=$image->getClientOriginalExtension();
                    $random = 'customer';
                    $filename=$random.'_'.rand(1111,9999).'.'.$extension;
                    $img=public_path().'/images/frontend-images/customer/'.$filename;

                    $temp=  $image->getRealPath();
                      // dd(is_writable(public_path().'/img/'.$filename));
                    $img = Image::make($temp)->save($img);
                    return $filename;
    }

          public static function oldImage($id){
         $file=Customer::select('image')->where('id',$id)->get();
         // dd($file);
        $filename=$file[0]->image;
       
         return $filename;
      }

       public  static function deleteOldImage($old_image){
    
        $image='/images/frontend-images/customer/'.$old_image;
        $image=public_path().$image;
            
            //delete previous image
            if(File::exists( $image)) {
                
                File::delete($image);
                 
             }
    }


}
