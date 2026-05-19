<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All category";
        $empty_message  = "No category yet";
        $delete_title = "category";
        $delete_url = "admin.category.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." category";
           $category  = category::where('parent_id','0')->where('type',$status)->orderby('id','desc')->get();
        }else{
           $category = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        }
       
        return view('admin.category.index', compact('page_title', 'empty_message', 'category','delete_title','delete_url'));
    }
  
    
     public function category_form(Request $request){

            $data['page_title']  = "Add category";
            $data['go_back_url'] = "admin.category";
            
        if($request->id){

            $data['page_title']  = "Update category";
            $data['go_back_url'] = "admin.category";
            $data['category'] = category::where('id',$request->id)->first(); 
         }

        return view('admin.category.form',$data);
     }
   
    public function category_store(Request $request)
    {
        if($request->id){
            $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required',
                'status'     => 'required',
            ]);
        }else{
             $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description' => 'required',
                'status'     => 'required',
            ]);
        }
       
        

        if($request->id){
              $category = category::findOrFail($request->id);
        }else{
             $category = new category();
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/category'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $category->image;
        }

        $category->parent_id         =  0;
        $category->title              = $request->title;
        $category->slug               = Str::slug($request->title);
        $category->image              = $imageName;
        $category->description         = $request->description;
        $category->status             = $request->status;
        $category->type             = 'category';
        $category->save();

        if($request->id){
              $notify[] = ['success', 'category Updated Successfully'];
        }else{
              $notify[] = ['success', 'category Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $category = category::where('id', $id)->first();
        if(!empty($category)){
            $category->delete();
            $notify[] = ['success', 'category Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
