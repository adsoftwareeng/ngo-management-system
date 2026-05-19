<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Models\Seo;

class EventController extends Controller
{
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All event";
        $main_title     = "event";
        $empty_message  = "No event yet";
        $delete_title = "event";
        $delete_url = "admin.event.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." event";
           $event  = event::where('status',$status)->orderby('id','desc')->get();
        }else{
           $event = event::orderby('id','desc')->get();   
        }
       
        return view('admin.event.index', compact('page_title', 'empty_message', 'event','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add event";
            $data['go_back_url'] = "admin.event";
            $data['main_title']  = "event";
            
        if($request->id){

            $data['page_title']  = "Update event";
            $data['go_back_url'] = "admin.event";
            $data['event'] = event::where('id',$request->id)->first(); 
         }
        

        return view('admin.event.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                'name'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description'     => 'required',
                'status'     => 'required',
                'location'   => 'required',
                'event_date' => 'required',
                'type' => 'required',
            ]);
        }else{
            $request->validate([
                'name'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'  => 'required',
                'status'     => 'required',
                'location'  =>  'required',
                'event_date' => 'required',
                'type' => 'required',
            ]);
        }
       
        
        if($request->id){
              $event = event::findOrFail($request->id);
            //   $slug    = $event->slug;
        }else{
             $event = new event();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/event'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $event->image;
        }
        
     

        $event->name              = $request->name;
        $event->slug               = Str::slug($request->name);
        $event->image              = $imageName;
        $event->location           = $request->location;
        $event->description           = $request->description;
        $event->event_date         = $request->event_date;
        $event->type               = $request->type;
        $event->status             = $request->status;
        
        $event->is_registration    = $request->is_registration;
        $event->is_paid            = $request->is_paid;
        if($request->is_paid=='paid'){
           $event->fees               = $request->fees?$request->fees:0;         
        }else{
           $event->fees               = 0;
        }
        $event->save();
        
          // insert seo content 
        $seo = seo::firstOrNew(array('type' => $event->slug));
        $seo->page_title  = $request->name;
        $seo->keywords  = $request->name;
        $seo->description  = $request->name;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$event->slug.'/';
        $seo->preconnect  = url('/').'/'.$event->slug.'/';
        $seo->canonical  =  url('/').'/'.$event->slug.'/';
        $seo->og_title  = $request->name;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->name;
        $seo->og_url  =  url('/').'/'.$event->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $event->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
      
         
        if($request->id){
              $notify[] = ['success', 'event Updated Successfully'];
        }else{
              $notify[] = ['success', 'event Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }

    public function eventImages(Request $request)
    {
        $event = event::where('id',$request->slug)->first();
        $page_title     = $event->name." -  Images ";
        $main_title     = "event";
        $empty_message  = "No event yet";
        $delete_title = "event";
        $delete_url = "admin.gallery.delete";
        $status = 'image';
        
        $gallery = gallery::orderby('id','desc')->where('type','event')->where('service_id',$request->slug)->paginate(20);   
        
        return view('admin.event.images_list', compact('page_title', 'empty_message', 'event','gallery','delete_title','delete_url','main_title','status'));
    }
    
       public function addform(Request $request){
           
            $data['page_title']  = "Add Images";
            $data['go_back_url'] = route("admin.events.list",$request->id);
            $data['event_id'] = $request->id;
            $data['main_title']  = "event";
            // $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
            
        return view('admin.event.multiple_uploads',$data);
     }
   
   
    public function multistore(Request $request)
    {    
        $request->validate([
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
        ]);
    
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $imageName = time() . '-' . uniqid() . '.' . $image->extension();  
                $image->move(public_path('uploads/gallery'), $imageName);
    
                Gallery::create([
                    'image' => $imageName,
                    'type' => $request->type,
                    'service_id' => $request->event_id,
                    'status' => 'active'
                ]);
            }
    
            $notify[] = ['success', 'Event added successfully'];
            return redirect()->back()->withNotify($notify);
        }
    
        $notify[] = ['error', 'No files found for upload'];
        return redirect()->back()->withNotify($notify);
        
    }

    public function delete($id)
    {
        $event = event::where('id', $id)->first();
        if(!empty($event)){
            
             $seo_Delete = seo::where('type',$event->slug)->first();
            
             if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
            
            $event->delete();
            $notify[] = ['success', 'event Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
