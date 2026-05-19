<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{Cases,Testimonials};
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Seo;

class CaseListController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All cases";
        $main_title     = "cases";
        $empty_message  = "No cases yet";
        $delete_title = "cases";
        $delete_url = "admin.cases.delete";
        if($request->status){
            // dd($request->status);
           $status      =   $request->status;
           $page_title  = ucfirst($status)." cases";
           $cases  = cases::where('type',$status)->orderby('id','desc')->get();
        }else{
           $cases = cases::orderby('id','desc')->get();   
        }
       
        return view('admin.cases.index', compact('page_title', 'empty_message', 'cases','delete_title','delete_url','main_title'));
    }
  
    public function testimonials(Request $request)
    {
        $page_title     = "All testimonials";
        $main_title     = "Testimonials";
        $empty_message  = "No testimonials yet";
        $delete_title = "testimonials";
        $delete_url = "admin.testimonials.delete";
       
        $testimonial = testimonials::where(['type'=>'success','case_id'=>$request->id])->orderby('id','desc')->get(); 
        $data['case_id'] = $request->id;
        return view('admin.cases.testimonial', $data, compact('page_title', 'empty_message', 'testimonial','delete_title','delete_url','main_title'));
    }
    
     public function form(Request $request){

            $data['page_title']  = "Add cases";
            $data['go_back_url'] = "admin.cases";
            $data['main_title']  = "cases";
            
        if($request->id){

            $data['page_title']  = "Update cases";
            $data['go_back_url'] = "admin.cases";
            $cases = cases::where('id',$request->id)->first(); 
            $data['seo_cases'] = Seo::where('type',$cases->slug)->first();
            $data['cases'] = $cases;
         }

        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        return view('admin.cases.form',$data);
     }
   
    
  
    public function store(Request $request)
    {
        if($request->id){
            $request->validate([
                'title'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'description'   => 'required',
                // 'beneficiary_form' => 'required',
                'type'     => 'required',
                'status'     => 'required',
            ]);
        }else{
            $request->validate([
                'title'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'   => 'required',
                'beneficiary_form' => 'required',
                'type' => 'required',
                'status'     => 'required',
            ]);
        }
       
        if($request->id){
              $cases = cases::findOrFail($request->id);
        }else{
             $cases = new cases();
         }

        if ($request->hasFile('image')) {
             $imageName = time().'.'.$request->image->extension();  
           $request->image->move(public_path('uploads/cases'), $imageName);
            $cases->image              = $imageName;
        }
        
        if ($request->hasFile('beneficiary_form')) {
             $brochure = time().'.'.$request->beneficiary_form->extension();  
             $request->beneficiary_form->move(public_path('uploads/cases'), $brochure);
             $cases->beneficiary_form = $brochure;
        }
        
    
        if ($request->hasFile('discharge_summny')) {
                 $discharge_summny = time().'.'.$request->discharge_summny->extension();  
                 $request->discharge_summny->move(public_path('uploads/cases'), $discharge_summny);
                 $cases->discharge_summny = $discharge_summny;
            }
            
        

        $cases->title              = $request->title;
        $cases->slug               = Str::slug($request->title);
        $cases->donation_url         = $request->donation_url??'';
        $cases->video_url           = getEmbedUrl($request->video_url)??'';
        $cases->description        = $request->description;
        $cases->type              = $request->type;
        $cases->status             = $request->status;
        $cases->save();
        
       
       
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $cases->slug));
        $seo->page_title  = $request->title;
        $seo->keywords  = $request->title;
        $seo->description  = $request->title;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$cases->slug.'/';
        $seo->preconnect  = url('/').'/'.$cases->slug.'/';
        $seo->canonical  =  url('/').'/'.$cases->slug.'/';
        $seo->og_title  = $request->title;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->title;
        $seo->og_url  =  url('/').'/'.$cases->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $cases->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
        
        if($request->id){
              $notify[] = ['success', 'cases Updated Successfully'];
        }else{
              $notify[] = ['success', 'cases Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $cases = cases::where('id', $id)->first();
        if(!empty($cases)){
            
            
             $seo_Delete = seo::where('type',$cases->slug)->first();
            
             if(!empty($seo_Delete)){
                $seo_Delete->delete();
            }
            
            $cases->delete();
            $notify[] = ['success', 'cases Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
