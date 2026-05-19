<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallery;
use App\Models\Album;
use App\Models\Service;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Gallery";
        $main_title     = "Gallery";
        $empty_message  = "No gallery yet";
        $delete_title = "Gallery";
        $delete_url = "admin.gallery.delete";
        if($request->status){
           $status      =   $request->status;
           if($request->status=='image'){
              $page_title  = "Photo Gallery";
           }else{
              $page_title  = "News ";
           }
           $delete_title = $page_title;
           $gallery  = gallery::where('type',$status)->orderby('id','desc')->paginate(20);
        }else{
            $status = 'image';
           $gallery = gallery::orderby('id','desc')->where('type','!=','video')->where('type','!=','event')->paginate(20);   
        }
        
        $album = Album::where('status','active')->orderby('id','desc')->get();
       
        return view('admin.gallery.index', compact('page_title', 'empty_message', 'gallery','delete_title','delete_url','main_title','status','album'));
    }
    
    
  
  
  
     public function addform(Request $request){
            $type = $request->type=='press'?'News':'Gallery';
            $data['page_title']  = "Add ".$type;
            $data['go_back_url'] = route("admin.gallery.status",$request->type);
            $data['main_title']  = "gallery";
            $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
            
           $data['album'] = Album::where('status','active')->orderby('id','desc')->get();

        return view('admin.gallery.multiple_uploads',$data);
     }
   
    // public function multistore(Request $request)
    // {    
    //     $request->validate([
    //             'image'      => 'required',
    //             'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'type'     => 'required',
    //         ]);
        
        
    //     $album_id = $request->input('album_id', '');
    //     if ($request->hasFile('image')) {
           
    //          foreach($request->file('image') as $image){
    //              $imageName = time().'.'.$image->extension();  
    //              $image->move(public_path('uploads/gallery'), $imageName);
                 
    //              gallery::insert(['image'=>$imageName,'type'=>$request->type,
    //              'album_id'=>$album_id]);
    //          }   
    //          $notify[] = ['success', 'gallery Added Successfully'];
    //         return redirect()->back()->withNotify($notify);
    //     }
        
    //     $notify[] = ['error', 'No files found for upload.'];
    //       return redirect()->back()->withNotify($notify);
    // }
    
    public function multistore(Request $request)
{    
    // Validate the request data
    $request->validate([
        'image'      => 'required',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'type'     => 'required',
    ]);
    
    $album_id = $request->input('album_id', '');

    // Check if images are uploaded
    if ($request->hasFile('image')) {
        $imageData = [];

        // Process each image file
        foreach ($request->file('image') as $image) {
            // Generate a unique name for each image
            $imageName = time().'_'.$image->getClientOriginalName();

            // Move the file to the 'public/uploads/gallery' directory
            try {
                $image->move(public_path('uploads/gallery'), $imageName);
                
                // Add data to the array for bulk insert
                $imageData[] = [
                    'image' => $imageName,
                    'type' => $request->type,
                    'album_id' => $album_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            } catch (\Exception $e) {
                // Log the error and continue
                \Log::error('Error storing image: ' . $e->getMessage());
                $notify[] = ['error', 'Error uploading image.'];
                return redirect()->back()->withNotify($notify);
            }
        }

        // Bulk insert images into the database if images exist
        if (!empty($imageData)) {
            gallery::insert($imageData);
            $notify[] = ['success', 'Gallery Added Successfully'];
            return redirect()->back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'No valid images found for upload.'];
            return redirect()->back()->withNotify($notify);
        }
    }
    
    // Error message if no files were uploaded
    $notify[] = ['error', 'No files found for upload.'];
    return redirect()->back()->withNotify($notify);
}

    
     public function form(Request $request){

            $data['page_title']  = "Add gallery";
            $data['go_back_url'] = "admin.gallery";
            $data['main_title']  = "gallery";
            $data['service'] = Service::where('status','active')->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update gallery";
            $data['go_back_url'] = "admin.gallery";
            $data['gallery'] = gallery::where('id',$request->id)->first(); 
         }

        return view('admin.gallery.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
            $request->validate([
                // 'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
                // 'type'     => 'required',
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
              $gallery = gallery::findOrFail($request->id);
            //   $slug    = $gallery->slug;
        }else{
             $gallery = new gallery();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/gallery'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $gallery->image;
        }

        $gallery->title              = $request->title;
        $gallery->slug               = Str::slug($request->title);
        $gallery->image              = $imageName;
        $gallery->service_id         = $request->service_id ? $request->service_id:$gallery->service_id;
        
        $gallery->alt = $request->input('alt', '');
        $gallery->album_id = $request->input('album_id', '');

        $gallery->status             = $request->status;
        // $gallery->type             = $request->type;
        $gallery->save();

        if($request->id){
              $notify[] = ['success', 'gallery Updated Successfully'];
        }else{
              $notify[] = ['success', 'gallery Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $gallery = gallery::where('id', $id)->first();
        if(!empty($gallery)){
            $gallery->delete();
            $notify[] = ['success', 'gallery Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }


 // partner 
 
   public function partner(Request $request)
    {
        $data['page_title']     = "Partner List";
        $data['main_title']     = "Patner";
        $data['empty_message']  = "No gallery yet";
        $data['delete_title'] = "Partner";
        $data['delete_url'] = "admin.gallery.delete";
       
        $data['gallery'] = gallery::where('type','partner')->orderby('id','desc')->get();
        
        if($request->id){
             $data['partner'] = gallery::where('id',$request->id)->first();
             $data['title'] = 'Update Partner';
        }else{
           $data['title'] = 'Add Partner';
        }
       
        return view('admin.partner.index', $data);
    }
    
    public function partnerStore(Request $request)
    {
        $request->validate([
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status'     => 'required',
            ]);
        
        

        if($request->id){
              $gallery = gallery::findOrFail($request->id);
        }else{
             $gallery = new gallery();
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/gallery'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $gallery->image;
        }
        $gallery->image              = $imageName;
        $gallery->status             = $request->status;
        $gallery->type               = 'partner';
        $gallery->save();

        if($request->id){
              $notify[] = ['success', 'Partner Updated Successfully'];
        }else{
              $notify[] = ['success', 'Partner Added Successfully'];
        }
      
        return redirect()->route('admin.partner')->withNotify($notify);
    }
}
