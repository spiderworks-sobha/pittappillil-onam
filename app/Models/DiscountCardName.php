<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCardName extends Model
{
    protected $table = 'discount_card_names';

    protected $fillable = array('discount_card_offer_name');

    protected $dates = ['created_at', 'updated_at'];

    protected function setRules()
    {

        $this->val_rules = array(
            'discount_card_offer_name' => 'required|max:250',
        );
    }
}
