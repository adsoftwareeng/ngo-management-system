<?php
namespace App\Http\Controllers\Admin;

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


class DashboardController extends Controller
{
    //
    function  __construct(){
        
    }

     public function dashboard()
    {
        
        // $pass = Hash::make('AnandTrust@!!2025');
        // dd($pass);
        if(Auth::check())
        {   $data['page_title'] ="Dashboard";
            $data['enquiry_list']  = Enquiry::where('type','enquiry')->latest()->take(10)->get();
            $data['enquiry_total']  = Enquiry::get()->count();
            $data['slider_total']  = Slider::get()->count();
            $data['gallery_total']  = Gallery::get()->count();
            $data['service_total']  = Service::get()->count();
            
            return view('admin.dashboard',$data);
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    

}
