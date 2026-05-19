<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Enquiry;


class EnquiryController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Enquiry";
        $empty_message  = "No Enquiry yet";
        $delete_title = "Enquiry";
        $delete_url = "admin.enquiry.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Enquiry";
           $enquiry  = Enquiry::where('type','enquiry')->where('status',$status)->orderby('id','desc')->get();
        }else{
           $enquiry = Enquiry::where('type','enquiry')->orderby('id','desc')->get();   
        }
       
        return view('admin.enquiry.index', compact('page_title', 'empty_message', 'enquiry','delete_title','delete_url'));
    }
  
    public function contact_list(Request $request)
    {
        
        $empty_message  = "No Contact Us yet";
        $delete_title = "Enquiry";
        $delete_url = "admin.enquiry.delete";
       
       
        if($request->type){
             $type   = $request->type;
             $page_title     = ucfirst($type);
             $enquiry = Enquiry::where('type',$type)->orderby('id','desc')->get();
             
             $page = 'joinus';
        }else{
            $page_title     = "Contact Us";
             $enquiry = Enquiry::where('type','contactus')->orderby('id','desc')->get();  
             $page = 'contactus';
        }
        
       
        return view('admin.enquiry.'.$page, compact('page_title', 'empty_message', 'enquiry','delete_title','delete_url'));
    }
     public function enquiry_form(Request $request){

            $data['page_title']  = "Add Enquiry";
            $data['go_back_url'] = "admin.enquiry";
            
        if($request->id){

            $data['page_title']  = "Update Enquiry";
            $data['go_back_url'] = "admin.enquiry";
            $data['enquiry'] = Enquiry::where('id',$request->id)->first(); 
         }

        return view('admin.enquiry.form',$data);
     }
   
    public function enquiry_store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|numeric|min:10',
            'adults'     => 'required|numeric',
            'service'    => 'required',
            'booking_date' =>'required',
            'status'     => 'required',
        ]);

        if($request->id){
              $enquiry = Enquiry::findOrFail($request->id);
        }else{
             $enquiry = new Enquiry();
         }
        $enquiry->name              = $request->name;
        $enquiry->email             = $request->email;
        $enquiry->phone             = $request->phone;
        $enquiry->adults            = $request->adults;
        $enquiry->children          = $request->children;
        $enquiry->service           = $request->service;
        $enquiry->booking_date      = $request->booking_date;
        $enquiry->details           = $request->details;
        $enquiry->status            = $request->status;
        $enquiry->save();

        if($request->id){
              $notify[] = ['success', 'Enquiry Updated Successfully'];
        }else{
              $notify[] = ['success', 'Enquiry Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $enquiry = Enquiry::where('id', $id)->first();
        if(!empty($enquiry)){
            $enquiry->delete();
            $notify[] = ['success', 'Enquiry Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
