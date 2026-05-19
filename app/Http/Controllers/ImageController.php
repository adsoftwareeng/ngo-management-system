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
use App\Models\Award;
use App\Models\Event;
use App\Models\Initiative;
use App\Models\{Activity,Team,Album,Cases};
use DB;


class ImageController extends Controller
{
    public function album(){
        $data['gallery'] = album::where('status','active')->orderby('id','desc')->get(); 
        $data['page_title'] = "Gallery Album";
        return view('album',$data);
    }
    
    public function gallery($slug){
        $album = album::where('slug',$slug)->first(); 
        $data['gallery'] = gallery::where('album_id',$album->id)->where('status','active')->where('type','image')->orderby('id','desc')->get(); 
        // dd($data['gallery']);
        $data['seo'] = Seo::where('type','gallery')->first();
        $data['page_title'] = "Gallery";
        return view('gallery',$data);
    }
    
    
    public function press(){
        $data['gallery'] = gallery::where('status','active')->where('type','press')->orderby('id','desc')->get();  
       
        $data['page_title'] = "Our News";
        return view('press',$data);
    }
    
    public function video(){
        $data['gallery'] = gallery::where('status','active')->where('type','video')->orderby('id','desc')->get();   
        $data['page_title'] = "Video Gallery";
        return view('video',$data);
    }
    
    public function award($type){
        if($type){
           $data['award'] = award::where('status','active')->where('type',$type)->orderby('id','desc')->get();      
           $data['page_title'] = ucfirst($type);
          $data['type'] = $type;
        }else{
           $data['award'] = award::where('status','active')->orderby('id','desc')->get();  
           $data['page_title'] = "Award";
        }
        
        return view('award',$data);
    }
    
   public function team(){
        $data['team'] = team::where('status','active')->orderbyDesc('id')->get();
        $data['page_title'] = "Board Members";
        return view('team',$data);
  }
  
   public function teamDetail($slug){
        $team = team::where('slug',$slug)->first();
        $data['otherteam'] = team::where('status','active')->where('id','!=',$team->id)->orderbyDesc('id')->get();
        $data['page_title'] = "Board Members";
        $data['team'] = $team;
        return view('team_detail',$data);
  }
  
  
  
    public function event($type){
        $data['events'] = Event::where('status','active')->where('type',$type)->orderby('id','desc')->get();   
        $data['page_title'] = ucfirst($type)." Events";
         //dd($data['events']);
        return view('events',$data);
    }
    
    
    
    public function event_detail($slug){
        $events = Event::where('slug',$slug)->first(); 
        
        $data['gallery'] = gallery::where(['status'=>'active', 'type'=>'event','service_id'=>$events->id])->orderby('id','desc')->get();   
        $data['page_title'] = "Event Detail";
        $data['events'] = $events;
        
        $data['type'] = $slug;
        return view('events_details',$data);
    }
    
    
    
    public function cases($type){
        $data['cases'] = Cases::where('status','active')->where('type',$type)->orderby('id','desc')->get();   
        $data['page_title'] = ucfirst($type)." Cases";
        if($type=='current'){
            $data['type'] = 'current-case';
        }else{
            $data['type'] = 'success-case';

        }
        
        return view('cases',$data);
    }
    
    
    
    public function case_detail($slug){
        $cases = Cases::where('slug',$slug)->first(); 
        $data['page_title'] = "Case Detail";
        $data['other_cases'] = Cases::where(['status'=>'active','type'=>$cases->type])->where('id','!=' , $cases->id)->orderby('id','desc')->get();   
        $data['cases'] = $cases;
        
        $data['testimonial'] = Testimonials::where(['status'=>'active','type'=>'success'])->orderbyDesc('id')->get();
        
        
        $data['type'] = $slug;
        return view('cases_details',$data);
    }
    
    
      public function initiative(){
        
        $data['events'] = Initiative::where('status','active')->orderby('id','desc')->get();   
        $data['page_title'] = "Initiatives";
         //dd($data['events']);
        return view('initiative',$data);
    }
    
    
    
    public function initiative_detail($slug){
        $events = Initiative::where('slug',$slug)->first(); 
        $data['faq'] = DB::table('faq')->where(['status'=>'active', 'type'=>'initiative','service_id'=>$events->id])->orderby('id','desc')->get();  
        $data['gallery'] = gallery::where(['status'=>'active', 'type'=>'initiative','service_id'=>$events->id])->orderby('id','desc')->get();   
        $data['page_title'] = "Initiative Detail";
        $data['events'] = $events;
        
        $data['type'] = $slug;
        return view('initiative_details',$data);
    }
    
      public function activity(){
        $data['events'] = Activity::where('status','active')->orderby('id','desc')->get();   
        $data['page_title'] = "Our Activity";
         //dd($data['events']);
        return view('activity',$data);
    }
    
    
    
    public function activity_detail($slug){
        $events = Activity::where('slug',$slug)->first();  
        $data['other_activity'] = Activity::where(['status'=>'active'])->where('id','!=' , $events->id)->orderby('id','desc')->get();   
        $data['page_title'] = "Activity Detail";
        $data['events'] = $events;
        $data['type'] = $slug;
        return view('activity_details',$data);
    }
    
    
    
     
}
