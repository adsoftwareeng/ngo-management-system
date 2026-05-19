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
use App\Models\Initiative;
use App\Models\Team;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        $data['slider'] = slider::where('status','active')->orderby('id','desc')->get();   
        $data['services']  = service::where('status','active')->orderby('id','desc')->take(9)->get();
        $data['whychoose'] = Page::where('type','whyChooseUs')->get();
        $data['gallery'] = Gallery::where('status','active')->where('type','image')->orderby('id','desc')->take(9)->get(); 
        $data['blogs'] = blogs::where('status','active')->orderbyDesc('id')->take(3)->get();
        $data['testimonial'] = Testimonials::where(['status'=>'active','type'=>'normal'])->orderbyDesc('id')->get();
        $data['about'] = Page::where('type','about')->first();
        $data['msg'] = Page::where('type','president')->first();
        $data['seo'] = Seo::where('type','home')->first();
        
        $data['course'] = course::where('status','active')->orderbydesc('id')->get();
        $data['events'] = Initiative::where('status','active')->orderby('id','desc')->take(6)->get();   
        $data['page_title'] = "Home";
        return view('home',$data);
    }
   
    public function course(){
        $data['course'] = course::where('status','active')->orderbydesc('id')->get();
        $data['page_title'] = "Our Courses";
        return view('course',$data);
    }

    public function services(){
       $data['services']  = service::where('status','active')->orderby('id','desc')->get();  
       $data['seo'] = Seo::where('type','services')->first();
        $data['page_title'] = "Projects";
        return view('services',$data);
    }
   public function service_details($slug){
       $services = service::where('slug',$slug)->first();
       $data['other_services']  = service::where('status','active')->where('slug','!=',$slug)->orderby('id','desc')->get(); 
        $data['seo'] = Seo::where('type',$services->slug)->first();
        $data['services'] = $services;
        $data['page_title'] = "Project Details";
        
        $data['type'] = $slug;
        return view('service_details',$data);
   }

    
    public function blogs(){
        $data['blogs'] = blogs::where('status','active')->orderbyDesc('id')->get();
         $data['seo'] = Seo::where('type','our-blogs')->first();
        $data['page_title'] = "Blogs";
        return view('blogs',$data);
    }
    public function blogs_details($slug){
        $blogs = blogs::where('slug',$slug)->first();
        $data['seo'] = Seo::where('type',$blogs->slug)->first();
         $data['blogs'] = $blogs;
         $data['other_blog']  = blogs::where('status','active')->where('slug','!=',$slug)->orderby('id','desc')->get(); 
        $data['page_title'] = "Blogs Details";
        
        $data['type'] = $slug;
        return view('blog_details',$data);
    }
      public function UserInfo($slug){
         $user = User::where('slug',$slug)->first();
         $data['page_title'] = 'View '.$user->name. ' Profile ';
         $data['user'] = $user;
         return view('view-user',$data);
        
     }
     
}
