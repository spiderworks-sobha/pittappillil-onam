<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = array('name','country_id');


    protected function setRules()
    {

        $this->val_rules = array(
            'name' => 'required|max:250',
        );
    }
}
