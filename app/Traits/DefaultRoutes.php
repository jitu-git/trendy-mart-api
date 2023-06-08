<?php
/**
 * Created by PhpStorm.
 * User: jitendrameena
 * Date: 15/05/20
 * Time: 4:45 PM
 */

namespace App\Traits;


trait DefaultRoutes
{
    protected $routes = [];

    protected $route_base;

    private $default_routes  = array("index", "create", "store", "actions", "show", "edit", "update", "delete");



    public function defineControllerRoutes() {
        if(count($this->routes) <= 0){
            foreach ($this->default_routes as $default_route){
                $this->routes[$default_route] = "{$this->route_base}.{$default_route}";
            }
        }
    }


    public function addRoutes($routes) {
        if(is_array($routes)){
            $this->default_routes = array_merge($this->default_routes, $routes);
        } else {
            $this->default_routes[$routes] = $routes;
        }
    }
}
