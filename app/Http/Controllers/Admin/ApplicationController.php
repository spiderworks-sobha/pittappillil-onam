<?php

namespace App\Http\Controllers\Admin;

use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\CardType;
use App\Models\State;
use App\Models\City;
use Validator, DB;
use App\Exports\ApplicationExport;

use App\Http\Controllers\Web\HomeController;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->data['card_type_id']) {
                $card_type_id = $request->data['card_type_id'];
                $data = Application::where('card_type_id', $card_type_id)->get();
            } else {
                $data = Application::get();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '<a data-toggle="modal" edit-id="' . $row->id . '" id="edit" data-target="#applicationEdit" 
    class="booh-now-btn"><i class="fas fa-pencil-alt"></i></a>';
                    return $html;
                })
                ->addColumn('created_at', function ($row) {
                    $html = date('d/m/Y h:i:s A', strtotime($row->created_at));
                    // $html = $row->created_at->format('d/m/Y H:i:s A');
                    return $html;
                })
                ->addColumn('updated_at', function ($row) {
                    $html = date('d/m/Y h:i:s A', strtotime($row->updated_at));

                    // $html = $row->updated_at->format('d/m/Y H:i:s A');
                    return $html;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 0) {
                        $html = '<img src="' . asset('public/assets/img/new.png') . '" class="status-success" data-toggle="tooltip" data-placement="bottom" title="New Application" />';
                    } elseif ($row->status == 1) {
                        $html = '<img src="' . asset('public/assets/img/success.png') . '" class="status-success" data-toggle="tooltip" data-placement="bottom" title="Approved" />';
                    } elseif ($row->status == 2) {
                        $html = '<img src="' . asset('public/assets/img/expired.png') . '" class="status-faild" data-toggle="tooltip" data-placement="bottom" title="Pending" />';
                    } elseif ($row->status == 3) {
                        $html = '<img src="' . asset('public/assets/img/faild.png') . '" class="status-faild" data-toggle="tooltip" data-placement="bottom" title="Rejected" />';
                    } elseif ($row->status == 4) {
                        $html = '<img src="' . asset('public/assets/img/incomplete.png') . '" class="status-faild" data-toggle="tooltip" data-placement="bottom" title="Incomplete" />';
                    }
                    return $html;
                })
                ->addColumn('send', function ($row) {
                    if ($row->status == 1) {
                        $html = '<a class="btn btn-default" id="send"   application-id="' . $row->id . '" ><i class="fa fa-paper-plane"></i></a>';
                    } else {
                        $html = 'Not Approved';
                    }
                    return $html;
                })
                ->rawColumns(['created_at', 'updated_at', 'action', 'send', 'status'])

                ->make(true);
        }


        // $data = Application::orderBy('created_at', 'DESC')->paginate(10);

        // if ($request->ajax()) {
        //     $data = Application::orderBy('created_at', 'DESC')->paginate(10);
        //     return view('admin.application.view.old-table',  array('data' => $data))->render();
        // }
        $card_types = CardType::where('status', 1)->get();
        // print_r($states);exit;

        return view('admin.application.index', array('data' => null, 'card_types' => $card_types, 'states' => null));
    }
    public function city_filter(Request $request)
    {

        if ($request->ajax()) {
            if ($request->state) {
                $state = State::where('name', $request->state)->first();

                $cities = City::where('state_id', $state->id)->get();
            }
            $html = "";
            $html .=  '<option value="">Choose Districts</option>';

            foreach ($cities as  $key => $city) {

                $html .=  '<option value="' . $city->city . '">' . $city->city  . '</option> ';
            }
            return $html;
        }
    }
    public function edit(Request $request, $id)
    {
        $states = State::get();
        $cities = City::get();


        $data = Application::where('id', $id)->first();
        if (!empty($data)) {
            if ($request->ajax()) {
                return view('admin.application.edit', array('data' => $data, 'states' => $states, 'cities' => $cities));
            }
            return view('admin.application.edit', array('data' => $data, 'states' => $states, 'cities' => $cities));
        } else {
            return redirect()->back()->with('sad_message', 'some thing went wrong');
        }
    }

    public function update(Request $request)
    {

        $obj = Application::where('id', $request->id)->first();

        if (!empty($obj)) {

            $rules = array(
                'name' => 'required|max:255',
                'phone' => 'required|max:255',
                'email' => 'required|email|max:255',

            );

            $messages = [
                'name.required' => 'Please enter your name',
                'phone.required' => 'Please enter your mobile number',
                'email.email' => 'Please enter a valid email address',

            ];

            $data = $request->all();
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }
            $fields = "";
            if ($request->otp_state == "verified" && $obj->card_number == null) {
                $home_controller = new HomeController;

                $data['card_number'] = $home_controller->card_number_gen($request->name, $request->phone);

                if ($request->vaid_date == null) {
                    $today = new \DateTime();
                    $d = $today->format('d');
                    $m = $today->format('m');
                    $y = $today->format('y');
                    $valid = $d . '/' . $m . '/' . ($y + 1);
                    $data['vaid_date']  = $valid;

                    $valid_date = $data['vaid_date'];
                } else {
                    $valid_date = $request->vaid_date;
                }
                if ($request->salutation == "Dr.") {
                    $text_name = "Dr." . $request->name;
                } else {
                    $text_name = $request->name;
                }
                $text_valid = $valid_date;
                $text_card_no =  $data['card_number'];
                $id = $obj->id;
                $card_type_id = $obj->card_type_id;
                $text_card_uhid = $request->uh_id ? $request->uh_id : null;
                $card = $home_controller->addWatermark($text_name, $text_valid, $text_card_no, $id, $card_type_id, $text_card_uhid);
                $length = 6;
                $randimg_key = substr(str_shuffle("0123456789-_abcdefghijklmnopqrstuvwxyz"), 0, $length);

                $data['card_path'] = $card;
                $data['rand_img_key'] = $randimg_key;
                $data['otp_state'] = $request->otp_state;
                $data['status'] = 0;

                $fields = array(
                    'card_number' => $data['card_number'],
                    'rand_img_key' => $data['rand_img_key'],
                    'vaid_date' => $data['vaid_date'],
                    'img_link' =>  $data['card_path']
                );
            }
            if (
                $request->salutation != $obj->salutation ||
                $request->name != $obj->name ||
                $request->vaid_date != $obj->vaid_date ||
                $request->uh_id != $obj->uh_id
            ) {

                if ($request->salutation == "Dr.") {
                    $text_name = "Dr." . $request->name;
                } else {
                    $text_name = $request->name;
                }
                if (isset($valid_date)) {
                    $n_valid_date = $valid_date ? $valid_date : null;
                } else {
                    $n_valid_date = null;
                }

                $text_valid = $request->vaid_date ? $request->vaid_date : $n_valid_date;
                $text_card_no = $obj->card_number ? $obj->card_number : $data['card_number'];
                $id = $obj->id;
                $card_type_id = $obj->card_type_id;
                $text_card_uhid = $request->uh_id ? $request->uh_id : null;

                $home_controller = new HomeController;
                $card = $home_controller->addWatermark(
                    $text_name,
                    $text_valid,
                    $text_card_no,
                    $id,
                    $card_type_id,
                    $text_card_uhid
                );
                $old_image =  $obj->card_path;

                $old_image_name = basename($old_image);
                if ($card_type_id == 1) {
                    if (file_exists(public_path('privilege_cards/' . $old_image_name))) {
                        @unlink(public_path('privilege_cards/' . $old_image_name));
                    }
                } elseif ($card_type_id == 2) {
                    if (file_exists(public_path('platinam_cards/' . $old_image_name))) {
                        @unlink(public_path('platinam_cards/' . $old_image_name));
                    }
                } elseif ($card_type_id == 3) {

                    if (file_exists(public_path('discount_cards/' . $old_image_name))) {
                        @unlink(public_path('discount_cards/' . $old_image_name));
                    }
                }

                $data['card_path'] = $card;
            }

            $obj->fill($data);
            $obj->update();


            return response()->json(['success' => true, 'fields' => $fields ? $fields : null]);
        } else {
            return redirect()->back()->with('sad_message', 'some thing went wrong');
        }
    }


    public function export($id = null)
    {
        $collection = DB::table('applications')
            ->select('applications.salutation', 'applications.name', 'applications.email', 'applications.phone', 'applications.whatsapp_no', 'applications.locality', 'applications.pincode', 'applications.card_number', 'applications.vaid_date', 'applications.otp_state', 'applications.created_at', 'applications.updated_at', 'applications.notes', 'applications.working_place', 'applications.g_c_or_a', 'applications.state', 'applications.district_or_city', 'applications.uh_id', 'applications.ip_no', 'applications.card_path', DB::raw("(CASE WHEN applications.status = 1 THEN 'Approved' WHEN applications.status = 2 THEN 'Pending' WHEN applications.status = 3 THEN 'Rejected' WHEN applications.status = 4 THEN 'Incomplete' ELSE 'New Application' END) AS status"))
            ->orderBy('applications.created_at', 'DESC')->where('card_type_id', $id);


        $collection = $collection->get();

        $excel_name = 'applications_' . round(microtime(true) * 1000) . '.xlsx';
        return (new ApplicationExport($collection))->download($excel_name);
    }
}
