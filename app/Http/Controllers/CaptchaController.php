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
use DB;

class CaptchaController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    
      public function reloadCaptcha()
    {
        $configCaptchaType = config('captcha.CAPTCHA_TYPE');

        // Initialize variable to store captcha type
        $captchaType = '';
    
        // If the config number is 0, set captcha type to 'flat' (alphanumeric)
        // If it's 1, set captcha type to 'math'
        if ($configCaptchaType == 0) {
            $captchaType = 'alphanumeric';
        } else {
            $captchaType = 'math';
        }
        
        // the generated type will be stored in the captchaImage
        $captchaImage = captcha_img($captchaType);
    
        // Return JSON response with the generated captcha image
        return response()->json(['captcha' => $captchaImage]);
    }

    public static function generateCaptcha()
    {
        $configCaptchaType = config('captcha.CAPTCHA_TYPE');

        // If the config number is 0, generate a 'flat' (alphanumeric) captcha,
        // otherwise, generate a 'math' captcha
        if ($configCaptchaType == 0) {
            return captcha_img('alphanumeric');
        } else {
            return captcha_img('math');
        }
    }


}
