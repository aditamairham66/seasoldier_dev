<?php

if (!function_exists('routeController'))
{
    /**
     * return route controller
     *
     * @param $prefix
     * @param $controller
     * @param null $namespace
     */
    function routeController($prefix, $controller, $namespace = null)
    {
        return App\Helpers\Router::routeController($prefix, $controller, $namespace);
    }
}
