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
        $settings = Setting::all();
        $data = [];
        foreach($settings as $setting)
        {
            $data[$setting->code] = $setting->content;
        }
        return view('admin.settings.index')->with('data', $data);
    }


    public function update(Request $request)
    {


        if ($request->id == 1) {

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

            $obj = Setting::find($request->id);
            $obj->content = $request->code;
            $obj->save();


            return response()->json(['success' => true]);
        } else {
            return response()->json('error_message', 'some thing went wrong');
        }
    }
}
