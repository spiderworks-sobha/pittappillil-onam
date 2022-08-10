<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use App\Traits\ValidationTrait;

class SpecialInvoice  extends Model
{
	use ValidationTrait {
        ValidationTrait::validate as private parent_validate;
    }
    
    public function __construct() {
        
        parent::__construct();
        $this->__validationConstruct();
    }

    protected $table = 'special_invoices';


    protected $fillable = array('invoice', 'gifts_id', 'status');

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

    public function gift()
    {
        return $this->belongsTo('App\Models\Gift', 'gifts_id');
    }

}
