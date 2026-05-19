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
use App\Models\Certificate;

class CertificateController extends Controller
{
     public function index(Request $request)
    {
        $page_title     = "Certificate ";
        $main_title     = "certificate";
        $empty_message  = "No page yet";
        $delete_title = "certificate";
        $delete_url = "admin.certificate.delete";
     
        $users = Certificate::get();   
       
        return view('admin.certificate.index', compact('page_title', 'empty_message', 'users','delete_title','delete_url','main_title'));
    }
    
    public function form(Request $request)
    {
        $page_title     = "Generate Certificate form ";
        $main_title     = "certificate";
        $empty_message  = "No page yet";
        $delete_title = "certificate";
        $delete_url = "admin.certificate.delete";
     
        $users = User::where(['role'=>'user'])->where('id',$request->id)->first();   
       
        return view('admin.users.certificate', compact('page_title', 'empty_message', 'users','delete_title','delete_url','main_title'));
    }
  
     public function store(Request $request)
    {
         $request->validate([
            'name'        => 'required|string',
            'certificate_number' => 'required',
            'program'     => 'required',
            'user_id'    => 'required'
            ]);
       
         if($request->id){
              $page = Certificate::where('id',$request->id)->first();
        }else{
             $page = new Certificate();
         }
         
        $page->name                = $request->name;
        $page->certificate_number  = $request->certificate_number;
        $page->user_id             = $request->user_id;
        $page->program             = $request->program;
       
        $page->save();
        
        if($request->id){
              $notify[] = ['success', 'certificate Updated Successfully'];
        }else{
              $notify[] = ['success', 'certificate Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $page = Certificate::where('id', $id)->first();
        if(!empty($page)){
            $page->delete();
            $notify[] = ['success', ' Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

     

    public function showCertificate(Request $request)
    {
        $data['page_title']     = "User Certificate";
        $data['main_title']     = "users";
        $data['empty_message']  = "No page yet";
        $data['go_back_url'] = "admin.users.card";
        $data['users'] = Certificate::where('id',$request->id)->first();
        $data['page'] = page::where('type','certificate')->first();
       
        return view('certificate.showCertificate', $data);
    }

     public function downloadCertificate(Request $request)
    {
       
        $users = Certificate::where('id',$request->id)->first();
        
        $data['page'] = page::where('type','certificate')->first();
        
        $data['users']  = $users;
        
        $pdf = PDF::loadView('certificate.design1', $data);
        
        return $pdf->download('as.pdf');
    }
  
}
