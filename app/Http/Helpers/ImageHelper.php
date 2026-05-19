<?php
namespace App\Http\Helpers;

use Illuminate\Support\Str;
use Image;

class ImageHelper
{
    public static function handleUploadedImage($file,$path,$delete=null) {
        if ($file) {
            if($delete){
                
                if (file_exists(base_path('../').$path.'/'.$delete)) {
                    unlink(base_path('../').$path.'/'.$delete);
                }
            }
            $name = Str::random(4).$file->getClientOriginalName();
            $file->move($path,$name);
            return $name;
        }
    }
    public static function ItemhandleUploadedImage($file,$path,$delete=null) {
        if ($file) {
            if($delete){
                if (file_exists(base_path('../').$path.'/'.$delete)) {
                    unlink(base_path('../').$path.'/'.$delete);
                }
            }

            $thum = Str::random(8).'.'.$file->getClientOriginalExtension();
            $image = \Image::make($file)->resize(230,230);
    
            // $image->save(base_path('../').$path.'/'.$thum);
            
           $image->save('public/uploads/payment'.'/'.$thum);

    
            $photo = time().$file->getClientOriginalName();
            
            $file->move('public/uploads/payment',$photo);
            // $file->move($path,$photo);
            return [$photo,$thum];
        }
    }

    public static function handleUpdatedUploadedImage($file,$path,$data,$delete_path,$field) {
        $name = time().$file->getClientOriginalName();
   
        $file->move(base_path().$path,$name);
        if($data[$field] != null){
            if (file_exists(base_path().$delete_path.$data[$field])) {
                unlink(base_path().$delete_path.$data[$field]);
            }
        }
        return $name;
    }


    public static function ItemhandleUpdatedUploadedImage($file,$path,$data,$delete_path,$field) {
        $photo = time().$file->getClientOriginalName();
        $thum = Str::random(8).'.'.$file->getClientOriginalExtension();
      
        $image = \Image::make($file)->resize(230,230);

        $image->save('public/uploads/payment'.'/'.$thum);

        $file->move('public/uploads/payment',$photo);
        // chmod('public/uploads/payment/', 0777);
        // if (!file_exists($path)) {
        //         mkdir('public/uploads/payment/', 0777, true);
        //     }
        // $image->save($path.'/'.$thum);
        // $file->move($path.'/'.$thum);

        if($data['thumbnail'] != null){
            if (file_exists(base_path('../').$delete_path.$data['thumbnail'])) {
                unlink(base_path('../').$delete_path.$data['thumbnail']);
            }
        }
        if($data[$field] != null){
            if (file_exists(base_path('../').$delete_path.$data[$field])) {
                unlink(base_path('../').$delete_path.$data[$field]);
            }
        }
        return [$photo,$thum];
    }


    public static function handleDeletedImage($data,$field,$delete_path) {
        
        
        if($data[$field] != null){
            if (file_exists(base_path('../').$delete_path.$data[$field])) {
                unlink(base_path('../').$delete_path.$data[$field]);
            }
        }
    }
}
