<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request)
    {

        if (!Auth::check()){
            return view('admin.login');
        }

        $modules = [
            //['title' => "Requests",   'icon' => icon("quotes"),  'link' => '#', "count" => 0],
        ];
        $this->_data["modules"] = $modules;

        return view('admin.dashboard', $this->_data);
    }
}
