<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Designation;

class MembershipController extends Controller
{
     public function index(){
          $data['main_title'] = 'Membership Form';
          $data['page_title'] = 'Now Apply For Membership.';
          $data['users'] = User::where('id',Auth::user()->id)->first();
       return view('user.membership.index',$data); 
     }
    
     public function membershipForm(){
          $data['main_title'] = 'Membership Form';
          $data['page_title'] = 'Now Apply For Membership.';
          $data['users'] = User::where('id',Auth::user()->id)->first();
          $data['designation'] = Designation::where('status',1)->orderByDesc('title')->get();
       return view('user.membership.form',$data); 
    }

    
    public function membershipSubmit(Request $request){
        
       $request->validate([
            'name'        => 'required|string',
            'father_name'  => 'required|string',
            'dob'       => 'required',
            'email'     => 'required|unique:users,email,'.$request->id.'',
            'phone' => 'required|min:10|max:10|unique:users,phone,'.$request->id.'|regex:/^[789]\d{9}$/',
            // 'designation'       => 'required',
            'aadhar_no' => 'required|digits:12|unique:users,aadhar_no,'.$request->id.'',
            'city'       => 'required',
            'address' =>'required',
            'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',

        ], [
        'phone.required' => 'Phone number is required',
        'phone.regex' => 'Phone number must be a valid 10-digit number starting with 7, 8, or 9',
        'aadhar_no.required' => 'Aadhaar number is required',
        'aadhar_no.digits' => 'Aadhaar number must be a 12-digit number',
    ]);
        
        $page = User::findOrFail($request->id);
       
        $page->name              = $request->name;
        $page->father_name       = $request->father_name;
        $page->dob               = $request->dob;
        $page->email             = $request->email;
        $page->phone             = $request->phone;
        $page->designation            = $request->designation;
        $page->aadhar_no            = $request->aadhar_no;
        $page->city            = $request->city;
        $page->address            = $request->address;
        $page->status            = 2;
        
        
         if($request->hasFile('image')) {
            if(!empty($page->image)){
                $image_path = "public/uploads/users/".$page->image; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $image = $request->id.'-user.'.$request->image->extension();  
          $request->image->move(public_path('uploads/users'), $image);
          $page->image  = $image;
        }
        
        $page->save();
 
          $notify[] = ['success', 'Membership request has been submitted  Successfully'];
        return redirect()->route('user.membershipstatus')->withNotify($notify);
    }
}