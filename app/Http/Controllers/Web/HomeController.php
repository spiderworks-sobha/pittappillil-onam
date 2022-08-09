<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Discount;
use App\Services\MailSettings;
use App\Models\Setting;
use App\Models\CardType;
use App\Mail\Test;
use Image;
use App\Models\PhoneOtpVerication;
use Psy\Readline\Hoa\Console;
use Session;
use Validator, Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $card_type = CardType::where('id', 1)->first();

        return view('web.home')->with('card_type_id', encrypt($card_type->id));
    }
    public function platinam_index()
    {
        $card_type = CardType::where('id', 2)->first();

        return view('web.platinam-home')->with('card_type_id', encrypt($card_type->id));
    }
    public function new_index()
    {

        return view('web.test-home');
    }
    public function dl($id)
    {
        $data = Application::where('rand_img_key', $id)->first();
        $data_2 = Discount::where('rand_img_key', $id)->first();

        //   return "<a href=".$data->card_path." download><img src=".$data->card_path." /></a>";
        if ($data) {
            return view('web.dl')->with('data', $data);
        } elseif ($data_2) {
            return view('web.dl')->with('data', $data_2);
        } else {
            abort('404');
        }
    }
    public function phone_check(Request $request)
    {
        $phone = $request->phone;
        $state_check = Application::where('phone', $phone)->where('otp_state', 'verified')->first();
        $rules = array('phone' => 'required|max:255|unique:applications');
        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            if ($state_check) {
                echo "false";
            } else {
                echo "true";
            }
        } else {
            echo "true";
        }
    }
    public function otp_check(Request $request)
    {
        $otp = decrypt($request->otp);
        if ($request->otp_number == $otp) {
            $check = PhoneOtpVerication::where('otp', $otp)->first();
            if ($check != null) {
                $id = Session::get('application_id');
                $check->application_id = $id;
                $check->status = 1;
                $check->save();
                return response()->json(['success' => true, 'otp' => $request->otp_number]);
            } else {
                return response()->json(['success' => true, 'otp' => null]);
            }
        } else {
            return response()->json(['faild' => "invalid", 'otp' => $request->otp_number]);
        }
    }

    public function save(Request $request)
    {

        // $obj = new Application;
        $rules = array(
            'name' => 'required|max:255',
            // 'phone' => 'required|max:255|unique:applications',
            'email' => 'required|email|max:255',

        );

        $messages = [
            'name.required' => 'Please enter your name',
            // 'phone.required' => 'Please enter your mobile number',
            'email.email' => 'Please enter a valid email address',

        ];

        $data = $request->all();
        if ($request->otp_state == "verified") {
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }
        }
        $today = new \DateTime();


        $data['card_number'] = $this->card_number_gen($data['name'], $data['phone']);

        if ($request->otp_state == "pending") {

            $obj = Application::firstOrNew([
                'salutation' => $request->salutation,
                'name' => $request->name,
                'phone' => $request->phone,
                'whatsapp_no' => $request->whatsapp_no,
                'email' => $request->email,
                'locality' => $request->locality,
                'pincode' => $request->pincode,
                'card_number' => null,
                'status' => 4,
                'otp' => decrypt($request->application_otp),
                'otp_state' => $request->otp_state,
                'card_type_id' => decrypt($request->card_type),
            ]);

            if ($obj->save()) {
                Session::put('application_id', $obj->id);
                // $id =$obj->id;

            }
        } elseif ($request->otp_state == "verified") {
            $id = Session::get('application_id');
            $obj = Application::where('id', $id)->first();
            $obj->salutation = $request->salutation;
            $obj->name = $request->name;
            $obj->whatsapp_no = $request->whatsapp_no;
            $obj->email = $request->email;
            $obj->locality = $request->locality;
            $obj->pincode = $request->pincode;
            $obj->card_number = $data['card_number'];
            $obj->status = 0;
            $obj->otp = decrypt($request->application_otp);
            $obj->otp_state = $request->otp_state;
            $obj->card_type_id = decrypt($request->card_type);
            try {

                $this->email_addesss($obj, $data);
            } catch (Throwable $e) {
                //code to handle the exception
            }

            if ($obj->save()) {
                $id = $obj->id;

                $d = $today->format('d');
                $m = $today->format('m');
                $y = $today->format('y');
                $valid = $d . '/' . $m . '/' . ($y + 1);
                if ($obj->salutation == "Dr.") {
                    $text_name = "Dr." . $data['name'];
                } else {
                    $text_name = $data['name'];
                }
                // $text_name = $data['name'];
                $text_valid = $valid;
                $text_card_no = $data['card_number'];
                $card_type_id = $obj->card_type_id;
                $card = $this->addWatermark($text_name, $text_valid, $text_card_no, $id, $card_type_id);

                // $new_obj = Application::find($id);
                $obj->card_path = $card;
                $obj->vaid_date = $valid;
                $length = 6;

                $randimg_key = substr(str_shuffle("0123456789-_abcdefghijklmnopqrstuvwxyz"), 0, $length);
                $obj->rand_img_key = $randimg_key;
                $obj->save();
                Session::forget('application_id');
            }
        } else {
            print_r($request->otp_state);
            exit;
        }



        $text_name = $data['name'];


        return response()->json(['success' => true, 'name' => $text_name, 'application_id' => null]);
    }
    public function email_addesss($obj, $data)
    {

        $mail_widget =  Setting::where('code', 'mail-settings')->first();
        $mail_settings = json_decode($mail_widget->content);


        $mail_to = $mail_settings->email_to;
        $mail_cc = explode(",", $mail_settings->email_cc);
        $mail = new MailSettings;
        $mail->to($mail_to)->cc($mail_cc)->send(new \App\Mail\MainMail($obj));



        return [$mail];
    }

    public function test_mail()
    {
        $mail = new MailSettings;
        $mail->to('supal@spiderworks.in')->cc('priyanka@spiderworks.in')->send(new Test([]));
        echo "Mail send";
        exit;
    }


    public function card_number_gen($name, $phone, $card_type = null)
    {
        $today = new \DateTime();
        $n_name = str_replace(' ', '', $name);

        // $randomNumber = random_int(00, 99);
        $edited_name = substr($n_name, 0, 4);
        $extra_no = 0;
        $edited_date = $today->format('m') . $today->format('y');
        $edited_phone = substr($phone, -4);
        $edited_name = strtoupper($edited_name);
        $temp_card_no = $edited_name . $edited_date . $edited_phone;
        $count = (strlen($temp_card_no));


        $exist = true;
        while ($exist == true) {
            $temp_extra_no = ($extra_no < 10) ? '0' . $extra_no : $extra_no;
            if ($card_type == 3) {
                $check = Discount::where('card_number', $temp_card_no . $temp_extra_no)->first();
            } else {
                $check = Application::where('card_number', $temp_card_no . $temp_extra_no)->first();
            }


            if ($check !== null) {
                $extra_no++;
            } else {
                $exist = false;
            }
        }

        $randomNumber = $temp_extra_no;
        $card_number = $edited_name . $edited_date . $edited_phone . $randomNumber;
        return $card_number;
    }

    public function addWatermark($text_name, $text_valid, $text_card_no, $id, $card_type_id, $text_card_uhid = null, $text_card_offer_name = null)
    {
        if ($card_type_id == 1) {
            $og_image = public_path('assets/img/pre-card.png');
        } elseif ($card_type_id == 2) {
            $og_image = public_path('assets/img/plat-card.png');
        } elseif ($card_type_id == 3) {
            $og_image = public_path('assets/img/dis-card.png');
        }
        // $og_image = public_path('assets/img/pre-card.png');
        $image    = Image::make($og_image);
        $new_image_name = 'PC-' . $id . '-' . time() . '.' . $image->extension;
        if ($card_type_id == 1) {
            $imageFilePath = public_path('privilege_cards');
        } elseif ($card_type_id == 2) {
            $imageFilePath = public_path('platinam_cards');
        } elseif ($card_type_id == 3) {
            $imageFilePath = public_path('discount_cards');
        }

        $font_size = 35;
        $y = 655;
        if (strlen($text_name) > 20) {
            $font_size = 25;
            $y = 650;
        }


        $img = $image;
        $img->text($text_name, 145, $y, function ($font) use ($font_size) {
            // Using font family here
            $font->file(public_path('font/RobotoMono-VariableFont_wght.ttf'));
            $font->size($font_size);
            $font->color('#337ab7');
            $font->align('left');
            $font->valign('bottom');
        });

        if ($card_type_id == 1) {
            $v_x = 858;
            $v_y = 680;
        } elseif ($card_type_id == 3) {
            $v_x = 810;
            $v_y = 695;
        }
        $img->text($text_valid, $v_x, $v_y, function ($font) use ($font_size) {
            // Using font family here
            $font->file(public_path('font/RobotoMono-VariableFont_wght.ttf'));
            $font->size(30);
            $font->color('#337ab7');
            $font->align('left');
            $font->valign('bottom');
        });
        $img->text($text_card_no, 145, 700, function ($font) use ($font_size) {
            // Using font family here
            $font->file(public_path('font/RobotoMono-VariableFont_wght.ttf'));
            $font->size($font_size);
            $font->color('#060f06');
            $font->align('left');
            $font->valign('bottom');
        });
        if ($text_card_uhid != null) {
            if ($card_type_id == 1) {
                $uh_x = 740;
            } else {
                $uh_x = 700;
            }
            $img->text($text_card_uhid, $uh_x, 640, function ($font) use ($font_size) {
                // Using font family here
                $font->file(public_path('font/RobotoMono-VariableFont_wght.ttf'));
                $font->size(30);
                $font->color('#060f06');
                $font->align('left');
                $font->valign('bottom');
            });
        }
        if ($text_card_offer_name != null) {
            if (strlen($text_card_offer_name) < 32) {
                $len = strlen($text_card_offer_name);
                $o_n_x = 260 + (32 - $len);
            } else {
                $o_n_x = 165;
            }
            $img->text($text_card_offer_name, $o_n_x, 455, function ($font) use ($font_size) {
                // Using font family here
                $font->file(public_path('font/RobotoMono-VariableFont_wght.ttf'));
                $font->size($font_size);
                $font->color('#060f06');
                $font->align('left');
                $font->valign('bottom');
            });
        }
        $img->save($imageFilePath . '/' . $new_image_name);
        if ($card_type_id == 1) {
            $cardpath = asset('/public/privilege_cards/' . $new_image_name);
        } elseif ($card_type_id == 2) {
            $cardpath = asset('/public/platinam_cards/' . $new_image_name);
        } elseif ($card_type_id == 3) {

            $cardpath = asset('/public/discount_cards/' . $new_image_name);
        }
        return $cardpath;
    }

    public function preview()
    {
        return "<img src=" . $this->addWatermark("Rajeshkrishna", "07/22", "AKHI 0722 7956 00", 10) . " />";
    }
}
