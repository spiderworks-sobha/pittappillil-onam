<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\PhoneOtpVerication;
use App\Services\MailSettings;
use App\Models\Setting;
use App\Mail\Test;
use Image;
use Session;
use Validator, Throwable;

class OtpApiController extends Controller
{
    
    public function send_test_otp(){
        
        
        $link ="https://card.asterhospitals.in/";
        
           $phone = '918606541551';

                    $url  = 'http://sms.xpresssms.in/api/api.php?ver=1';
                    $data =array(
                                     'mode'    => 1,
                                    'action'    => 'push_sms',
                                    'type'        => 1,
                                    'route'  => 2,
                                    'login_name' => 'AsterMed',
                                    'api_password'  => 'e6d713ff98bf1a2d7ef3',
                                    'message'  => ' " Hi, thank you for enrolling in the Aster Privilege program. To download your card, please click '.$link.'\r\nAsterMedcity',
                                    'number' => $phone,
                                    'sender' => 'ASTERM',
                                    'template_id' =>' 1007608815794541106'
                               );
                             $ch = curl_init($url);

                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            $response = curl_exec($ch);
                            
                            print_r($response);exit;
                             
                                if ($response === false) {
                                    echo 'Curl error: ' . curl_error($ch);
                                } else {
                                    $reslut = $response;
                                    
                                    
                                    //  print_r($reslut);
                                   
                                }
                                
                            curl_close($ch);
                            
                            
    }
    
  public function TempSendOtp(Request $request){
        if($request->phone){
            // $data =Application::find();
           $temp_otp = substr(str_shuffle("0123456789"), 0, 4);
        }
                return response()->json(['success' => true,'otp'=>$temp_otp]);

  }
    public function SendOtp(Request $request){
        if($request->phone){
            // $data =Application::find();
            $otp = substr(str_shuffle("0123456789"), 0, 4);

      
            $phone = '91'.$request->phone;
//$link ="https://card.asterhospitals.in/card-12-akhil";
$link ="https://works.spiderworks.co.in/Aster/";

                    $url  = 'http://sms.xpresssms.in/api/api.php?ver=1';
                    $data =array(
                                    'mode'    => 1,
                                    'action'    => 'push_sms',
                                    'type'        => 1,
                                    'route'  => 2,
                                    'login_name' => 'AsterMed',
                                    'api_password'  => 'e6d713ff98bf1a2d7ef3',
                                    'message'  => ' "Your OTP is '.$otp.'. Use this to verify your mobile\r\nAster Medcity',
                                    'number' => $phone,
                                    'sender' => 'ASTERM',
                                    'template_id' =>'1007458181439391288'
                               );
                             $ch = curl_init($url);

                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            $response = curl_exec($ch);
                            
                             
                                if ($response === false) {
                                    echo 'Curl error: ' . curl_error($ch);
                                } else {
                                    $reslut = $response;
                                   $check = PhoneOtpVerication::where('phone',$phone)->first();
                                    if($check == null)
                                    {
                                    $obj = new  PhoneOtpVerication;
                                    $obj->phone = $phone;
                                    $obj->otp = $otp;
                                    $obj->save();
                                    }else{
                                       
                                        $check->otp =$otp;
                                        $check->save();
                                    }

                                    return response()->json(['success' => true,'otp'=>encrypt($otp),'api_res'=>$reslut]);

                                }
                                
                            curl_close($ch);

    }
 
    
   }

}
