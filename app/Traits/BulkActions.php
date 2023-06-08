<?php
/**
 * Created by PhpStorm.
 * User: jitendrameena
 * Date: 14/05/20
 * Time: 2:10 PM
 */

namespace App\Traits;


use Illuminate\Http\Request;

trait BulkActions
{
    /**
     * @method actions
     * @desc apply mass actions on records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function actions(Request $request) {
        $ids = $request->get('bulk_ids');
        $response = $this->model::mass_action($request->get('action'), $ids);
        if($response['status'] == true){
            $request->session()->flash('success', $response['message']);
        } else {
            $request->session()->flash('error', $response['message']);
        }
        return redirect()->back();
    }


    public function index(Request $request) {
        /**
         * send all params to view
         */
        $this->_data['params'] = $request->all();
        $this->_data['limit'] = $this->limit = $request->get('perpage') ? $request->get('perpage') : $this->limit;
        $this->_data['search'] = $request;
        $this->listing($request);
        return view(load_view(), $this->_data);
    }
}