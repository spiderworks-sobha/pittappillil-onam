<?php 

namespace App\Traits;

trait ServiceTrait {

    public function send_whatsapp_message($message, $to)
    {
        $url = 'https://api.telinfy.net/g360/whatsapp/templates/message';
        
        $fields = [];
        $fields['whatsAppBusinessId'] = config('services.whatsapp.business_id');
        $fields['to'] = $to;
        $fields['type'] = 'template';
        $fields['templateName'] = 'onam_2022';
        $fields['language'] = 'en_US';
        $fields['body'] = ['parameters'=>['type'=>'text', 'text'=>$message]];
        $fields['header'] = null;
        $fields['button'] = null;
        
        $ch = curl_init();
        
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Api-Key:'.config('services.whatsapp.key')]);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $result = curl_exec($ch);        
        curl_close($ch);
        return $result;
    }

    public function send_sms($message, $to)
    {
        $user = config('services.sms.user_name');
        $password = config('services.sms.password');
        $senderid = config('services.sms.senderid');
        $url = "http://sapteleservices.com/SMS_API/sendsms.php";
        $message = urlencode($message);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt ($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=$user&password=$password&mobile=$to&message=$message&sendername=$senderid&routetype=1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);        
        curl_close($ch);
        return $result;
    }
}