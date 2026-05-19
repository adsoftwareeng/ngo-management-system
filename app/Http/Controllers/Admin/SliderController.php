<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;
use Illuminate\Support\Str;


class SliderController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Slider";
        $main_title     = "Slider";
        $empty_message  = "No slider yet";
        $delete_title = "slider";
        $delete_url = "admin.slider.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Slider";
           $slider  = slider::where('status',$status)->orderby('id','desc')->get();
        }else{
           $slider = slider::orderby('id','desc')->get();   
        }
       
        return view('admin.slider.index', compact('page_title', 'empty_message', 'slider','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add slider";
            $data['go_back_url'] = "admin.slider";
            $data['main_title']  = "slider";
            
        if($request->id){

            $data['page_title']  = "Update slider";
            $data['go_back_url'] = "admin.slider";
            $data['slider'] = slider::where('id',$request->id)->first(); 
         }

        return view('admin.slider.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                // 'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
            //   'description' => 'required',
            ]);
        }else{
            $request->validate([
                // 'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
                // 'description' => 'required',
            ]);
        }
     

        if($request->id){
              $slider = slider::findOrFail($request->id);
              $slug    = $slider->slug;
        }else{
             $slider = new slider();
             $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/slider'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $slider->image;
        }

        $slider->title              = $request->title;
        $slider->slug               = $slug;
        $slider->image              = $imageName;
        $slider->url                = $request->url;
        $slider->status             = $request->status;
        $slider->description        = $request->description;
        $slider->color              = $request->color;
        $slider->save();
        

        if($request->id){
              $notify[] = ['success', 'slider Updated Successfully'];
        }else{
              $notify[] = ['success', 'slider Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $slider = slider::where('id', $id)->first();
        if(!empty($slider)){
            $slider->delete();
            $notify[] = ['success', 'slider Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
