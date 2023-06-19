<?php

use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: jitendrameena
 * Date: 11/05/20
 * Time: 5:28 PM
 */

function get_user_browser()
{
    if(isset($_SERVER['HTTP_USER_AGENT'])){
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6') !== FALSE)
            return 'Internet explorer 6';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7') !== FALSE)
            return 'Internet explorer 7';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8') !== FALSE)
            return 'Internet explorer 8';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9') !== FALSE)
            return 'Internet explorer 9';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10') !== FALSE)
            return 'Internet explorer 10';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
            return 'Internet explorer';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
            return 'Mozilla Firefox';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
            return 'Google Chrome';
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
            return "Opera Mini";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
            return "Opera";
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
            return "Safari";
        else
            return 'App';
    } else {
        return 'Symphony';
    }
}

if(!function_exists("_log")) {
    /**
     * @method _log
     * @param \App\Model\AppModel $model
     * @param $type
     * @param $message
     */
    function _log($model, $type, $message = null ) {

        if($model->checkSkip() === true)
            return;

        $class = new \App\Model\ActivityLog();
        list($old_data, $new_data, $msg) = $model->requestData($model, $type);
        // print_r(get_user_browser()); die;
        $class->model = get_class($model);
        $class->model_id = $model->id;
        $class->old_data = json_encode($old_data);
        $class->new_data = json_encode($new_data);
        $class->message = isset($msg) ? $msg : $message;
        $class->type = $type;
        $class->action_by = _user_id_();
        $class->ip = get_ip();
        $class->browser = get_user_browser();
        $class->log_parent = isset($model->foreign_key) ? (isset($model->{$model->foreign_key}) ? $model->{$model->foreign_key} : $model::${$model->foreign_key} ) : null;
        $class->platform = "Web";
        $class->device_info =  null;
        $class->brand = null;
        $class->save();
    }
}


if(!function_exists('_user_id_')) {
    function _user_id_(){
        if(Auth::check()) {
            return get_user_info('id');
        } else {
            return \App\User::$auth_id;
        }
    }
}


if(!function_exists("page_list" )){

    /**
     * @return mixed
     */
    function page_list() {
        return \App\Model\Page::PageList();
    }
}

if(!function_exists("menu_parent_list" )){

    /**
     * @return mixed
     */
    function menu_parent_list() {
        return \App\Models\Category::CategoryList();
    }
}

if(!function_exists("role_list" )){

    /**
     * @return mixed
     */
    function role_list() {
        return \App\Model\Role::RoleList();
    }
}



if(!function_exists("is_route_for_permission")){

    function is_route_for_permission($route) {
        $count =  \App\Model\Permission::where("scope", "LIKE", "%$route%")->count();
        return $count > 0;
    }
}



if(!function_exists("create_list")){

    /**
     * @param $data
     * @return array|string
     * @throws Throwable
     */
    function create_list($data) {
        return view("admin.website.menus.menu-list", compact("data"))->render();
    }
}



if(!function_exists("color_list" )){

    /**
     * @return mixed
     */
    function color_list() {
        return \App\Models\Color::getColorList();
    }
}

if(!function_exists("size_list" )){

    /**
     * @return mixed
     */
    function size_list() {
        return \App\Models\Size::getSizeList();
    }
}