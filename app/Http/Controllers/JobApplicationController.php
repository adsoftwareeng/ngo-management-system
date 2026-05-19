<?php
namespace App\Http\Controllers;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\JobApplication;
use App\Models\Job;

class JobApplicationController extends Controller
{
     public function jobList(){
         
        $data['joblist'] = Job::where('status','active')->orderby('id','desc')->get(); 
        $data['page_title'] = "Career";
        return view('job_listing',$data);
    }
    
    public function jobDetail(Request $request){
        $data['jobs'] = Job::where('slug',$request->slug)->where('status','active')->first(); 
        $data['joblist'] = Job::where('status','active')->where('slug','!=',$request->slug)->orderby('id','desc')->get(); 
        $data['page_title'] = "Job Detail";
        
        $data['type'] = $request->slug;
        return view('job_details',$data);        
    }
    
    // Apply for a job
    public function jobStore(Request $request)
    {
         $request->validate([
            'name'       => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|numeric|min:10',
            'salary_expected' => 'required',
            'position_apply' =>'required',
            'job_id'     => 'required',
            'captcha' => 'required',
            'resume'      => 'required|mimes:jpeg,png,jpg,pdf|max:10000',
        
       ]);

        if (!captcha_check($request->captcha)) {
            return redirect()->back()->withErrors(['error' => 'Invalid captcha entered. Please try again.']);
        }


        if ($request->hasFile('resume')) {
              $resume = time().'.'.$request->resume->extension();  
            $request->resume->move(public_path('uploads/career'), $resume);
        }
      
        $enquiry = new JobApplication();
        $enquiry->name                       = $request->name;
        $enquiry->email                      = $request->email;
        $enquiry->phone                      = $request->phone;
        $enquiry->salary_expected            = $request->salary_expected;
        $enquiry->position_apply             = $request->position_apply;
        $enquiry->job_id                     = $request->job_id;
        $enquiry->resume                     = $resume;
        $enquiry->status                     = 'pending';
        $enquiry->save();
      
         $notify[] = ['success', 'Job applied successfully.'];
      
        return redirect()->back()->withNotify($notify);
    }
}






































