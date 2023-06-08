<?php
/**
 * Created by PhpStorm.
 * User: jitendrameena
 * Date: 11/05/20
 * Time: 5:28 PM
 */


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

if(!function_exists('current_route')){
    /**
     * @method current_route
     * @desc return current route name
     * @return mixed
     */
    function current_route(){
        return  request()->route()->getName();
    }
}

if(!function_exists('get_user_info')){
    /**
     * @method get_user_info
     * @param string $column
     * @return mixed
     */
    function get_user_info($column = ''){
        $userData = Auth::user();
        if(!empty($userData)) {
            return  $column == '' ? $userData : $userData->{$column};
        } else {
            return false;
        }
    }
}

if(!function_exists('is_admin')) {
    function is_admin() {
        $logged_in_user_role = get_user_info('role_id');
        return $logged_in_user_role == 1;
    }
}

if(!function_exists('db_uuid')) {
    function db_uuid() {
        return (string) Str::orderedUuid();
    }
}


if(!function_exists("load_asset_admin")){

    function load_asset_admin($type, $page = "default") {
        return config("asset.admin.{$type}.{$page}");
    }
}



if(!function_exists("load_asset_web")){

    function load_asset_web($type, $page = "default") {
        return config("asset.website.{$type}.{$page}");
    }
}



if(!function_exists("load_view")){
    /**
     * @method load_view
     * @desc find view name according to the current route
     * @param string $view_name
     * @return string
     */
    function load_view($view_name = '') {
        return $view_name != '' ? $view_name :  current_route();
    }
}


if(!function_exists("searching_string")){


    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param $request_data
     */
    function searching_string( $query, $request_data) {
        if($request_data){
            if(!is_array($request_data))
                $request_data = json_decode($request_data);

            foreach($request_data as $filed => $value){
                if($filed == "like") {
                    if($value){
                        foreach ($value as $col => $val) {
                            if ($val != '') {
                                $query->where(function ($query) use ($col, $val) {
                                    $query->where($col, "LIKE", "%$val%");
                                    $other_q = explode(" ", $val);
                                    if (count($other_q) > 1) {
                                        foreach ($other_q as $o_q) {
                                            $query = $query->orWhere($col, "LIKE", "%$o_q%");
                                        }
                                    }
                                });
                            }
                        }
                    }
                }
                if($filed == "equal"){
                    if ($value) {
                        foreach ($value as $col => $val) {
                            if ($val != '') {
                                if ($col == 'created_at') {
                                    $query = $query->where(function ($query) use ($col, $val) {
                                        $query->where(DB::raw("DATE(created_at)"), "=", $val);
                                    });
                                } else {
                                    $query = $query->where(function ($query) use ($col, $val) {
                                        if (is_array($val)) {
                                            $val = array_filter($val, function ($item) {
                                                return $item != null || $item != '';
                                            });
                                            if ($val) {
                                                $query->whereIn($col, $val);
                                            }

                                        } else {
                                            $query->where($col, "=", $val);
                                        }
                                    });
                                }
                            }
                        }
                    }
                }

                if($filed == "between") {
                    if($value){
                        foreach ($value as $col => $val) {
                            #dd($val); die;
                            if ($val) {
                                $from = trim($val->from);
                                $to = trim($val->to);
                                if ($from != '' && $to == '') {
                                    $query->where($col, ">=", $from);
                                }
                                if ($from == '' && $to != '') {
                                    $query->where($col, "<=", $from);
                                }
                                if ($from != '' && $to != '') {
                                    $query->where(function ($query) use ($col, $from, $to) {
                                        $query->whereBetween($col, [$from, $to]);
                                        /* $query->where($col, '>=', $from);
                                         $query->where($col, '<=', $to);*/
                                    });

                                }
                            }
                        }
                    }
                }


            }
        }
    }
}


if( !function_exists('getSortType')) {
    /**
     * @param \Illuminate\Http\Request  $request
     * @param $cols
     * @param null $default
     * @return null|string
     */
    function getSortType($request, $cols, $default = null){
        if($request->has('sort')){
            if($request->get('sort') == $cols){
                return $request->get('type') == "asc" ? "desc" : "asc";
            } else {
                return $default !== null ? $default : 'asc';
            }
        } else {
            return $default !== null ? $default : 'asc';
        }
    }
}


if( ! function_exists('db_sort')){
    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @param \Illuminate\Http\Request  $request
     * @param string $default
     * @return mixed
     */
    function db_sort($query, $request, $default = '') {
        if($request->has('sort')){
            $query->orderBy($request->get('sort'), strtoupper($request->get('type')));
        } else {
            $query->orderBy($default != "" ?  $default : "id", "DESC");
        }
        return $query;
    }
}




if(!function_exists("create_default_routes")) {
    /**
     * @method create_default_routes
     * @desc create default CRUD routes for any module
     * @param array $routes
     */
    function create_default_routes(array $routes) {
        foreach ($routes as $route => $controller ){
            Route::Resource($route, $controller);
            Route::post("{$route}/bulk-action", "$controller@actions")->name("{$route}.actions");
        }
    }
}

if(!function_exists("upload_file")){
    function upload_file($field_name, $path = "image"){
        if (request()->hasFile($field_name)) {
            $files = request()->file($field_name);
            return _upload($files, $path);
        } else {
            return false;
        }
    }
}

if(!function_exists("_upload")){
    function _upload($file, $path){
        $image_original_name = $file->getClientOriginalName();
        return $file->storeAs(
            $path, time()."-".$image_original_name,'public'
        );
    }

}


if(!function_exists("get_menus")){

    /**
     * get the all menus
     *
     * @param string $type
     * @return \Illuminate\Config\Repository|mixed
     */
    function get_menus($type = "admin") {
        return config("menu.admin");
    }
}


if(!function_exists("is_permit")){

    /**
     * check the permission of route
     *
     * @param string|array $route
     * @return bool
     */
    function is_permit($route = '*') {
        // for super admin
        if(get_user_info("role_id") == 1){
            return true;
        }
        return true;
        // $permissions = \App\Model\UserPermission::getUserPermissions();
        // if(is_array($route)){
        //     return !empty(array_intersect($route, $permissions));
        // } else {
        //     return in_array($route, $permissions);
        // }
    }
}


if(!function_exists("edit_link")){
    function edit_link($route, $id) {
        if(is_permit($route)){
            return '<a class="btn btn-primary btn-icon" data-toggle="kt-tooltip" title="Edit" href="'. route($route, [$id]).'"><i class="fa fa-edit"></i></a>';
        }
    }
}

if(!function_exists("add_link")){
    function add_link($route, $params = []) {
        if(is_permit($route)){
            return '<a class="btn btn-brand btn-icon-sm" data-toggle="kt-tooltip" title="Add" href="'. route($route, $params).'"><i class="flaticon2-plus"></i> Add New</a>';
        }
    }
}

if(!function_exists("icon")){
    /**
     * get the icons from the icon config file
     *
     * @param null $icon
     * @return array|string
     */
    function icon($icon = null){
        if($icon !== null){
            return config("icon.{$icon}");
        }
        return config("icon");
    }
}


if(!function_exists("get_ip")){
    function get_ip() {
        if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
            return $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else{
            return $_SERVER['REMOTE_ADDR'];
        }
    }
}

if( !function_exists("date_modified")){
    function date_modified($modify, $format = "Y-m-d H:i:s") {
        $date = new DateTime;
        $date->modify($modify);
        return $date->format($format);
    }

}
