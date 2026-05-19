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
use App\Models\GeneralSetting;
use App\Models\PaymentSetting;
use DB;

class ContactController extends Controller
{
    
    public function contactus(){
        $data['page_title'] = "Contact Us";
        $data['seo'] = Seo::where('type','contact-us')->first();
        $data['category'] = category::where('parent_id','0')->where('type','category')->orderby('title','asc')->get(); 
        return view('contactus',$data);
    }
    
    public function contactstore(Request $request){
         $request->validate([
            'name'       => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|numeric|min:10',
            // 'course' => 'required',
            // 'trainingmode' =>'required',
            'message'     => 'required',
           'captcha' => 'required'
        
       ]);

        if (!captcha_check($request->captcha)) {
            return redirect()->back()->withErrors(['error' => 'Invalid captcha entered. Please try again.']);
        }

      
        $enquiry = new Enquiry();
        $enquiry->name              = $request->name;
        $enquiry->email             = $request->email;
        $enquiry->phone             = $request->phone;
        // $enquiry->course            = $request->course;
        // $enquiry->trainingmode      = $request->trainingmode;
        $enquiry->message           = $request->message;
        $enquiry->type              = 'contactus';
        $enquiry->status            = 'pending';
        $enquiry->save();
      
         $notify[] = ['success', 'Thank you for contacting us.'];
      
        return redirect()->route('thankyou')->withNotify($notify);
    }
    
    
     
    public function joinus(){
        $data['page_title'] = "Join Us";
        $data['seo'] = Seo::where('type','join-us')->first();
        return view('joinus',$data);
    }
    
    public function joinstore(Request $request){
         $request->validate([
            'name'       => 'required|string',
            'dob'        => 'required',
            'gender'     =>'required',
            'email'      => 'required|email',
            'phone'      => 'required|numeric|min:10',
            'city'     => 'required',
            'state'     => 'required',
            'message'     => 'required',
           'captcha' => 'required'
        
       ]);

        if (!captcha_check($request->captcha)) {
            return redirect()->back()->withErrors(['error' => 'Invalid captcha entered. Please try again.']);
        }

      
        $enquiry = new Enquiry();
        $enquiry->name              = $request->name;
        $enquiry->dob               = $request->dob;
        $enquiry->gender            = $request->gender;
        $enquiry->email             = $request->email;
        $enquiry->phone             = $request->phone;
        $enquiry->city           = $request->city;
        $enquiry->state           = $request->state;
        $enquiry->message           = $request->message;
        $enquiry->type              = 'joinus';
        $enquiry->status            = 'pending';
        $enquiry->save();
      
         $notify[] = ['success', 'Thank you for join us.'];
      
        return redirect()->route('thankyou')->withNotify($notify);
    }

    public function booknow(){
        $data['page_title'] = "Book Now";
        $data['seo'] = Seo::where('type','book-now')->first();
         return view('booknow',$data);
     }
 
    public function enquiry_post(Request $request){

        $request->validate([
           'name'       => 'required|string',
           'email'      => 'required|email',
           'phone'      => 'required|numeric|min:10',
           'service'    => 'required',
           'adults'     => 'required|numeric',
           'booking_date' =>'required',
           // 'message'     => "required",
       ]);

    

       $enquiry = new Enquiry();
        
       $enquiry->name              = $request->name;
       $enquiry->email             = $request->email;
       $enquiry->phone             = $request->phone;
       $enquiry->service           = $request->service;
       $enquiry->adults            = $request->adults;
       $enquiry->children          = $request->children;
       $enquiry->message           = $request->message;
       $enquiry->booking_date      = $request->booking_date; 
       $enquiry->type              = 'enquiry';
       $enquiry->status            = 'pending';
       $enquiry->save();

       $notify[] = ['success', 'Thank you for enquiry.'];
     
       return redirect()->route('thankyou')->withNotify($notify);
   }

     public function eventstore(Request $request){

        $request->validate([
           'name'       => 'required|string',
           'email'      => 'required|email',
           'phone'      => 'required|numeric|min:10',
           'identity'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
           'is_member_of_org'     => 'required|numeric'
       ]);
       
          
        

        if ($request->hasFile('identity')) {

            try {
                  $imageName = time().'.'.$request->identity->extension();  
                  $request->identity->move(public_path('uploads/event_register'), $imageName);
                
            } catch (\Exception $exp) {
                // return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
                
                  $notify[] = ['error', 'Could not upload the  image'];
                 return redirect()->back()->withNotify($notify);
            }
        }

        $data = [ 
                  'name'              => $request->name,
                  'email'             => $request->email,
                  'phone'             => $request->phone,
                  'identity'          => $imageName,
                  'is_member_of_org'  => $request->is_member_of_org,
                  'event_id'          => $request->event_id
               ];
       
       DB::table('event_register')->insert($data);

       $notify[] = ['success', 'Thank you for  registration.'];
     
       return redirect()->route('thankyou')->withNotify($notify);
     }
     
     public function thankyou(){
        $data['page_title'] = "Thank You";
        $data['seo'] = Seo::where('type','thank-you')->first();
        return view('thankyou',$data);
     }

}
