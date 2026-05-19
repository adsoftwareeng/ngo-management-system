<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Models\Award;
use Illuminate\Support\Str;
use App\Models\Designation;


class DesignationController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Award";
        $main_title     = "Award";
        $empty_message  = "No gallery yet";
        $delete_title = "award";
        $delete_url = "admin.award.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." award";
           $award  = award::where('type',$status)->orderby('id','desc')->get();
        }else{
            $award = award::orderby('id','desc')->get();   
        }
       
        return view('admin.award.index', compact('page_title', 'empty_message', 'award','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add Award";
            $data['go_back_url'] = "admin.award";
            $data['main_title']  = "gallery";
            $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update Award";
            $data['go_back_url'] = "admin.award";
            $data['award'] = award::where('id',$request->id)->first(); 
         }

        return view('admin.award.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
            $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
                'type'     => 'required',
            ]);
        }else{
             $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
                'type'     => 'required',
            ]);
        }
       
        

        if($request->id){
              $gallery = award::findOrFail($request->id);
            //   $slug    = $gallery->slug;
        }else{
             $gallery = new award();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/award'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $gallery->image;
        }

        $gallery->title              = $request->title;
        $gallery->slug               = Str::slug($request->title);
        $gallery->image              = $imageName;
        $gallery->status             = $request->status;
        $gallery->type             = $request->type;
        $gallery->save();

        if($request->id){
              $notify[] = ['success', 'award Updated Successfully'];
        }else{
              $notify[] = ['success', 'award Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $gallery = award::where('id', $id)->first();
        if(!empty($gallery)){
            $gallery->delete();
            $notify[] = ['success', 'award Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
