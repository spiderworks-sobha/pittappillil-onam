<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneOtpVerication extends Model
{
    protected $table = 'phone_otp_verification';

    protected $fillable = array( 'phone', 'otp', 'status','application_id',);

    protected $dates = ['created_at', 'updated_at'];

    protected function setRules()
    {

        $this->val_rules = array(
            'phone' => 'required|max:250',
        );
    }
}
