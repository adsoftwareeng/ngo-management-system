<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimonials;

use Illuminate\Support\Str;


class TestimonialsController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All testimonials";
        $main_title     = "Testimonials";
        $empty_message  = "No testimonials yet";
        $delete_title = "testimonials";
        $delete_url = "admin.testimonials.delete";
        if($request->status){
           $type = $request->type??'normal';
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Testimonial";
           $testimonials  = testimonials::where('status',$status)->where('type', $type)->orderby('id','desc')->get();
        }else{
           $testimonials = testimonials::where('type','normal')->orderby('id','desc')->get();   
        }
       
        return view('admin.testimonials.index', compact('page_title', 'empty_message', 'testimonials','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add testimonials";
            $data['go_back_url'] = "admin.testimonials";
            $data['main_title']  = "Testimonials";
            
        if($request->id){

            $data['page_title']  = "Update Testimonials";
            $data['go_back_url'] = "admin.testimonials";
            $data['testimonials'] = testimonials::where('id',$request->id)->first(); 
         }

        return view('admin.testimonials.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                'name'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description'     => 'required',
                'status'     => 'required',
            ]);
        }else{
            $request->validate([
                'name'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'     => 'required',
                'status'     => 'required',
            ]);
        }
       
        
        if($request->id){
              $testimonials = testimonials::findOrFail($request->id);
            //   $slug    = $testimonials->slug;
        }else{
             $testimonials = new testimonials();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/testimonials'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $testimonials->image;
        }

        $testimonials->name              = $request->name;
        $testimonials->slug               = Str::slug($request->name);
        $testimonials->image              = $imageName;
        $testimonials->description        = $request->description;
        $testimonials->case_id            = $request->case_id?$request->case_id:'';
        $testimonials->type               = $request->type??'normal';
        $testimonials->status             = $request->status;
        $testimonials->save();

        if($request->id){
              $notify[] = ['success', ' Updated Successfully'];
        }else{
              $notify[] = ['success', ' Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $testimonials = testimonials::where('id', $id)->first();
        if(!empty($testimonials)){
            $testimonials->delete();
            $notify[] = ['success', 'Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
