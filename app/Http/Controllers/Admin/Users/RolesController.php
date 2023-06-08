<?php

namespace App\Http\Controllers\Admin\Users;


use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RolesController extends Controller
{
    /**
     * @desc all routes for this controller
     * @var string
     */

    public $route_base = "admin.users.roles";


    /**
     * RolesController constructor.
     */

    public function __construct() {
        parent::__construct();

        /**
         * @desc set controller name
         */
        $this->controller = "Roles";

        /**
         * @desc set page title
         */
        $this->title = "Roles";

        $this->model = Role::class;


        $this->_data["breadcrumb"] = [
            "Users" => route("admin.users.index"),
            $this->controller => route($this->routes["index"]),
        ];

    }


    /**
     * @method listing
     * @desc prepare data to send react view
     * @param Request $request
     * @return array
     */
    public function listing(Request $request) {
        $filter_data = $request->all();
        $limit = isset($filter_data['limit']) ? $filter_data['limit'] : $this->limit;
        $query = Role::where("is_default", 0);

        // add filter in records
        searching_string($query, $request->form);

        // sort records
        db_sort($query, $request);
        $data = $query->paginate($limit);

        $this->_data['data'] = $data;

        return $this->_data;
    }


    /**
     * show create form
     *
     * @method create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $this->_data["breadcrumb"]["Create"] =  "javascript:void(0)";
        $this->_data["permissions"] = Permission::getPermissionList();
        return view(load_view(), $this->_data);
    }


    /**
     * store new records
     *
     * @method store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $request->validate(Role::$rules);
        $data = $request->all();
        $data["permissions"] = '';
        $data["type"] = "sub-admin";
        $data["status"] = 1;
        $store = Role::create($data);
        if($store) {
            $request->session()->flash('success', $this->success_response);
        } else {
            $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }


    /**
     * show edit form
     *
     * @method edit
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role) {
        $this->_data["breadcrumb"]["Update"] =  "javascript:void(0)";
       // $this->_data["permissions"] = Permission::getPermissionList();
        $this->_data["data"] = $role;
        return view(load_view(), $this->_data);
    }


    /**
     * update information
     *
     * @method update
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role) {
        $request->validate(Role::$rules);
        $data = $request->except("_token");
        $udpate = $role->update($data);
        if($udpate) {
            $request->session()->flash('success', $this->update_response);
        } else {
            $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }

    /**
     * @method actions
     * @desc apply mass actions on records
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function actions(Request $request) {
        $ids = $request->get('bulk_ids');

        if($request->get('action') == "delete"){
            $users = User::whereIn("role_id", $ids)->count();
            if($users > 0){
                $request->session()->flash('error', "Role have some users. Can't delete role.");
                return redirect()->back();
            }
        }
        $response = $this->model::mass_action($request->get('action'), $ids);
        if($response['status'] == true){
            $request->session()->flash('success', $response['message']);
        } else {
            $request->session()->flash('error', $response['message']);
        }
        return redirect()->back();
    }

}