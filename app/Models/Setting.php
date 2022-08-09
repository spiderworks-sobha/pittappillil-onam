<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = array('code', 'title', 'content', 'status');

    protected $dates = ['created_at', 'updated_at'];

    protected function setRules()
    {

        $this->val_rules = array(
            'code' => 'required|max:250',
        );
    }
}
