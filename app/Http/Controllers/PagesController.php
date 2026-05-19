<?php
namespace App\Http\Controllers;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Enquiry;
use App\Models\Blogs;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Testimonials;
use App\Models\Seo;
use App\Models\Category;
use App\Models\Course;

class PagesController extends Controller
{
    //
  
    public function about(){
        $about = Page::where('type','about')->first();
        $data['blogs'] = blogs::where('status','active')->orderbyDesc('id')->get();
        $data['type'] = $about->type;
        $data['about'] = $about;
        $data['page_title'] = "About Us";
        return view('about',$data);
    }


      public function mission_vission(){
        $data['mission'] = Page::where('type','mission_vission')->first();
        $data['about'] = Page::where('type','about')->first();
        $data['blogs'] = blogs::where('status','active')->orderbyDesc('id')->get();
        $data['page_title'] = "Mission Vission";
        
        $data['testimonial'] = Testimonials::where(['status'=>'active','type'=>'normal'])->orderbyDesc('id')->get();
        $data['type'] = 'mission_vission';
        return view('mission_vission',$data);
    }

     public function pages(Request $request){
        $about = Page::where('type',$request->type)->first();
        $data['type'] = $about->type;
   
        if($request->type=='president'){
           $data['page_title'] = 'President Message';         
        }else{
           $data['page_title'] = $about->title;
        }
   
        $data['about'] = $about;
        return view('about',$data);
     }

    
}
