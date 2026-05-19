<?php
namespace App\Http\Controllers;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\GeneralSetting;
use App\Models\PaymentSetting;
use DB;
use Illuminate\Support\Str;
use App\Models\Donation;

class DonateController extends Controller
{
    public function donate(){
        $data['page_title'] = "Donate Us";
        $data['general'] = GeneralSetting::first(); 
        $data['payments'] = PaymentSetting::whereStatus(1)->get();
        return view('donate',$data);
    }
   
      public function donatestore(Request $request){
         
         $request->validate([
            'amount'      => 'required|numeric',
            'name'       => 'required|string',
            'email'      => 'required|email',
            'phone'      => 'required|numeric|min:10',
            'pan_no'     => 'required',
            'address'     => 'required',
            'captcha' => 'required',
            'payment_method' => 'required'
        
       ]);

        if (!captcha_check($request->captcha)) {
            return redirect()->back()->withErrors(['error' => 'Invalid captcha entered. Please try again.']);
        }
        
        $data =[
             'amount' => $request->amount,
             'name' =>  $request->name,
             'email' => $request->email,
             'phone' => $request->phone,
             'pan_no' => $request->pan_no,
             'address'  => $request->address,
             'type' => 'online',
             'status' =>'pending',
             'payment_method' => $request->payment_method,
             'payment_status' => 'Unpaid',
           ];
             
             
            $donation =   Donation::create($data);
            $receiptNumber = 'REC-' . strtoupper(Str::random(4)).$donation->id;
            $donation->update(['receipt_id' => $receiptNumber]);
           
           switch ($request->payment_method) {
                case 'cod':
                     $notify[] = ['success', 'Thank you for donate us.'];
                     return redirect()->back()->withNotify($notify);
                
                case 'bank':
                	 return $this->processBankPayment($donation);	
                	 
                case 'phonepe':
                    $donate_id  = base64_encode($donation->id);
                	 return redirect()->route('phonepe.submit',['id'=>$donate_id]);
                
                case 'stripe':
                      return $this->processStripePayment($donation);
                
                case 'paypal':
                      return $this->processPayPalPayment($donation);
                
                case 'mollie':
                     return $this->processMolliePayment($donation);
                
                case 'paytm':
                	 return $this->processPaytmPayment($donation);
                
                case 'sslcommerz':
                	 return $this->processSslcommerzPayment($donation);
                
                case 'mercadopago':
                	 return $this->processMercadopagoPayment($donation);
                
                case 'authorize':
                	 return $this->processAuthorizePayment($donation);
                
                case 'paystack':
                	 return $this->processPaystackPayment($donation);
                
                case 'razorpay':
                	 return $this->processRazorpayPayment($donation);
                
                case 'flutterwave':
                	 return $this->processFlutterwavePayment($donation);
                
              default:
                $notify[] = ['error', 'Invalid payment method selected.'];
                return redirect()->back()->withNotify($notify);
        }
    }

    // bank transfer 
     public function processBankPayment($donation){
         if(empty($donation)){
             $notify[] = ['error', 'Invalid payment method.'];
            return redirect()->route('donate')->withNotify($notify);
         }
         
        $data['page_title'] = "Transactions via Bank Transfer";
        $data['payments'] = PaymentSetting::where('unique_keyword','bank')->first()->text;
        $data['donate'] = base64_encode($donation->id);
        return view('payment.bank_transfer',$data);
     }
     
     public function processBankPaymentSubmit(Request $request){
         
         $request->validate([
            'txn_id'     => 'required'
       ]);
        $donate_id = base64_decode($request->donate);
         $donation = Donation::where('id',$donate_id)->update(['txn_id' => $request->txn_id]);
         if($donation){
            $notify[] = ['success', 'Thank you for donate us.'];
            return redirect()->route('donate')->withNotify($notify);
         }else{
          
            $notify[] = ['error', 'Failed, please try again later.'];
            return redirect()->route('donate')->withNotify($notify);   
         }
             
     }
     
     
     public function thankyou(){
        $data['page_title'] = "Thank You";
        $data['seo'] = Seo::where('type','thank-you')->first();
        return view('thankyou',$data);
     }

}
