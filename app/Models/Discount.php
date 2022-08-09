<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';

    protected $fillable = array('name', 'salutation', 'whatsapp_no', 'phone', 'email', 'locality', 'pincode', 'card_number', 'card_type_id', 'vaid_date', 'card_path', 'dob', 'status', 'otp', 'otp_state', 'whatsapp_api_status', 'trace_id', 'rand_img_key', 'created_at', 'updated_at', 'notes', 'working_place', 'g_c_or_a', 'ip_no', 'uh_id', 'discount_recommended_by', 'discount_initiated_by', 'district_or_city', 'state', 'card_name');

    protected $dates = ['created_at', 'updated_at'];

    protected function setRules()
    {

        $this->val_rules = array(
            'name' => 'required|max:250',
            'phone' => 'required|max:255',
        );
    }
    public function card_type()
    {
        return $this->belongsTo('App\Models\CardType', 'card_type_id');
    }
}
