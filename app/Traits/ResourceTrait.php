<?php 

namespace App\Traits;

use View, Request, DataTables, Form, Redirect, Artisan;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request as HttpRequest;

trait ResourceTrait {

	protected $model, $entity, $permissions;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function resourceConstruct()
	{
		$this->entity = $this->getEntityName();
		View::share(['route' => $this->route, 'views' => $this->views, 'entity' => $this->entity]);
	}

	protected function getEntityName() {
		$name = class_basename($this->model);
        $parts = preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY);
        return ucfirst(strtolower(implode(' ', $parts)));
	}

	/**
	 * Show the data list.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Request::ajax()) {
            $collection = $this->getCollection();
            return $this->setDTData($collection)->make(true);
        } else {
            $search_settings = $this->getSearchSettings();
			return view($this->views . '.index')->with('search_settings', $search_settings);
        }
	}

	abstract protected function getCollection();

    abstract protected function getSearchSettings();

	protected function initDTData($collection, $queries = []) {
		$route = $this->route;
		return Datatables::of($collection)
            ->setRowId('row-{{ $id }}')
            ->addColumn('date', function($obj){
                if($obj->updated_at)
                    return date('d M, Y h:i A', strtotime($obj->updated_at));
                else
                    return '';
            })
            ->orderColumn('date', function ($query, $order) {
                     $query->orderBy('updated_at', $order);
            })
            ->editColumn('status', function($obj) use($route) { 
                if($obj->status == 1)
                {
                    return '<a href="' . route($route.'.change-status', [encrypt($obj->id)]).'" class="webadmin-btn-warning-popup" data-message="Are you sure, want to disable this record?"><i class="h5 text-success fa fa-check-circle"></i></a>'; 
                }
                else{
                    return '<a href="' . route($route.'.change-status', [encrypt($obj->id)]) . '" class="webadmin-btn-warning-popup" data-message="Are you sure, want to enable this record?"><i class="h5 text-danger fa fa-times-circle"></i></a>';
                }
            })
            ->addColumn('action_edit', function($obj) use ($route, $queries) { 
                return '<a href="'.route($route.'.edit', [encrypt($obj->id)]).'" class="text-info show-form-modal" title="' . ($obj->updated_at ? 'Last updated at : ' . date('d/m/Y - h:i a', strtotime($obj->updated_at)) : ''). '" ><i class="fa fa-pencil-alt"></i></a>';
            })
            ->addColumn('action_delete', function($obj) use ($route, $queries) { 
                return '<a href="'.route($route.'.destroy', [encrypt($obj->id)]).'" class="text-danger webadmin-btn-warning-popup" data-message="Are you sure to delete?  Associated data will be removed if it is deleted." title="' . ($obj->updated_at ? 'Last updated at : ' . date('d/m/Y - h:i a', strtotime($obj->updated_at)) : '') . '"><i class="fa fa-trash"></i></a>';
            });
	}

	protected function setDTData($collection) {
		return $this->initDTData($collection);
	}

	/**
	 * Show the add form.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->views . '._partials.form')->with('obj', $this->model);
	}

	public function show($id)
	{
		$id = decrypt($id);
        if($obj = $this->model->find($id)){
            return view($this->views . '.view')->with('obj', $obj);
        } else {
            return $this->redirect('notfound');
        }
	}

    public function store(HttpRequest $request)
    {
        $data = $request->all();
    	$this->model->validate($data);
        return $this->_store($data);
    }

	protected function _store($data)
	{
        $data['priority'] = (!empty($data['priority']))?$data['priority']:0;
		$this->model->fill($data);
		$this->model->save();
        $form_view = View::make($this->views .'/_partials/form', [ 'obj' => $this->model]);
        $form_html = $form_view->render();
		return $this->redirect('created', 'success', 'edit', $form_html);
	}

    public function edit($id) {
        $id = decrypt($id);
        if($obj = $this->model->find($id)){
            return view($this->views . '._partials.form')->with('obj', $obj);
        } else {
            return $this->redirect('notfound');
        }
    }

    public function update(HttpRequest $request) {
        $data = $request->all();
        $id = decrypt($data['id']);
    	$this->model->validate($data, $id);
        return $this->_update($id, $data);
    }

    protected function _update($id, $data) {
        if($obj = $this->model->find($id)){
            $data['priority'] = (!empty($data['priority']))?$data['priority']:0;
        	$obj->update($data);
            $form_view = View::make($this->views .'/_partials/form', [ 'obj' => $obj]);
            $form_html = $form_view->render();
            return $this->redirect('updated','success', 'edit', $form_html);
        } else {
            return $this->redirect('notfound');
        }
    }

    public function changeStatus($id)
    {
        $id = decrypt($id);
        $obj = $this->model->find($id);
        if ($obj) {
            $status = $obj->status;
            $set_status = ($status == 1)?0:1;
            $obj->status = $set_status;
            $obj->save();
            $message = ($status == 1)?"disabled":"enabled";
            return $this->redirect($message,'success', 'index');
        }
        return $this->redirect('notfound');
    }
    
    public function destroy($id) {
        $id = decrypt($id);
        $obj = $this->model->find($id);
        if ($obj) {
            $obj->delete();
            return $this->redirect('removed','success', 'index');
        }
        
        return $this->redirect('notfound');
    }


    /**
     * Redirect after an operation
     * @return Redirect redirect object
     */
	protected function redirect($op = null, $type = 'success', $view = 'edit', $form_html='')
	{
        if($type == 'success')
        {
            $message = '';
            
            if($op =='created')
                $message = 'created';
            elseif($op =='removed')
                $message = 'deleted';
            elseif($op =='disabled')
                $message = 'disabled';
            elseif($op =='enabled')
                $message = 'enabled';
            elseif($op == 'updated')
                $message = 'updated';

            if (Request::ajax())
                $response = response()->json(['success'=>$this->entity.' successfully '.$message.'!', 'response'=>$form_html]);
            else
                $response = Redirect::route($this->route . '.' . $view)->withSuccess($this->entity.' successfully '.$message.'!');
        }
        else
            if (Request::ajax())
                $response = response()->json(['error'=>'Oops!! something went wrong...Please try again.']);
            else
                $response = Redirect::back()->withInput();

        return $response;
	}

    protected function applyFiltering($collection)
    {
        $search = request()->get('data');
        if($search)
        {
            foreach ($search as $key => $value) {
                $condition = null;
                $keyArr =  explode('-', $key);
                if(isset($keyArr[1]))
                {
                        $key = $keyArr[1];
                        $condition = $keyArr[0];
                 }
                if($value)
                {
                    if($condition == 'date_between')
                    {
                            $date_array = explode('-', $value);
                            $from_date = $this->formatDate($date_array[0]);
                            $from_date = date('Y-m-d H:i:s', strtotime($from_date.' 00:00:00'));
                            $to_date = $this->formatDate($date_array[1]);
                            $to_date = date('Y-m-d H:i:s', strtotime($to_date.' 00:00:00'));
                            $collection->whereBetween($key, [$from_date, $to_date]);
                    }
                    elseif($condition == 'like')
                    {
                        $collection->where($key, 'like', '%' . $value . '%');
                    }
                    else
                        $collection->where($key, trim($value));
                }
            }
        }
            
        return $collection;
    }

    function formatDate($date)
    {
        return implode("-", explode("/", $date));
    }

    public function clear_cache()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        return true;
    }

}