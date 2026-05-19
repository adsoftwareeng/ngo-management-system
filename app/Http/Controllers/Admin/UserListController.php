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
use App\Models\Page;

class UserListController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "users ";
        $main_title     = "users";
        $empty_message  = "No page yet";
        $delete_title = "users";
        $delete_url = "admin.users.delete";
        $type = 'list';
        if($request->status){
            $page_title  = ucfirst($request->status)." users";
            $status = $request->status == 'active' ? 1 : [0, 2];
            $users = User::where('role', 'user')
             ->whereIn('status', (array) $status)
             ->orderBy('id', 'desc')
             ->get();
        }else{
            $users = User::where(['role'=>'user'])->orderby('id','desc')->get();   
        }
       
        return view('admin.users.index', compact('page_title', 'empty_message', 'users','delete_title','delete_url','main_title','type'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add users";
            $data['go_back_url'] = "admin.users";
            $data['main_title']  = "page";
            $data['designation'] = Designation::where('status',1)->orderBy('title','asc')->get();
        if($request->id){

            $data['page_title']  = "Update users";
            $data['go_back_url'] = "admin.users";
            $data['users'] = User::where('id',$request->id)->first(); 
         }

        return view('admin.users.form',$data);
     }
   
    public function store(Request $request)
    {
       
         $request->validate([
            'name'        => 'required|string',
            'father_name'  => 'required|string',
            'dob'       => 'required',
            'email'     => 'required|unique:users,email,'.$request->id.'',
            'phone' => 'required|min:10|max:10|unique:users,phone,'.$request->id.'|regex:/^[789]\d{9}$/',
            'designation'       => 'required',
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

        if($page->membership_fee=='paid'){

        }else{
          $page->membership_fee     = $request->membership_fee;
          $page->verification_date    =  date('Y-m-d');  
          $page->validity    = date('Y-m-d', strtotime('+1 years')); 
          $page->validity_years    = 1;  
        }
       
        $page->save();
      
      
        if($request->id){
              $notify[] = ['success', 'users Updated Successfully'];
        }else{
              $notify[] = ['success', 'users Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $page = User::where('id', $id)->first();
        if(!empty($page)){
            $page->delete();
            $notify[] = ['success', 'users Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

     public function card(Request $request)
    {
        if($request->type){
            
            $page_title     = "Generate Certificate";
            $type = 'certificate';
     
        }else{
            
            $page_title     = "Users ID Card";
            $type = 'card';
            
        }
        $main_title     = "users";
        $empty_message  = "No page yet";
        $delete_title = "users";
        $delete_url = "admin.users.delete";
        $users  = User::where(['role'=>'user', 'status'=>1])->orderby('id','desc')->get(); 
        return view('admin.users.index', compact('page_title', 'empty_message', 'users','delete_title','delete_url','main_title','type'));
    }

    public function showAppointmentLetter(Request $request)
    {
        $data['page_title']     = "User Appointment Letter";
        $data['main_title']     = "users";
        $data['empty_message']  = "No page yet";
        $data['go_back_url'] = "admin.users.card";
        $type  = $request->type; 
        $data['users'] = User::where('id',$request->id)->first();
        $data['page'] = page::where('type',$type)->first();
        $data['type'] = $type;

        return view('appointment.'.$type, $data);
    }
    
     public function showCertificae(Request $request)
    {
        $data['page_title']     = "User Appointment Letter";
        $data['main_title']     = "users";
        $data['empty_message']  = "No page yet";
        $data['go_back_url'] = "admin.users.card";
        $type  = $request->type; 
        $data['users'] = User::where('id',$request->id)->first();
        $data['page'] = page::where('type',$type)->first();
        $data['type'] = $type;

        return view('appointment.'.$type, $data);
    }

     public function downloadPDF(Request $request)
    {
       
        $users = User::where('id',$request->id)->first();
        
        $data['page'] = page::where('type','appointment-letter')->first();
        
        $data['users']  = $users;
        
 
        $pdf = PDF::loadView('appointment.certificate', $data);
        
        return $pdf->download($users->name.'.pdf');
    }
  
}
