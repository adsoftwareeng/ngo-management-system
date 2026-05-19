<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Seo;

class CourseController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All course";
        $main_title     = "course";
        $empty_message  = "No course yet";
        $delete_title = "course";
        $delete_url = "admin.course.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." course";
           $course  = course::where('status',$status)->orderby('id','desc')->get();
        }else{
           $course = course::orderby('id','desc')->get();   
        }
       
        return view('admin.course.index', compact('page_title', 'empty_message', 'course','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add course";
            $data['go_back_url'] = "admin.course";
            $data['main_title']  = "course";
            
        if($request->id){

            $data['page_title']  = "Update course";
            $data['go_back_url'] = "admin.course";
            $course = course::where('id',$request->id)->first(); 
            $data['seo_course'] = Seo::where('type',$course->slug)->first();
            $data['course'] = $course;
         }

        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        return view('admin.course.form',$data);
     }
   
    
  
    public function store(Request $request)
    {
       
        // if($request->id){
            $request->validate([
                'title'       => 'required|string',
                // 'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                // 'category'   => 'required',
                // 'class_mode' => 'required',
                'duration' => 'required',
                // 'description'     => 'required',
                'status'     => 'required',
            ]);
        // }else{
        //     $request->validate([
        //         'title'       => 'required|string',
        //         'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
        //         'category'   => 'required',
        //         'class_mode' => 'required',
        //         'regular_time' => 'required',
        //         'description'     => 'required',
        //         'status'     => 'required',
        //     ]);
        // }
       

        if($request->id){
              $course = course::findOrFail($request->id);
            //   $slug    = $course->slug;
        }else{
             $course = new course();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/course'), $imageName);
                      $course->image              = $imageName;
        }
        
        if ($request->hasFile('brochure')) {
             $brochure = time().'.'.$request->brochure->extension();  
             $request->brochure->move(public_path('uploads/course'), $brochure);
             $course->brochure = $brochure;
        }
        
        

        $course->title              = $request->title;
        $course->slug               = Str::slug($request->title);
        // $course->category           = $request->category;
        // $course->subcategory        = $request->subcategory;
        // $course->class_mode         = $request->class_mode;
        // $course->online_mode        = $request->online_mode;
        // $course->regular_time       = $request->regular_time;
        $course->duration         = $request->duration;
        // $course->description        = $request->description;
        $course->status             = $request->status;
        
        $course->save();
        
       
        if($request->id){
              $notify[] = ['success', 'course Updated Successfully'];
        }else{
              $notify[] = ['success', 'course Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $course = course::where('id', $id)->first();
        if(!empty($course)){
            $course->delete();
            $notify[] = ['success', 'course Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
