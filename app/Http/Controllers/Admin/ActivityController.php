<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Models\Activity;
use App\Models\Seo;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $page_title     = "All activity";
        $main_title     = "activity";
        $empty_message  = "No activity yet";
        $delete_title = "activity";
        $delete_url = "admin.activity.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." activity";
           $activity  = activity::where('status',$status)->orderby('id','desc')->get();
        }else{
           $activity = activity::orderby('id','desc')->get();   
        }
       
        return view('admin.activity.index', compact('page_title', 'empty_message', 'activity','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add activity";
            $data['go_back_url'] = "admin.activity";
            $data['main_title']  = "activity";
            
        if($request->id){

            $data['page_title']  = "Update activity";
            $data['go_back_url'] = "admin.activity";
            $data['activity'] = activity::where('id',$request->id)->first(); 
         }
        

        return view('admin.activity.form',$data);
     }
   
    public function store(Request $request)
    {
            $rules = [
                        'type' => 'required',
                        'name' => 'required|string',
                        'description' => 'required',
                        // 'location' => 'required',
                        // 'city' => 'required',
                        // 'start_date' => 'required',
                        // 'end_date' => 'required',
                        'status' => 'required',
                    ];
                    
                    if ($request->type == 'video') {
                        $rules['image'] = 'required|url';
                    } else {
                        $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
                    }
                    
                    if ($request->id) {
                        $rules['image'] = str_replace('required|', '', $rules['image']); // Remove 'required' if $request->id is present
                    }
                    
                    $request->validate($rules);
       
        
        if($request->id){
              
              $activity = activity::findOrFail($request->id);
              
        }else{
             
             $activity = new activity();
    
         }
        
        if($request->type=='video'){
            
            $imageName = getEmbedUrl($request->image);
        
        }else{
            
            if ($request->hasFile('image')) {
    
                try {
                      $imageName = time().'.'.$request->image->extension();  
                      $request->image->move(public_path('uploads/activity'), $imageName);
                    
                } catch (\Exception $exp) {
                    return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
                }
            }else{
                $imageName = $activity->image;
            }
            
        }
        
        $activity->type                = $request->type;        
        $activity->name                = $request->name;
        $activity->slug                = Str::slug($request->name);
        $activity->image               = $imageName;
        $activity->description         = $request->description;
        $activity->location            = $request->location;
        $activity->city                = $request->city;
        $activity->start_date          = $request->start_date;
        $activity->end_date            = $request->end_date;
        $activity->status              = $request->status;
        
        $activity->save();
         
         
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $activity->slug));
        $seo->page_title  = $request->name;
        $seo->keywords  = $request->name;
        $seo->description  = $request->name;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$activity->slug.'/';
        $seo->preconnect  = url('/').'/'.$activity->slug.'/';
        $seo->canonical  =  url('/').'/'.$activity->slug.'/';
        $seo->og_title  = $request->name;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->name;
        $seo->og_url  =  url('/').'/'.$activity->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $activity->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
         
        if($request->id){
              $notify[] = ['success', 'activity Updated Successfully'];
        }else{
              $notify[] = ['success', 'activity Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }

  

    public function delete($id)
    {
        
        $activity = activity::where('id', $id)->first();
        
        if(!empty($activity)){
            
            
        $seo_Delete = seo::where('type',$activity->slug)->first();
            
          if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
            
            
            $activity->delete();
            
            $notify[] = ['success', 'activity Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}