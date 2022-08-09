<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Discount;
use App\Services\MailSettings;
use App\Models\Setting;
use App\Mail\Test;
use Image;

use Validator, Throwable;

class WhatsappController extends Controller
{
    
      
    public function SendCard(Request $request){
        if($request->id){
             $id = $request->id;
            $data =Application::find($id);
            $name = $data->name;
            $email = $data->email;
            $phone = '91'.$data->phone;
            $whatsapp_no = '91'.$data->whatsapp_no;
            $card = $data->card_path;
            
            //  try {

            //                       $this->phone_message($key = $data->rand_img_key,$phone);
            //                       } catch (Throwable $e) {
            //                       //code to handle the exception
            //                     }
        
            if($data->otp_state == "verified"){
                    $url  = 'https://apin.purplecloud.ai/jelloBroadcast/broadcast/message/send/templateMessage';
                    $data =   json_encode(array(
                                    'dest'        => $whatsapp_no,
                                    'mediaUrl'    => $card,
                                    'filename'    => 'SwasthyamPrivilegeCard',
                                    'type'        => 'image',
                                    'templateId'  => 'e318605c-e596-415c-a7c8-e6b0ae5d6822',
                                    'messageType' => 'templateMessage',
                                    'isTemplate'  => 'yes',
                                    'campaignId'  => 'privcard',
                                ));
                  $headers = [
                                'api_key: k3bne2flrgklup9bfkwrs',
                                'Content-Type: application/json'
                            ];
                             $ch = curl_init($url);

                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            $response = curl_exec($ch);
                            
                                if ($response === false) {
                                    echo 'Curl error: ' . curl_error($ch);
                                } else {
                                    $reslut = json_decode($response);
                                    
                                    if($reslut->traceIds[0]->status && $reslut->traceIds[0]->traceId){
                                       
                                      $traceId = $reslut->traceIds[0]->traceId;
                                      $this->statuus_check($traceId);
                                      $new_obj = Application::find($id);
                                      $new_obj->whatsapp_api_status = $reslut->traceIds[0]->status;
                                      $new_obj->trace_id = $reslut->traceIds[0]->traceId;
                                      $new_obj->update();
                                      return response()->json(['success' => true,'img' => $card ,'res'=>$reslut]);
                                    }
                                    else{
                                     print_r($reslut);
                                    }
                                }
                                
                            curl_close($ch);
            }
            else{
                 return response()->json(['error' => "Not Verified !"]);
                
            }
                            
                                 

    }
 
    
   }
    public function SendCard_discount(Request $request){
        if($request->id){
             $id = $request->id;
            $data =Discount::find($id);
            $name = $data->name;
            $email = $data->email;
            $phone = '91'.$data->phone;
            $whatsapp_no = '91'.$data->whatsapp_no;
            $card = $data->card_path;
            
            //  try {

            //                       $this->phone_message($key = $data->rand_img_key,$phone);
            //                       } catch (Throwable $e) {
            //                       //code to handle the exception
            //                     }
        
            if($data->otp_state == "verified"){
                    $url  = 'https://apin.purplecloud.ai/jelloBroadcast/broadcast/message/send/templateMessage';
                    $data =   json_encode(array(
                                    'dest'        => $whatsapp_no,
                                    'mediaUrl'    => $card,
                                    'filename'    => 'SwasthyamPrivilegeCard',
                                    'type'        => 'image',
                                    'templateId'  => 'e318605c-e596-415c-a7c8-e6b0ae5d6822',
                                    'messageType' => 'templateMessage',
                                    'isTemplate'  => 'yes',
                                    'campaignId'  => 'privcard',
                                ));
                  $headers = [
                                'api_key: k3bne2flrgklup9bfkwrs',
                                'Content-Type: application/json'
                            ];
                             $ch = curl_init($url);

                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                            $response = curl_exec($ch);
                            
                                if ($response === false) {
                                    echo 'Curl error: ' . curl_error($ch);
                                } else {
                                    $reslut = json_decode($response);
                                    
                                    if($reslut->traceIds[0]->status && $reslut->traceIds[0]->traceId){
                                       
                                      $traceId = $reslut->traceIds[0]->traceId;
                                      $this->statuus_check($traceId);
                                      $new_obj = Discount::find($id);
                                      $new_obj->whatsapp_api_status = $reslut->traceIds[0]->status;
                                      $new_obj->trace_id = $reslut->traceIds[0]->traceId;
                                      $new_obj->update();
                                      return response()->json(['success' => true,'img' => $card ,'res'=>$reslut]);
                                    }
                                    else{
                                     print_r($reslut);
                                    }
                                }
                                
                            curl_close($ch);
            }
            else{
                 return response()->json(['error' => "Not Verified !"]);
                
            }
                            
                                 

    }
 
    
   }
   

     public function phone_message($id,$phone){
        //  $link ="https://works.spiderworks.co.in/Aster/dl/".$key;
         $link ="https://works.spiderworks.co.in/Aster/";
         
        

                    $url  = 'http://sms.xpresssms.in/api/api.php?ver=1';
                    $data =array(
                                     'mode'    => 1,
                                    'action'    => 'push_sms',
                                    'type'        => 1,
                                    'route'  => 2,
                                    'login_name' => 'AsterMed',
                                    'api_password'  => 'e6d713ff98bf1a2d7ef3',
                                    'message'  => 'Hi, thank you for enrolling in the Aster Privilege program. To download your card, please click '.$link.'\r\nAsterMedcity',
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
                            
                            //  print_r($response);exit;
                                if ($response) {
                                    $reslut = $response;
                                    
                                    // echo $reslut;
 
                                  
                                   
                                }
                                
                            curl_close($ch);
     }
        public function statuus_check($traceId){
                                       $url  = 'https://apin.purplecloud.ai/jelloBroadcast/broadcast/message/status?traceIds='.$traceId;
                                       $data =   json_encode(array(
                                                        'traceIds'        => $traceId
                                                    ));
                                      $headers = [
                                                    'Content-Type: application/json',
                                                    'traceIds:'.$traceId
                                                ];
                                      $ch = curl_init($url);
                                      curl_setopt($ch, CURLOPT_POST, true);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                    $response = curl_exec($ch);
                                    if ($response === false) {
                                    echo 'Curl error: ' . curl_error($ch);
                                } else {
                                    $reslut = json_decode($response);
                                    $status_check = $reslut;
                                    
                                      return $status_check;  
                                   
                                }
   }
   
}
