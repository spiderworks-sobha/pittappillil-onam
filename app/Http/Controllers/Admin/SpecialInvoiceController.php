<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as Controller;
use App\Traits\ResourceTrait;
use App\Models\SpecialInvoice;
use App\Models\Gift;
use Illuminate\Http\Request;
use View, Redirect;

class SpecialInvoiceController extends Controller
{
    use ResourceTrait;
    
    public function __construct()
    {
        parent::__construct();

        $this->model = new SpecialInvoice;
        $this->route .= '.special-invoices';
        $this->views .= '.special_invoices';
        $this->resourceConstruct();

    }

    protected function getCollection() {
        return $this->model->select('special_invoices.id', 'gifts.name as gift', 'special_invoices.invoice', 'special_invoices.status', 'special_invoices.created_at', 'special_invoices.updated_at')->join('gifts', 'gifts.id', '=', 'special_invoices.gifts_id');
    }

    protected function setDTData($collection) 
    {
        $route = $this->route;
        return $this->initDTData($collection)
            ->rawColumns(['action_edit', 'action_delete', 'status']);
    }

    protected function getSearchSettings(){}

    public function create()
	{
        $gifts = $this->fetch_gifts();
		return view($this->views . '._partials.form')->with('obj', $this->model)->with('gifts', $gifts);
	}

    public function store(Request $request)
    {
        $data = $request->all();
    	$this->model->validate($data);
        $this->model->fill($data);
		$this->model->save();
        $gifts = $this->fetch_gifts();
        $form_view = View::make($this->views .'/_partials/form', [ 'obj' => $this->model, 'gifts'=>$gifts]);
        $form_html = $form_view->render();
		return $this->redirect('created', 'success', 'edit', $form_html);
    }

    public function edit($id) {
        $id = decrypt($id);
        if($obj = $this->model->find($id)){
            $gifts = $this->fetch_gifts();
            return view($this->views . '._partials.form')->with('obj', $obj)->with('gifts', $gifts);
        } else {
            return $this->redirect('notfound');
        }
    }

    public function update(HttpRequest $request) {
        $data = $request->all();
        $id = decrypt($data['id']);
    	$this->model->validate($data, $id);
        if($obj = $this->model->find($id)){
        	$obj->update($data);
            $gifts = $this->fetch_gifts();
            $form_view = View::make($this->views .'/_partials/form', [ 'obj' => $obj, 'gifts'=>$gifts]);
            $form_html = $form_view->render();
            return $this->redirect('updated','success', 'edit', $form_html);
        } else {
            return $this->redirect('notfound');
        }
    }

    public function fetch_gifts()
    {
        return $gifts = Gift::where('is_special_gift', 1)->get();
    }

}
