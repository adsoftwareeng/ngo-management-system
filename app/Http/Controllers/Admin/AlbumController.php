<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Seo;
use App\Models\Album;

class AlbumController extends Controller
{
    // Display list of albums
      public function index(Request $request)
    {
        $page_title     = "All album";
        $main_title     = "album";
        $empty_message  = "No album yet";
        $delete_title = "album";
        $delete_url = "admin.album.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." album";
           $album  = album::where('status',$status)->orderby('id','desc')->get();
        }else{
           $album = album::orderby('id','desc')->get();   
        }
       
        return view('admin.album.index', compact('page_title', 'empty_message', 'album','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add album";
            $data['go_back_url'] = "admin.album";
            $data['main_title']  = "album";
            
        if($request->id){

            $data['page_title']  = "Update album";
            $data['go_back_url'] = "admin.album";
            $album = album::where('id',$request->id)->first(); 
            $data['seo_album'] = Seo::where('type',$album->slug)->first();
            $data['album'] = $album;
         }

        return view('admin.album.form',$data);
     }
   
    
  
    public function store(Request $request)
    {
         if($request->id){
            $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required'
            ]);
        }else{
             $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required'
            ]);
        }
       
        if($request->id){
              $album = album::findOrFail($request->id);
        }else{
             $album = new album();
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/album'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $album->image;
        }

        $album->title              = $request->title;
        $album->slug               = Str::slug($request->title);
        $album->image              = $imageName;
        $album->alt              = $request->alt;
        $album->status             = $request->status;
        $album->save();
        
            
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $album->slug));
        $seo->page_title  = $request->title;
        $seo->keywords  = $request->title;
        $seo->description  = $request->title;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$album->slug.'/';
        $seo->preconnect  = url('/').'/'.$album->slug.'/';
        $seo->canonical  =  url('/').'/'.$album->slug.'/';
        $seo->og_title  = $request->title;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->title;
        $seo->og_url  =  url('/').'/'.$album->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $album->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
        
        
        if($request->id){
              $notify[] = ['success', 'album Updated Successfully'];
        }else{
              $notify[] = ['success', 'album Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }

    
   
    public function delete($id)
    {
        $album = album::where('id', $id)->first();
        if(!empty($album)){
        
                
        $seo_Delete = seo::where('type',$album->slug)->first();
            
          if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
        
            $album->delete();
        
            $notify[] = ['success', 'album Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}