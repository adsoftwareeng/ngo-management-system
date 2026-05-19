<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Models\job;
use App\Models\Category;
use Illuminate\Support\Str;
// use App\Models\Seo;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Seo;

class JobController extends Controller
{
    // Display list of jobs
      public function index(Request $request)
    {
        $page_title     = "All job";
        $main_title     = "job";
        $empty_message  = "No job yet";
        $delete_title = "job";
        $delete_url = "admin.job.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." job";
           $job  = job::where('status',$status)->orderby('id','desc')->get();
        }else{
           $job = job::orderby('id','desc')->get();   
        }
       
        return view('admin.job.index', compact('page_title', 'empty_message', 'job','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add job";
            $data['go_back_url'] = "admin.job";
            $data['main_title']  = "job";
            
        if($request->id){

            $data['page_title']  = "Update job";
            $data['go_back_url'] = "admin.job";
            $job = job::where('id',$request->id)->first(); 
            $data['seo_job'] = Seo::where('type',$job->slug)->first();
            $data['job'] = $job;
         }

        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('id','desc')->get();   
        return view('admin.job.form',$data);
     }
   
    
  
    public function store(Request $request)
    {
       
            $request->validate([
                'title'       => 'required|string',
                'skills'      =>   'required',
                'description'   => 'required',
                'experience' => 'required',
                'location' => 'required',
                'job_type'     => 'required',
                'no_of_position'     => 'required',
                'last_date_to_apply'     => 'required',
                'status'     => 'required',
            ]);
       

        if($request->id){
              $job = job::findOrFail($request->id);
        }else{
             $job = new job();
         }

    
        $job->title              = $request->title;
        $job->slug               = Str::slug($request->title);
        $job->skills             = $request->skills;
        $job->description        = $request->description;
        $job->experience         = $request->experience;
        $job->location        = $request->location;
        $job->job_type       = $request->job_type;
        $job->no_of_position         = $request->no_of_position;
        $job->last_date_to_apply        = $request->last_date_to_apply;
        $job->status             = $request->status;
        
        $job->save();
        
         
        // insert seo content 
        $seo = seo::firstOrNew(array('type' => $job->slug));
        $seo->page_title  = $request->title;
        $seo->keywords  = $request->skills;
        $seo->description  = $request->skills;
        $seo->author  = generalSetting()->site_name;
        $seo->dns_prefetch  = url('/').'/'.$job->slug.'/';
        $seo->preconnect  = url('/').'/'.$job->slug.'/';
        $seo->canonical  =  url('/').'/'.$job->slug.'/';
        $seo->og_title  = $request->title;
        // $seo->og_image  = $request->og_image;
        $seo->og_image_width  = 500;
        $seo->og_image_height  = 500;
        $seo->og_description  = $request->title;
        $seo->og_url  =  url('/').'/'.$job->slug.'/';
        $seo->og_site_name  = generalSetting()->site_name;
        $seo->type   =  $job->slug;

        
        //  if($request->hasFile('image')) {
        //       $seoImage = generalSetting()->prefix.'-'.$seo->type.'.'.$request->image->extension();  
        //       $request->image->move(public_path('uploads/seo'), $seoImage);
        //       $seo->og_image  = $seoImage;
        //     }
         $seo->save();
        
        // end insert seo content 
        
       
        if($request->id){
              $notify[] = ['success', 'job Updated Successfully'];
        }else{
              $notify[] = ['success', 'job Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }

   // applicants listing
   
     public function applicantList(Request $request)
    {
        $page_title     = "Applicant";
        $main_title     = "Applicant";
        $empty_message  = "No Applicant List";
        $delete_title = "job";
        $delete_url = "admin.applicant.delete";
        $job = JobApplication::with('job')->orderby('id','desc')->get();   
        // dd($job);
        return view('admin.job.applicantList', compact('page_title', 'empty_message', 'job','delete_title','delete_url','main_title'));
    }
  
    public function applicant_delete($id)
    {
        $job = JobApplication::where('id', $id)->first();
        if(!empty($job)){
            $job->delete();
            $notify[] = ['success', ' Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

   
   // end 
   
    public function delete($id)
    {
        $job = job::where('id', $id)->first();
        if(!empty($job)){
              $seo_Delete = seo::where('type',$job->slug)->first();
                if(!empty($seo_Delete)){
                    $seo_Delete->delete();
                }
            $job->delete();
            $notify[] = ['success', 'job Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}