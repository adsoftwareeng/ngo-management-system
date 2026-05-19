<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All subcategory";
        $empty_message  = "No subcategory yet";
        $delete_title = "subcategory";
        $delete_url = "admin.subcategory.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." subcategory";
           $subcategory  = category::where('parent_id','!=','0')->where('type',$status)->orderby('id','desc')->get();
        }else{
           $subcategory = category::where('parent_id','!=','0')->where('type','subcategory')->orderby('id','desc')->get();   
        }
        
        return view('admin.subcategory.index', compact('page_title', 'empty_message', 'subcategory','delete_title','delete_url'));
    }
  
    public function fetchSubcategory(Request $request)
    {
        $data['subcategory'] = category::where('parent_id','!=',0)->where("parent_id", $request->cate_id)
                                ->get(["id", "title","parent_id"]);
  
        return response()->json($data);
    }
    
     public function subcategory_form(Request $request){

            $data['page_title']  = "Add subcategory";
            $data['go_back_url'] = "admin.subcategory";
            
        if($request->id){

            $data['page_title']  = "Update subcategory";
            $data['go_back_url'] = "admin.subcategory";
            $data['subcategory'] = category::where('id',$request->id)->first(); 
         }
         $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('title','asc')->get();   

        return view('admin.subcategory.form',$data);
     }
   
    public function subcategory_store(Request $request)
    {
        if($request->id){
            $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                // 'description' => 'required',
                'status'     => 'required',
                'category'  => 'required',
            ]);
        }else{
             $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                // 'description' => 'required',
                'status'     => 'required',
                'category'  => 'required',
            ]);
        }
       
        

        if($request->id){
              $subcategory = category::findOrFail($request->id);
        }else{
             $subcategory = new category();
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/category'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $subcategory->image;
        }

        $subcategory->parent_id         =  $request->category;
        $subcategory->title              = $request->title;
        $subcategory->slug               = Str::slug($request->title);
        $subcategory->image              = $imageName;
        // $subcategory->description         = $request->description;
        $subcategory->status             = $request->status;
        $subcategory->type             = 'subcategory';
        $subcategory->save();

        if($request->id){
              $notify[] = ['success', 'subcategory Updated Successfully'];
        }else{
              $notify[] = ['success', 'subcategory Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $subcategory = category::where('id', $id)->first();
        if(!empty($subcategory)){
            $subcategory->delete();
            $notify[] = ['success', 'subcategory Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
