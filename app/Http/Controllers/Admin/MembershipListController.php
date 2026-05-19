<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\Donation;
use App\Models\Designation;
use App\Models\User;
use Carbon\Carbon;
use PDF;

use SimpleSoftwareIO\QrCode\Facades\QrCode; 

class MembershipListController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "Membership ";
        $main_title     = "membership";
        $empty_message  = "No page yet";
        $delete_title = "membership";
        $delete_url = "admin.membership.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." membership";
           $membership  = User::where(['role'=>'user', 'status'=>2])->where('membership_fee',$status)->orderby('id','desc')->get();
        }else{
            $membership = User::where(['role'=>'user', 'status'=>2])->orderby('id','desc')->get();   
        }
       
        return view('admin.membership.index', compact('page_title', 'empty_message', 'membership','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add membership";
            $data['go_back_url'] = "admin.membership";
            $data['main_title']  = "page";
            $data['designation'] = Designation::where('status',1)->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update membership";
            $data['go_back_url'] = "admin.membership";
            $data['users'] = User::where('id',$request->id)->first(); 
         }

        return view('admin.membership.form',$data);
     }
   
    public function store(Request $request)
    {
       
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
            'status' =>'required',
            'membership_fee' =>'required',

            ], [
            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number must be a valid 10-digit number starting with 7, 8, or 9',
            'aadhar_no.required' => 'Aadhaar number is required',
            'aadhar_no.digits' => 'Aadhaar number must be a 12-digit number',
        ]);
           
       
         if($request->id){
              $page = User::findOrFail($request->id);
          
        }else{
             $page = new User();
           
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/users'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $page->image;
        }
       
        $page->name              = $request->name;
        $page->father_name       = $request->father_name;
        $page->dob               = $request->dob;
        $page->email             = $request->email;
        $page->phone             = $request->phone;
        $page->designation            = $request->designation;
        $page->aadhar_no            = $request->aadhar_no;
        $page->city            = $request->city;
        $page->address            = $request->address;
        $page->status             = $request->status;
        $page->membership_fee     = $request->membership_fee;
        $page->verification_date    =  date('Y-m-d');  
        $page->validity    = date('Y-m-d', strtotime('+1 years')); 
        $page->validity_years    = 1;  
        $page->save();
      

        if($request->id){
              $notify[] = ['success', 'membership Updated Successfully'];
        }else{
              $notify[] = ['success', 'membership Added Successfully'];
        }
      
        return redirect()->route('admin.membership')->withNotify($notify);
    }


 // view generate QR of the USER 
    
    public function showQRCode()
    {
        // Example user information
        $user = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+1234567890',
        ];

        // Create a JSON string from user data
        $userData = json_encode($user);

        // Generate QR Code with user information
        $qrCode = QrCode::size(300)->generate($userData);

        return view('admin.users.userQR', compact('qrCode'));
    }
    
    // downlaod QR Code of user information 
     public function downloadUserQRCode($id)
    {
        // Find the user by ID (adjust according to your User model)
        $user = User::findOrFail($id);

        if(empty($user->slug)){
             $slug = Str::slug($user->name);
            $originalSlug = $slug;
            $i = 1;
        
            while (User::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $i;
                $i++;
            }
            User::where('id',$user->id)->update(['slug'=>$slug]);

        }
        
        $link = url('user-view/' . $user->slug);
    
        $qrImage = QrCode::format('png')
                    ->size(300)
                    ->generate($link);

    return response($qrImage)
        ->header('Content-Type', 'image/png')
        ->header('Content-Disposition', 'attachment; filename="user-qr-'.$user->slug.'.png"');
    }
    public function delete($id)
    {
        $page = User::where('id', $id)->first();
        if(!empty($page)){
            $page->delete();
            $notify[] = ['success', 'membership Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
