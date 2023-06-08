<?php

namespace App\Http\Controllers\Admin\Users;


use App\Extra\Forms\Admin\AdminUserForm;
use App\Extra\Forms\Admin\EditProfileForm;
use App\Http\Controllers\Controller;
use App\Mail\NewUserAccount;
use App\Model\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    protected $route_base = "admin.users.users";


    /**
     * UsersController constructor.
     */

    public function __construct() {

        $this->addRoutes("permissions");

        parent::__construct();

        /**
         * @desc set controller name
         */
        $this->controller = "Users";

        /**
         * @desc set page title
         */
        $this->title = "Users";

        $this->model = User::class;


        $this->_data["breadcrumb"] = [
            "User" => route("admin.users.index"),
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
        $query = User::query();

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
        $this->_data["form"] = new AdminUserForm;
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
        $request->validate(AdminUserForm::rules());
        $data = $request->all();
        $data["status"] = 1;
        $data["password"] = bcrypt($data["password"]);
        $store = User::create($data);
        if($store) {
            $store->permission()->create($store->role->toArray());
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
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user) {
        $this->_data["breadcrumb"]["Update"] =  "javascript:void(0)";
        $this->_data["data"] = $user;
        $this->_data["form"] = new AdminUserForm($user);
        return view(load_view(), $this->_data);
    }


    /**
     * update information
     *
     * @method update
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user) {
        $request->validate(AdminUserForm::rules($user->id));
        $data = $request->except("_token");
        if($data["password"]  == ""){
            unset($data["password"]);
        } else {
            $data["password"] = bcrypt($data["password"]);
        }
        $old_role = $user->role_id;
        $udpate = $user->update($data);
        if($udpate) {
            $new_role = $user->role_id;
            if($old_role != $new_role){
                $user->permission()->delete();
                $user->permission()->create($user->role->toArray());
            }
            $request->session()->flash('success', $this->update_response);
        } else {
            $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }



    public function permissions(Request $request, User $user) {
        $this->_data["breadcrumb"]["Permissions"] =  "javascript:void(0)";
        if($request->isMethod("put")){
            $request->validate(["permissions" => "required"]);
            $permissions["permissions"] = implode(",", $request->get("permissions"));
            $user->permission()->delete();
            if($user->permission()->create($permissions)){
                $request->session()->flash('success', "User permission has been successfully updated");
            } else {
                $request->session()->flash('error', $this->error_response);
            }
            return redirect()->route($this->routes["index"]);
        }

        $this->_data["data"] = $user;
        $this->_data["permissions"] = Permission::getPermissionList();
        return view(load_view(), $this->_data);
    }


    public function editProfile(Request $request){
        if($request->isMethod("put")){
            $request->validate([
                "name" => "required",
                "password" => "nullable|min:6|max:20"
            ]);
            $data = $request->except("_token", "email");
            if($data["password"]  == ""){
                unset($data["password"]);
            } else {
                $data["password"] = bcrypt($data["password"]);
            }
            $user = get_user_info();
            $udpate = $user->update($data);
            if($udpate) {
                $request->session()->flash('success', "Profile has been successfully updated.");
            } else {
                $request->session()->flash('error', $this->error_response);
            }
        }

        $this->_data["data"] = get_user_info();
        $this->_data["form"] = new EditProfileForm($this->_data["data"]);
        return view(load_view(), $this->_data);
    }
}
