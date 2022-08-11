<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Traits\ResourceTrait;
use App\Models\Submission;
use App\Models\Gift;
use Illuminate\Http\Request;
use View, Redirect;

class ClaimedSubmissionController extends Controller
{
    use ResourceTrait;
    
    public function __construct()
    {
        parent::__construct();

        $this->model = new Submission;
        $this->route .= '.claimed-submissions';
        $this->views .= '.claimed_submissions';
        $this->resourceConstruct();

    }

    protected function getCollection() {
        return $this->model->select('submissions.id', 'gifts.name as gift', 'submissions.invoice', 'submissions.name', 'submissions.created_at', 'submissions.updated_at')->join('gifts', 'gifts.id', '=', 'submissions.gifts_id')->where('claim_status', 1);
    }

    protected function setDTData($collection) 
    {
        $route = $this->route;
        return $this->initDTData($collection)
            ->rawColumns(['action_edit']);
    }

    protected function getSearchSettings(){}


}
