<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Validator;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $smtp_obj = Setting::where('code', 'smtp-settings')->first();
        $email_obj = Setting::where('code', 'mail-settings')->first();


        $smtp = $smtp_obj->content;
        $email = $email_obj->content;


        return view('admin.settings.index', array('smtp' => json_decode($smtp),'email'=>json_decode($email)));
    }


    public function update(Request $request)
    {


        if ($request->code == "smtp-settings") {

            $rules = array(
                'code' => 'required|max:255',

            );

            $messages = [
                'code.required' => 'code is required',

            ];

            $data = $request->all();

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $obj = Setting::where('code', $request->code)->first();
            $collection = array(
                'protocol' => $request->protocol,
                'host' => $request->host,
                'username' => $request->username,
                'smtp_security' => $request->smtp_security,
                'port' => $request->port,
                'password' => $request->password,
                'name' => $request->name

            );
            $data['content'] = json_encode($collection);
            $obj->fill($data);
            $obj->update();


            return response()->json(['success' => true]);
        } else if ($request->code == "mail-settings") {

            $rules = array(
                'code' => 'required|max:255',
            );

            $messages = [
                'code.required' => 'code is required',
            ];

            $data = $request->all();

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $obj = Setting::where('code', $request->code)->first();
            $collection = array(
                'email_to' => $request->email_to,
                'email_cc' => $request->email_cc
            );
            $data['content'] = json_encode($collection);
            $obj->fill($data);
            $obj->update();


            return response()->json(['success' => true]);
        }else {
            return response()->json('sad_message', 'some thing went wrong');
        }
    }
}
