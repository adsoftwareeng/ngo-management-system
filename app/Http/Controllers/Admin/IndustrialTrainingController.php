<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\training;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Seo;

class IndustrialTrainingController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All training";
        $main_title     = "training";
        $empty_message  = "No training yet";
        $delete_title = "training";
        $delete_url = "admin.training.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." training";
           $training  = training::where('status',$status)->orderby('id','desc')->get();
        }else{
           $training = training::orderby('id','desc')->get();   
        }
       
        return view('admin.training.index', compact('page_title', 'empty_message', 'training','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add training";
            $data['go_back_url'] = "admin.training";
            $data['main_title']  = "training";
            
        if($request->id){

            $data['page_title']  = "Update training";
            $data['go_back_url'] = "admin.training";
            $training = training::where('id',$request->id)->first(); 
            $data['seo_training'] = Seo::where('type',$training->slug)->first();
            $data['training'] = $training;
         }

        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        return view('admin.training.form',$data);
     }
   
    public function store(Request $request)
    {
       
        // if($request->id){
        //     $request->validate([
        //         'title'       => 'required|string',
        //         // 'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
        //         // 'summary'     => 'required',
        //         'description'     => 'required',
        //         'status'     => 'required',
        //         'category'   => 'required',
        //     ]);
        // }else{
            $request->validate([
                'title'       => 'required',
                // 'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                // 'summary'     => 'required',     
                'category'   => 'required',
                'description'     => 'required',
                'status'     => 'required',
            ]);
        // }
       

        if($request->id){
              $training = training::findOrFail($request->id);
        }else{
             $training = new training();
         }

        // if ($request->hasFile('image')) {
        //           $imageName = time().'.'.$request->image->extension();  
        //           $request->image->move(public_path('uploads/training'), $imageName);
        //               $training->image              = $imageName;
        // }
        
        // if ($request->hasFile('breadcrumbs')) {
        //      $breadcrumbs = time().'.'.$request->breadcrumbs->extension();  
        //      $request->breadcrumbs->move(public_path('uploads/training'), $breadcrumbs);
        //      $training->breadcrumbs = $breadcrumbs;
        // }
        
        

        $training->title              = $request->title;
        $training->category           = $request->category;

        $training->slug               = Str::slug($request->title);
        // $training->summary            = $request->summary;
        $training->description        = $request->description;
        $training->status             = $request->status;
        
        $training->save();
        
       
        if($request->id){
              $notify[] = ['success', 'training Updated Successfully'];
        }else{
              $notify[] = ['success', 'training Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $training = training::where('id', $id)->first();
        if(!empty($training)){
            $training->delete();
            $notify[] = ['success', 'training Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
