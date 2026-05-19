<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;

use Illuminate\Support\Str;


class PageController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    { 
        $status =   $request->status;
        if($status){
                $page_title  = ucfirst($status);
                $main_title     = $status;
                $page = page::where('type',$status)->orderby('id','desc')->get();   
        }else{
                $page_title  = "Why Choose Us page";
                $main_title     = "page";
              $page = page::where('type','whyChooseUs')->orderby('id','desc')->get();    
        }
        $empty_message  = "No page yet";
        $delete_title = "page";
        
        return view('admin.page.index', compact('page_title', 'empty_message', 'page','main_title'));
    }
  
     public function form(Request $request){

         
            $data['go_back_url'] = "admin.page";
            $data['main_title']  = "page";
            // dd($request->type);
        if($request->type){

            $data['page_title']  = $request->type." page";
            $data['go_back_url'] = "admin.page";
            $page = page::where('type',$request->type)->first(); 
            $data['type'] = $page->type;
            $data['page'] = $page;
            
         }elseif($request->id){

             $page = page::where('id',$request->id)->first();
            $data['page_title']  = "Update ";
            $data['go_back_url'] = "admin.page"; 
            $data['type'] = $page->type;
            $data['page'] = $page;
         }
        //   dd($data);
         if($request->type=='about' || $request->type=='president'){
             return view('admin.page.about',$data);
         }elseif($request->type=='home'){
             return view('admin.page.home',$data);
         }elseif($request->type=='mission_vission'){
             return view('admin.page.mission_vission',$data);
         }elseif($request->type=='how_to_help_us'){
             return view('admin.page.how_to_help_us',$data);
         }else{
             return view('admin.page.form',$data);
         }
     }
   
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string'
        ]);
        
        if($request->id){
            $page = page::findOrFail($request->id);
        }else{
            $page = new page();
        }
        
        if($request->type == 'how_to_help_us'){
           $description =  json_encode($request->description);
        }else{
           $description =  $request->description;
        }
        
        $page->title              = $request->title;
        $page->slug               = Str::slug($request->name);
        $page->summary            = $request->summary;
        $page->description        = $description;
        $page->url               = getEmbedUrl($request->url);
        $page->url2            = getEmbedUrl($request->url2);
        $page->type            = $request->type;
        $page->popup_show      = $request->popup_show?:'hide';
        
        
         if($request->hasFile('image')) {
            if(!empty($page->image)){
                $image_path = "public/uploads/page/".$page->image; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
           if($request->type=='about'){
                $image = 'about.'.$request->image->extension(); 
           }else{
                $image =  time().'.'.$request->image->extension(); 
           } 
           
          $request->image->move(public_path('uploads/page'), $image);
          $page->image  = $image;
        }
        
        // image2
        if($request->hasFile('image2')) {
            $image2 = []; // Initialize an array to store image file names/paths
        
            foreach($request->file('image2') as $img2) {
                // Generate a unique file name for each image
                $imageName = time() . '_' . uniqid() . '.' . $img2->extension();
        
                // Move the image to the 'uploads/page' directory
                $img2->move(public_path('uploads/page'), $imageName);
        
                // Add the image file name to the array
                $image2[] = $imageName;
            }
        
            // Save the images as a JSON-encoded array in the database
            $page->image2 = json_encode($image2);
        }

        // image 3 
        
        if($request->hasFile('image3')) {
            $image3 = []; // Initialize an array to store image file names/paths
        
            foreach($request->file('image3') as $img3) {
                // Generate a unique file name for each image
                $imageName = time() . '_' . uniqid() . '.' . $img3->extension();
        
                // Move the image to the 'uploads/page' directory
                $img3->move(public_path('uploads/page'), $imageName);
        
                // Add the image file name to the array
                $image3[] = $imageName;
            }
        
            // Save the images as a JSON-encoded array in the database
            $page->image3 = json_encode($image3);
        }

    
        // end 
        
        // breadcrumbs
         if($request->hasFile('breadcrumbs')) {
            if(!empty($page->breadcrumbs)){
                $image_path = "public/uploads/page/".$page->breadcrumbs; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
                  $breadcrumbs =  time().'.'.$request->breadcrumbs->extension(); 
           
           
          $request->breadcrumbs->move(public_path('uploads/page'),$breadcrumbs);
          $page->breadcrumbs  = $breadcrumbs;
        }
        // breadcrumbs
        
         // popup
         if($request->hasFile('popup')) {
            if(!empty($page->popup)){
                $image_path = "public/uploads/page/".$page->popup; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
                  $popup =  time().'.'.$request->popup->extension(); 
           
           
          $request->popup->move(public_path('uploads/page'),$popup);
          $page->popup  = $popup;
        }
        // popup
        
        $page->save();
 
          $notify[] = ['success', 'page Updated Successfully'];
        return redirect()->back()->withNotify($notify);
    }
    
      public function editCard(Request $request){

         
            $data['go_back_url'] = "admin.page";
            $data['main_title']  = "page";
            $data['page'] = page::where('type',$request->type)->first();
            $data['page_title']  = "Update ".$request->type;
        return view('admin.page.updateCard',$data);
     }

}
