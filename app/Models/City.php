<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = array('city','state_id');


    protected function setRules()
    {

        $this->val_rules = array(
            'name' => 'required|max:250',
        );
    }
    
}
