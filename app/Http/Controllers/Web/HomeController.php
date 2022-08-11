<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MailSettings;
use App\Models\Setting;
use App\Models\Submission;
use App\Models\Gift;
use App\Models\SpecialInvoice;
use App\Mail\Test;
use Validator, DB;

class HomeController extends Controller
{
    public function index()
    {
        $branches = DB::table('branches')->where('status', 1)->get();
        return view('web.home')->with('branches', $branches);
    }

    public function invoice()
    {
        return view('web.invoice');
    }

    public function invoice_search(Request $request)
    {
        $rules = array(
            'invoice' => 'required|max:255'
        );

        $messages = [
            'invoice.required' => 'Please enter your invoice number'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $gift = Submission::where('invoice', $data['invoice'])->first();
        if(!$gift)
            return response()->json(['errors' => ['invoice'=>'Price not available for this invoice number.']]);
        else
            return view('web.invoice_result')->with('gift', $gift); 
    }

    public function check_invoice(Request $request)
    {
        $data = $request->all();
        $check_exist = DB::table('submissions')->where('invoice', $data['invoice'])->first();
        if($check_exist)
            echo "false";
        else
            echo "true";
    }
    public function save(Request $request)
    {

        $rules = array(
            'name' => 'required|max:255',
            'phone_number' => 'required|max:10',
            'branch' => 'required|max:255',
            'invoice' => 'required|max:255|unique:submissions',
        );

        $messages = [
            'name.required' => 'Please enter your name',
            'phone_number.required' => 'Please enter your mobile number',
            'branch.required' => 'Please select your nearest branch',
            'invoice.required' => 'Please enter your invoice number',
            'invoice.unique' => 'This invoice is already claimed.',
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $submission = new Submission;
        $submission->fill($data);
        $submission->save();

        $check_in_special_gift = SpecialInvoice::where('invoice', $submission->invoice)->where('status', 1)->first();
        if($check_in_special_gift)
        {
            $gift = $check_in_special_gift->gift;
            $submission->gifts_id = $check_in_special_gift->gifts_id;
        }
        else{
            $gift = $this->get_gift();
            $submission->gifts_id = $gift->id;
        }
        $submission->save();
        return view('web.thankyou')->with('gift', $gift);
    }

    private function get_gift()
    {
        $gifts = Gift::where('status', 1)->where('is_special_gift', 0)->get();
        $values = [];
        $weights = [];
        foreach($gifts as $gift)
        {
            $values[] = $gift->id;
            $weights[] = $gift->probability;
        }
        $weighted_value = $this->weighted_random($values, $weights);
        return Gift::find($weighted_value);
    }

    private function weighted_random($values, $weights){ 
        $count = count($values); //3
        $i = 0; 
        $n = 0; 
        $num = mt_rand(0, array_sum($weights)); //0-151
        while($i < $count){
            $n += $weights[$i]; //1
            if($n >= $num){
                break; 
            }
            $i++; 
        } 
        return $values[$i]; 
    }

    public function test_mail()
    {
        $mail = new MailSettings;
        $mail->to('supal@spiderworks.in')->cc('priyanka@spiderworks.in')->send(new Test([]));
        echo "Mail send";
        exit;
    }

}
