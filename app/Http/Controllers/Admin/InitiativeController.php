<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Models\initiative;
use App\Models\Gallery;
use Illuminate\Support\Str;
use App\Models\Initiative;
use App\Models\Seo;

class InitiativeController extends Controller
{
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All initiative";
        $main_title     = "initiative";
        $empty_message  = "No initiative yet";
        $delete_title = "initiative";
        $delete_url = "admin.initiative.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." initiative";
           $initiative  = initiative::where('status',$status)->orderby('id','desc')->get();
        }else{
           $initiative = initiative::orderby('id','desc')->get();   
        }
       
        return view('admin.initiative.index', compact('page_title', 'empty_message', 'initiative','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add initiative";
            $data['go_back_url'] = "admin.initiative";
            $data['main_title']  = "initiative";
            
        if($request->id){

            $data['page_title']  = "Update initiative";
            $data['go_back_url'] = "admin.initiative";
            $data['initiative'] = initiative::where('id',$request->id)->first(); 
         }
        

        return view('admin.initiative.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                'name'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description'     => 'required',
                'status'     => 'required',
                // 'location'   => 'required',
                // 'initiative_date' => 'required',
                // 'type' => 'required',
            ]);
        }else{
            $request->validate([
                'name'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'  => 'required',
                'status'     => 'required',
                // 'location'  =>  'required',
                // 'initiative_date' => 'required',
                // 'type' => 'required',
            ]);
        }
       
        
        if($request->id){
              $initiative = initiative::findOrFail($request->id);
            //   $slug    = $initiative->slug;
        }else{
             $initiative = new initiative();
            //  $slug = Str::slug($request->title);
         }
        if ($request->hasFile('image')) {
           
        
            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/initiative'), $imageName);
               } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $initiative->image;
        }
        
     

        $initiative->name              = $request->name;
        $initiative->slug               = Str::slug($request->name);
        $initiative->image              = $imageName;
        // $initiative->location           = $request->location;
        $initiative->description           = $request->description;
        // $initiative->initiative_date         = $request->initiative_date;
        // $initiative->type               = $request->type;
        $initiative->status             = $request->status;
        
        // $initiative->is_registration    = $request->is_registration;
        $initiative->add_more            = $request->add_more;

        $initiative->save();
        
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $initiative->slug));
        $seo->page_title  = $request->name;
        $seo->keywords  = $request->name;
        $seo->description  = $request->name;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$initiative->slug.'/';
        $seo->preconnect  = url('/').'/'.$initiative->slug.'/';
        $seo->canonical  =  url('/').'/'.$initiative->slug.'/';
        $seo->og_title  = $request->name;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->name;
        $seo->og_url  =  url('/').'/'.$initiative->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $initiative->slug;

        //  if($request->hasFile('image')) {
        //       $seoImage = 
        //       generalSetting()->prefix.'-'.$initiative->slug.'.'.$request->file('image')->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
        
         $seo->save();
        
        // end insert seo content 
        
         
        if($request->id){
              $notify[] = ['success', 'initiative Updated Successfully'];
        }else{
              $notify[] = ['success', 'initiative Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }

    public function initiativeImages(Request $request)
    {
        $initiative = initiative::where('id',$request->slug)->first();
        $page_title     = $initiative->name." -  Images ";
        $main_title     = "initiative";
        $empty_message  = "No initiative yet";
        $delete_title = "initiative";
        $delete_url = "admin.gallery.delete";
        $status = 'image';
        
        $gallery = gallery::orderby('id','desc')->where('type','initiative')->where('service_id',$request->slug)->paginate(20);   
        
        return view('admin.initiative.images_list', compact('page_title', 'empty_message', 'initiative','gallery','delete_title','delete_url','main_title','status'));
    }
    
       public function addform(Request $request){
           
            $data['page_title']  = "Add Images";
            $data['go_back_url'] = route("admin.initiative.list",$request->id);
            $data['initiative_id'] = $request->id;
            $data['main_title']  = "initiative";
            // $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
            
        return view('admin.initiative.multiple_uploads',$data);
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
                    'service_id' => $request->initiative_id,
                    'status' => 'active'
                ]);
            }
    
            $notify[] = ['success', 'initiative added successfully'];
            return redirect()->back()->withNotify($notify);
        }
    
        $notify[] = ['error', 'No files found for upload'];
        return redirect()->back()->withNotify($notify);
        
    }

    public function delete($id)
    {
        $initiative = initiative::where('id', $id)->first();
        if(!empty($initiative)){
            
             $seo_Delete = seo::where('type',$initiative->slug)->first();
            
             if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
            
            $initiative->delete();
            $notify[] = ['success', 'initiative Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}