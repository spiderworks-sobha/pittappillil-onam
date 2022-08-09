<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $table = 'card_types';

    protected $fillable = array('type_name','status');

    protected $dates = ['created_at', 'updated_at'];

    protected function setRules()
    {

        $this->val_rules = array(
            'type_name' => 'required|max:250',
        );
    }
}
