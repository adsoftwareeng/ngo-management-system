<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Seo;

use Illuminate\Support\Str;


class SeoController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title  = "Seo List";
        $main_title     = "Seo";
        $empty_message  = "No seo yet";
        $delete_title = "seo";
        $seo = Seo::orderby('id','desc')->get();   
        return view('admin.seo.index', compact('page_title', 'empty_message', 'seo','main_title'));
    }
  
     public function form(Request $request){

            $data['go_back_url'] = "admin.seo";
            $data['main_title']  = "seo";
        if($request->id){

            $data['page_title']  = "Update  seo";
            $data['go_back_url'] = "admin.seo";
            $data['seo'] = seo::where('id',$request->id)->first(); 
         }
        
        return view('admin.seo.form',$data);
     }
   
    public function store(Request $request)
    {
        $request->validate([
            'page_title'=>'required',
            'keywords'=>'required',
            'description'=>'required',
            'author'=>'required',
            'dns_prefetch'=>'required',
            'preconnect'=>'required',
            'canonical'=>'required',
            'og_title'=>'required',
            'og_image_width'=>'required',
            'og_image_height'=>'required',
            'og_description'=>'required',
            'og_url'=>'required',
            'og_site_name'=>'required',
        ]);
      
        $seo = seo::findOrFail($request->id);
        $seo->page_title  = $request->page_title;
        $seo->keywords  = $request->keywords;
        $seo->description  = $request->description;
        $seo->author  = $request->author;
        $seo->dns_prefetch  = $request->dns_prefetch;
        $seo->preconnect  = $request->preconnect;
        $seo->canonical  = $request->canonical;
        $seo->og_title  = $request->og_title;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = $request->og_image_width;
        $seo->og_image_height  = $request->og_image_height;
        $seo->og_description  = $request->og_description;
        $seo->og_url  = $request->og_url;
        $seo->og_site_name  = $request->og_site_name;

        
         if($request->hasFile('og_image')) {
            if(!empty($seo->og_image)){
                $image_path = "public/uploads/seo/".$seo->og_image; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $image = generalSetting()->prefix.'-'.$seo->type.'.'.$request->og_image->extension();  
          $request->og_image->move(public_path('uploads/seo'), $image);
          $seo->og_image  = $image;
        }
        
        $seo->save();
 
          $notify[] = ['success', 'seo Updated Successfully'];
        return redirect()->back()->withNotify($notify);
    }

}
