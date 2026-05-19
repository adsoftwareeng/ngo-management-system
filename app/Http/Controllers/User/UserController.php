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


class UserController extends Controller
{
    public function index()
    {
      $data['page_title'] = 'Dashboard';
        return view('user.dashboard',$data); 
    }

      public function membership()
    {
       $data['page_title'] = 'Membership Status';
       $data['membership'] = User::where('id',Auth::user()->id)->first();
       return view('user.membership',$data); 
    }
     public function id_card()
    {
       $data['page_title'] = 'Generate Id Card';
       $data['membership'] = User::where('id',Auth::user()->id)->first();
       return view('user.id_card',$data); 
    }

    public function appointment(){
      $data['page_title'] = 'Appointment Letter';
       $data['membership'] = User::where('id',Auth::user()->id)->first();
       return view('user.appointment',$data); 
    }

    public function certificate(){
      $data['page_title'] = 'Certificate';
       $data['membership'] = User::where('id',Auth::user()->id)->first();
       return view('user.certificate',$data); 
    }

    public function profile(){
      $data['page_title'] = 'Profile';
       $data['profile'] = User::where('id',Auth::user()->id)->first();
       return view('user.profile.index',$data); 
    }

    public function form(){
      $data['page_title'] = 'Update Profile';
       $data['profile'] = User::where('id',Auth::user()->id)->first();
       return view('user.profile.form',$data); 
    }
    
    public function store(Request $request){
        
       $request->validate([
            'name'        => 'required|string',
            'father_name'  => 'required|string',
            'dob'       => 'required',
            'phone' => 'required|regex:/^[789]\d{9}$/',
            'designation'       => 'required',
            'aadhar_no' => 'required|digits:12',
            'city'       => 'required',
            'address' =>'required',
           'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
        ], [
        'phone.required' => 'Phone number is required',
        'phone.regex' => 'Phone number must be a valid 10-digit number starting with 7, 8, or 9',
        'aadhar_no.required' => 'Aadhaar number is required',
        'aadhar_no.digits' => 'Aadhaar number must be a 12-digit number',
    ]);
        
        // if($request->id){
            $page = User::findOrFail($request->id);
        // }else{
        //     $page = new page();
        // }
        $page->name              = $request->name;
        $page->father_name       = $request->father_name;
        $page->dob            = $request->dob;
        $page->phone        = $request->phone;
        $page->designation            = $request->designation;
        $page->aadhar_no            = $request->aadhar_no;
        $page->city            = $request->city;
        $page->address            = $request->address;
        
        
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
 
          $notify[] = ['success', 'Profile Updated Successfully'];
        return redirect()->back()->withNotify($notify);
    }
}