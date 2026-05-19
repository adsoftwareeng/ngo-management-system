<?php
namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $general = GeneralSetting::first();
        $page_title = 'General Settings';
        return view('admin.setting.general_setting', compact('page_title', 'general'));
    }

    public function donateSection()
    {
        $general = GeneralSetting::first();
        $page_title = 'Donate Settings';
        return view('admin.setting.donate', compact('page_title', 'general'));
    }

    public function store(Request $request)
    {
        $request->validate([
                'site_name'       => 'required|string',
                'logo'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                'address'     => 'required',
                'address'     => 'required',
                'address'     => 'required',
                'phone'     => 'required',
                'email'     => 'required',
                'call_note'     => 'required',
                'address'   =>'required',
                'breadcrumbs'     => 'image|mimes:jpeg,png,jpg|max:2048',
                'appointment_img' => 'image|mimes:jpeg,png,jpg|max:2048',
                'footer_about' =>'required',
                'mon_sat_time' =>'required',
                'site_url' =>'required',
                'reg_no' =>'required',
                'copyright'     => 'required',
                'whatsapp_number' => 'required',
            ]);
        
        $general = GeneralSetting::findOrFail(1);

        $general->site_name            = $request->site_name;

         if($request->hasFile('logo')) {
            if(!empty($general->logo)){
                $image_path = "public/uploads/general/".$general->logo; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $logo = 'logo.'.$request->logo->extension();  
          $request->logo->move(public_path('uploads/general'), $logo);
          $general->logo  = $logo;
        }

         if($request->hasFile('logo_2')) {
            if(!empty($general->logo_2)){
                $image_path = "public/uploads/general/".$general->logo_2; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $logo_2 = 'logo_2.'.$request->logo_2->extension();  
          $request->logo_2->move(public_path('uploads/general'), $logo_2);
          $general->logo_2  = $logo_2;
        }

        if($request->hasFile('favicon')) {
            if(!empty($general->favicon)){
                $image_path = "public/uploads/general/".$general->favicon; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $favicon = 'favicon.'.$request->favicon->extension();  
          $request->favicon->move(public_path('uploads/general'), $favicon);
          $general->favicon  = $favicon;
        }

        $general->address            = $request->address;
        $general->phone            = $request->phone;
        $general->email              = $request->email;
        $general->fb               = $request->fb;
        $general->linkedin              = $request->linkedin;
        $general->instagram                = $request->instagram;
        $general->twitter            = $request->twitter;
        $general->call_note        = $request->call_note;
        $general->whatsapp_number  = $request->whatsapp_number;
        $general->footer_about  = $request->footer_about;
        $general->mon_sat_time  = $request->mon_sat_time;
        $general->sat_sun_time  = $request->sat_sun_time;
        $general->site_url  = $request->site_url;
        $general->reg_no  = $request->reg_no;
        

        if($request->hasFile('breadcrumbs')) {
            if(!empty($general->breadcrumbs)){
                $image_path = "public/uploads/general/".$general->breadcrumbs; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $breadcrumbs = 'breadcrumbs.'.$request->breadcrumbs->extension();  
          $request->breadcrumbs->move(public_path('uploads/general'), $breadcrumbs);
          $general->breadcrumbs  = $breadcrumbs;
        }
        
        if($request->hasFile('appointment_img')) {
            if(!empty($general->appointment_img)){
                $image_path = "public/uploads/general/".$general->appointment_img; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $appointment = 'appointment.'.$request->appointment_img->extension();  
          $request->appointment_img->move(public_path('uploads/general'), $appointment);
          $general->appointment_img  = $appointment;
        }
        
        $general->copyright             = $request->copyright;
        $general->save();

       $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);
    }


    public function donatestore(Request $request)
    {
        $request->validate([
                'bank_name'       => 'required|string',
                'account_name'     => 'required',
                'account_no'     => 'required',
                'branch_name'     => 'required',
                'donate_image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
            ]);
        
        $general = GeneralSetting::findOrFail(1);

        $general->bank_name            = $request->bank_name;
        $general->account_name            = $request->account_name;
        $general->account_no            = $request->account_no;
        $general->branch_name            = $request->branch_name;
            
         if($request->hasFile('donate_image')) {
            if(!empty($general->donate_image)){
                $image_path = "public/uploads/general/".$general->donate_image; 
                    if(file_exists($image_path)) {
                       @unlink($image_path);
                    }
            }
          $logo = 'donate.'.$request->donate_image->extension();  
          $request->donate_image->move(public_path('uploads/general'), $logo);
          $general->donate_image  = $logo;
        }    
        $general->save();
       $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);
    }

}