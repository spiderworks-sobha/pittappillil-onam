<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class BaseController extends Controller {

    protected $route, $views;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->route = $this->views = 'admin';
    }

}