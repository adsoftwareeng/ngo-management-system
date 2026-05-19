<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Seo;

use Illuminate\Support\Str;


class BlogsController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All blogs";
        $main_title     = "blogs";
        $empty_message  = "No blogs yet";
        $delete_title = "blogs";
        $delete_url = "admin.blogs.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." blogs";
           $blogs  = Blogs::where('status',$status)->orderby('id','desc')->get();
        }else{
           $blogs = Blogs::orderby('id','desc')->get();   
        }
       
        return view('admin.blogs.index', compact('page_title', 'empty_message', 'blogs','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add blogs";
            $data['go_back_url'] = "admin.blogs";
            $data['main_title']  = "blogs";
            
        if($request->id){

            $data['page_title']  = "Update blogs";
            $data['go_back_url'] = "admin.blogs";
            $data['blogs'] = blogs::where('id',$request->id)->first(); 
         }
         $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('title','asc')->get();   

        return view('admin.blogs.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description'     => 'required',
                'status'     => 'required',
                // 'category'   => 'required',
            ]);
        }else{
            $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'  => 'required',
                'status'     => 'required',
                // 'category'  =>  'required',
            ]);
        }
       
        
        if($request->id){
              $blogs = blogs::findOrFail($request->id);
            //   $slug    = $blogs->slug;
        }else{
             $blogs = new blogs();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/blogs'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $blogs->image;
        }

        $blogs->title              = $request->title;
        $blogs->slug               = Str::slug($request->title);
        $blogs->image              = $imageName;
        $blogs->category           = $request->category;
        $blogs->description        = $request->description;
        $blogs->status             = $request->status;
        $blogs->save();
        
         
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $blogs->slug));
        $seo->page_title  = $request->title;
        $seo->keywords  = $request->title;
        $seo->description  = $request->title;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$blogs->slug.'/';
        $seo->preconnect  = url('/').'/'.$blogs->slug.'/';
        $seo->canonical  =  url('/').'/'.$blogs->slug.'/';
        $seo->og_title  = $request->title;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->title;
        $seo->og_url  =  url('/').'/'.$blogs->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $blogs->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
        
        
         
        if($request->id){
              $notify[] = ['success', 'blogs Updated Successfully'];
        }else{
              $notify[] = ['success', 'blogs Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $blogs = blogs::where('id', $id)->first();
        if(!empty($blogs)){
            
             $seo_Delete = seo::where('type',$blogs->slug)->first();
            
             if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
        
            
            $blogs->delete();
            $notify[] = ['success', 'blogs Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
