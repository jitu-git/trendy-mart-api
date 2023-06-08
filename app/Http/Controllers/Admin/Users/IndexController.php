<?php
/**
 * Created by PhpStorm.
 * User: jitendrameena
 * Date: 14/05/20
 * Time: 6:14 PM
 */

namespace App\Http\Controllers\Admin\Users;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
        $this->_data["breadcrumb"] = [
            "Users" => "Javascript:void(0)",
        ];

        $modules = [
            ['title' => "Roles",    'icon' => icon("roles"),  'link' => ("admin.users.roles.index")],
            ['title' => "Users",    'icon' => icon("users"), 'link' => ("admin.users.users.index")],
        ];
        $this->_data["modules"] = $modules;
        return view("admin.index", $this->_data);
    }
}
