<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Traits\DefaultRoutes;
use App\Traits\BulkActions;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, DefaultRoutes, BulkActions;

    public $limit = 10;

    protected $_data = array();

    public $controller, $title, $model;

    public $success_response, $error_response, $update_response, $add_message, $record_activated, $record_deactivated, $record_deleted;

    public function __construct() {

        $this->_data['controller'] = &$this->controller;
        $this->_data['limits'] =  [10 => 10, 20 => 20, 50 => 50, 100 => 100, 500 => 500];
        $this->_data['title'] = &$this->title;
        $this->_data['current_url'] = url()->current();
        $this->_data['menus'] = get_menus();

        $this->success_response     = __('common.success');
        $this->error_response       = __('common.oops');
        $this->update_response      = __('common.update');
        $this->add_message          = __('common.success');
        $this->record_activated     = __('common.record_activated');
        $this->record_deactivated   = __('common.record_deactivated');
        $this->record_deleted       = __('common.record_deleted');

        $this->defineControllerRoutes();


        $this->_data['routes'] = $this->routes;
    }
}
