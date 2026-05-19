<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Seo;

class ServiceController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Projects";
        $main_title     = "Projects";
        $empty_message  = "No Projects yet";
        $delete_title = "Projects";
        $delete_url = "admin.service.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Projects";
           $service  = service::where('status',$status)->orderby('id','desc')->get();
        }else{
           $service = service::orderby('id','desc')->get();   
        }
       
        return view('admin.service.index', compact('page_title', 'empty_message', 'service','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add Projects";
            $data['go_back_url'] = "admin.service";
            $data['main_title']  = "Projects";
            
        if($request->id){

            $data['page_title']  = "Update Projects";
            $data['go_back_url'] = "admin.service";
            $service = service::where('id',$request->id)->first(); 
            $data['seo_service'] = Seo::where('type',$service->slug)->first();
            $data['service'] = $service;
         }

        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        return view('admin.service.form',$data);
     }
   
    public function store(Request $request)
    {
       
        if($request->id){
            $request->validate([
                'title'       => 'required|string',
                // 'category'   => 'required',
                'image'      =>   'image|mimes:jpeg,png,jpg,webp|max:2048',
                // 'summary'     => 'required',
                // "no_of_pages" => "required",
                // "project_fee" => "required",
                'description'     => 'required',
                'status'     => 'required',
            ]);
        }else{
            $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                // 'summary'     => 'required',
                // "no_of_pages" => "required",
                // "project_fee" =>   "required",
                'description'     => 'required',
                'status'     => 'required',
                // 'category'   => 'required',
            ]);
        }
       

        if($request->id){
              $service = service::findOrFail($request->id);
            //   $slug    = $service->slug;
        }else{
             $service = new service();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/service'), $imageName);
                      $service->image              = $imageName;
        }
        
        if ($request->hasFile('breadcrumbs')) {
             $breadcrumbs = 'breadcrumbs-'.time().'.'.$request->breadcrumbs->extension();  
             $request->breadcrumbs->move(public_path('uploads/service'), $breadcrumbs);
             $service->breadcrumbs = $breadcrumbs;
        }
        
        

        $service->title              = $request->title;
        $service->category           = $request->category?:1;
        $service->subcategory        = $request->subcategory?:'1';
        

        $service->slug               = Str::slug($request->title);
        
        $service->no_of_pages        = $request->no_of_pages?:1;
        $service->project_fee        = $request->project_fee?:'free';
        $service->description        = $request->description;
        $service->status             = $request->status;
        
        $service->save();
        
       
        if($request->id){
              $notify[] = ['success', 'Projects Updated Successfully'];
        }else{
              $notify[] = ['success', 'Projects Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $service = service::where('id', $id)->first();
        if(!empty($service)){
            $service->delete();
            $notify[] = ['success', 'Projects Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
