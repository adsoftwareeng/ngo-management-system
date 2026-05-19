<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Models\Donation;
use Illuminate\Support\Str;


class DonationController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All donation";
        $main_title     = "donation";
        $empty_message  = "No gallery yet";
        $delete_title = "donation";
        $delete_url = "admin.donation.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." donation";
           $donation  = donation::where('type',$status)->orderby('id','desc')->get();
        }else{
            $donation = donation::orderby('id','desc')->get();   
        }
       
        return view('admin.donation.index', compact('page_title', 'empty_message', 'donation','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add donation";
            $data['go_back_url'] = "admin.donation";
            $data['main_title']  = "gallery";
            $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update donation";
            $data['go_back_url'] = "admin.donation";
            $data['donation'] = donation::where('id',$request->id)->first(); 
         }

        return view('admin.donation.form',$data);
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
              $gallery = donation::findOrFail($request->id);
            //   $slug    = $gallery->slug;
        }else{
             $gallery = new donation();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/donation'), $imageName);
                
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
              $notify[] = ['success', 'donation Updated Successfully'];
        }else{
              $notify[] = ['success', 'donation Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $gallery = donation::where('id', $id)->first();
        if(!empty($gallery)){
            $gallery->delete();
            $notify[] = ['success', 'donation Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
