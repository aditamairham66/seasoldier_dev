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

if (!function_exists('webPath'))
{
    /**
     * @param string $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function webPath($path = '')
    {
        return App\Helpers\Router::webPath($path);
    }
}

if (!function_exists('showMessage'))
{
    /**
     * @return string
     */
    function showMessage()
    {
        return App\Helpers\Router::showMessage();
    }
}

if (!function_exists('showMessageFooter'))
{
    /**
     * @return string
     */
    function showMessageFooter()
    {
        return App\Helpers\Router::showMessageFooter();
    }
}
