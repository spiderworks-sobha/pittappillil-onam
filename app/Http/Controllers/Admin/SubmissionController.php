<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Traits\ResourceTrait;
use App\Models\Submission;
use App\Models\Gift;
use Illuminate\Http\Request;
use View, Redirect;

class SubmissionController extends Controller
{
    use ResourceTrait;
    
    public function __construct()
    {
        parent::__construct();

        $this->model = new Submission;
        $this->route .= '.submissions';
        $this->views .= '.submissions';
        $this->resourceConstruct();

    }

    protected function getCollection() {
        return $this->model->select('submissions.id', 'gifts.name as gift', 'submissions.invoice', 'submissions.name', 'submissions.created_at', 'submissions.updated_at')->join('gifts', 'gifts.id', '=', 'submissions.gifts_id')->where('claim_status', 0);
    }

    protected function setDTData($collection) 
    {
        $route = $this->route;
        return $this->initDTData($collection)
            ->rawColumns(['action_edit']);
    }

    protected function getSearchSettings(){}

    public function update(Request $request) {
        $data = $request->all();
        $id = decrypt($data['id']);
    	$this->model->validate($data, $id);
        if($obj = $this->model->find($id)){
            $data['claim_status'] = 1;
            $data['claimed_on'] = date('Y-m-d H:i:s');
        	$obj->update($data);
            return response()->json(['success'=>'Successfully marked as Claimed.']);
        } else {
            return $this->redirect('notfound');
        }
    }


}
