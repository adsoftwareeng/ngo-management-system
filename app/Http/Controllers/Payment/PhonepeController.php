<?php
namespace App\Http\Controllers\Payment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use App\Models\GeneralSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Ixudra\Curl\Facades\Curl;
use Exception;
use App\Models\Donation;

class PhonepeController extends Controller
{
     protected $client;
     protected $merchantId;
     protected $apiKey;
     protected $baseUrl;
     protected $displayCurrency;

    public function __construct()
    {
        $data = PaymentSetting::whereUniqueKeyword('phonepe')->first();
        $paydata = $data->convertJsonData();
       
        $this->client = new Client();
        $this->merchantId = $paydata['merchant_id'];
        $this->apiKey = $paydata['api_key'];
        $this->baseUrl = route('phonepe.notify');
        $this->displayCurrency = 'INR';
    }



   public function store($id)
    {
        $id = base64_decode($id);
        $donation = Donation::where('id',$id)->first();
         if(empty($donation)){
             $notify[] = ['error', 'Failed, please try again later.'];
            return redirect()->route('donate')->withNotify($notify);
         }
        $data = PaymentSetting::whereUniqueKeyword('phonepe')->first();
        $gateway = $data->convertJsonData();
        
        $txnid =  "PHONEPE_TXN_" . uniqid();;
        $total_amount = $donation->amount;
        
        $post_data = array();
        $post_data['merchantId'] = $gateway['merchant_id'];
        $post_data['api_key'] = $gateway['api_key'];
        $post_data['merchantTransactionId'] = $txnid;
        $post_data['merchantUserId']= $txnid;
        $post_data['amount']= $total_amount* 100;
        
        $post_data['total_amount'] = $total_amount* 100;
        $post_data['currency'] = 'INR';
        $post_data['tran_id'] = $txnid;
        $post_data['success_url'] = route('phonepe.notify');
        $post_data['fail_url'] =  route('phonepe.notify');
        $post_data['cancel_url'] =  route('phonepe.notify');
        $post_data['redirectUrl'] =  route('phonepe.notify');
        
        $post_data['redirectMode']= "POST";
        $post_data['callbackUrl']= route('phonepe.notify');
        $post_data["paymentInstrument"]= array(    
            "type"=> "PAY_PAGE",
            );
      

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $donation->name;
        $post_data['cus_email'] = $donation->email;
        $post_data['cus_add1'] = '';
        $post_data['cus_city'] = '';
        $post_data['cus_postcode'] = '';
        $post_data['cus_country'] = '';
        $post_data['cus_phone'] = $donation->phone;
        $post_data['cus_fax'] = '';

        
        # REQUEST SEND TO SSLCOMMERZ
        if ($gateway['check_sandbox'] == 1) {
            $direct_api_url = "https://api.phonepe.com/apis/hermes/pg/v1/pay";
        } else {
            $direct_api_url = "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay";
        }
        
        // dd($post_data);
         // phone pe setup 
            $encode = json_encode($post_data);
            $payloadMain = base64_encode($encode);
            $salt_index = 1; //key index 1
            $payload = $payloadMain . "/pg/v1/pay" . $gateway['api_key'];
            $sha256 = hash("sha256", $payload);
            $final_x_header = $sha256 . '###' . $salt_index;
            $request = json_encode(array('request'=>$payloadMain));
            
            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $request,
            CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
             "X-VERIFY: " . $final_x_header,
             "accept: application/json",
            ],
            ]);
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
                  $notify[] = ['error', 'FAILED TO CONNECT WITH PhonePe API'];
                    return redirect()->route('donate')->withNotify($notify);
              } else {
                $res = json_decode($response);
            }
        //end phonePe setup 


        if(isset($res->code) && ($res->code=='PAYMENT_INITIATED')){
              $payUrl=$res->data->instrumentResponse->redirectInfo->url;
               return redirect()->away($payUrl);
        } else {
                  $notify[] = ['error', 'JSON Data parsing error!'];
                    return redirect()->route('donate')->withNotify($notify);
        }
    }


    public function notify(Request $request)
    {
        $input = $request->all();
      
      
       if($request->code == 'PAYMENT_SUCCESS')
          {
            $order = Donation::where('txn_id', $input['transactionId'])->first();
            if (isset($order)) {
                $data['payment_status'] = 'Paid';
                $order->update($data);
                
               $notify[] = ['success', 'Thank you for donate us.'];
            } else {
               $notify[] = ['error', 'Transaction has been failed.'];
            }
        } else {
             $notify[] = ['error', 'Transaction has been failed.'];
        }

         return redirect()->back()->withNotify($notify);
    }
    
    public function sendTestEmail()
    { 
         $emailData = [
                'to' => 'a.d.softwareeng@gmail.com',
                'subject' => 'Testing Mail',
                'body' => 'Hello',
            ];
         $email = new EmailHelper();
         $email->sendCustomMail($emailData);
         
         Session::flash('success',__('Email send successfully!'));
        return redirect()->back();
       
    }
    
   

}
