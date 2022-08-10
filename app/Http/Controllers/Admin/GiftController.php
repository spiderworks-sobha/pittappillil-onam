<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Traits\ResourceTrait;
use App\Models\Gift;
use Illuminate\Http\Request;
use View, Redirect;

class GiftController extends Controller
{
    use ResourceTrait;
    
    public function __construct()
    {
        parent::__construct();

        $this->model = new Gift;
        $this->route .= '.gifts';
        $this->views .= '.gifts';
        $this->resourceConstruct();

    }

    protected function getCollection() {
        return $this->model->select('id', 'name', 'probability', 'is_special_gift', 'status', 'created_at', 'updated_at');
        
    }

    protected function setDTData($collection) 
    {
        $route = $this->route;
        return $this->initDTData($collection)
            ->editColumn('is_special_gift', function($obj){
                return ($obj->is_special_gift == 1)?'<span class="badge bg-success">Special</span>':'<span class="badge bg-secondary">Normal</span>';
            })
            ->rawColumns(['action_edit', 'action_delete', 'status', 'is_special_gift']);
    }

    protected function getSearchSettings(){}

}
