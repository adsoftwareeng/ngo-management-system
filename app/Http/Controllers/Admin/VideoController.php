<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Support\Str;


class VideoController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Video";
        $main_title     = "Video";
        $empty_message  = "No Video yet";
        $delete_title = "Video";
        $delete_url = "admin.videos.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Gallery";
           $gallery  = gallery::where('status',$status)->where('type','video')->orderby('id','desc')->paginate(20);
        }else{
           $gallery = gallery::orderby('id','desc')->where('type','video')->paginate(20);   
        }
       
        return view('admin.videos.index', compact('page_title', 'empty_message', 'gallery','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add Video";
            $data['go_back_url'] = "admin.videos";
            $data['main_title']  = "Video";
            $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update Video";
            $data['go_back_url'] = "admin.videos";
            $data['gallery'] = gallery::where('id',$request->id)->first(); 
         }

        return view('admin.videos.form',$data);
     }
   
    public function store(Request $request)
    {
        $request->validate([
            // 'title'       => 'required|string',
            'image'      => 'required',
            // 'status'     => 'required',
        ]);
       
        if($request->id){
              $gallery = gallery::findOrFail($request->id);
              $gallery->title              = $request->title;
              $gallery->slug               = Str::slug($request->title);
             $gallery->image              =   getEmbedUrl($request->image);
             $gallery->service_id         = $request->service_id;
             $gallery->status          = $request->status?$request->status:'active';
             $gallery->type             = 'video';
             $gallery->save();
        }else{
             //$gallery = new gallery();
             if(!empty($request->image)){
                 foreach($request->image as $image){
                      if(!empty($image)){
                     $img   =   getEmbedUrl($image);
                    $gallery = gallery::insert(['image'=>$img,'type'=>'video','status'=>'active']);
                      }
                 }
             }
         }


        
       

        if($request->id){
              $notify[] = ['success', 'Video Updated Successfully'];
        }else{
              $notify[] = ['success', 'Video Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $gallery = gallery::where('id', $id)->first();
        if(!empty($gallery)){
            $gallery->delete();
            $notify[] = ['success', 'video Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
