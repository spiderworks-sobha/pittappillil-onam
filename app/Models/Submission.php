<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use App\Traits\ValidationTrait;

class Submission extends Model
{
	use ValidationTrait {
        ValidationTrait::validate as private parent_validate;
    }
    
    public function __construct() {
        
        parent::__construct();
        $this->__validationConstruct();
    }

    protected $table = 'submissions';


    protected $fillable = array('name', 'phone_number', 'branch', 'invoice', 'gift', 'is_gold_coin', 'claim_status', 'claimed_on');

    protected $dates = ['created_at','updated_at'];

    protected function setRules() {

        $this->val_rules = array(
            'invoice' => 'required|max:250',
        );
    }

    protected function setAttributes() {
        $this->val_attributes = array(
        );
    }

}
