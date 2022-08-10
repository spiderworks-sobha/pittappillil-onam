<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use App\Traits\ValidationTrait;

class Gift extends Model
{
	use ValidationTrait {
        ValidationTrait::validate as private parent_validate;
    }
    
    public function __construct() {
        
        parent::__construct();
        $this->__validationConstruct();
    }

    protected $table = 'gifts';


    protected $fillable = array('name', 'probability', 'is_special_gift', 'status');

    protected $dates = ['created_at','updated_at'];

    protected function setRules() {

        $this->val_rules = array(
            'name' => 'required|max:250',
            'probability' => 'required'
        );
    }

    protected function setAttributes() {
        $this->val_attributes = array(
        );
    }

}
