<?php namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Route;

class Router
{
    /*
   | --------------------------------------------------------------------------------------------------------------
   | Alternate route for Laravel Route::controller
   | --------------------------------------------------------------------------------------------------------------
   | $prefix       = path of route
   | $controller   = controller name
   | $namespace    = namespace of controller (optional)
   |
   */
    public static function routeController($prefix, $controller, $namespace = null)
    {

        $prefix = trim($prefix, '/').'/';

        $namespace = ($namespace) ?: 'App\Http\Controllers';

        try {
            Route::post($prefix, ['uses' => $controller.'@postIndex', 'as' => $controller.'PostIndex']);

            Route::get($prefix, ['uses' => $controller.'@getIndex', 'as' => $controller.'GetIndex']);

            $controller_class = new \ReflectionClass($namespace.'\\'.$controller);
            $controller_methods = $controller_class->getMethods(\ReflectionMethod::IS_PUBLIC);
            $wildcards = '/{one?}/{two?}/{three?}/{four?}/{five?}';
            foreach ($controller_methods as $method) {

                if ($method->class != 'Illuminate\Routing\Controller' && $method->name != 'getIndex') {
                    if (substr($method->name, 0, 3) == 'get') {
                        $method_name = substr($method->name, 3);
                        $slug = array_filter(preg_split('/(?=[A-Z])/', $method_name));
                        $slug = strtolower(implode('-', $slug));
                        $slug = ($slug == 'index') ? '' : $slug;
                        Route::get($prefix.$slug.$wildcards, ['uses' => $controller.'@'.$method->name, 'as' => $controller.'Get'.$method_name]);
                    } elseif (substr($method->name, 0, 4) == 'post') {
                        $method_name = substr($method->name, 4);
                        $slug = array_filter(preg_split('/(?=[A-Z])/', $method_name));
                        Route::post($prefix.strtolower(implode('-', $slug)).$wildcards, [
                            'uses' => $controller.'@'.$method->name,
                            'as' => $controller.'Post'.$method_name,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {

        }
    }

    /**
     * @param string $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public static function webPath($path = '')
    {
        return url($path);
    }

    /**
     * @param $msg
     * @param string $type
     */
    public static function redirectBack($msg, $type = 'info')
    {
        $resp = redirect()->back()->with(['msg' => $msg, 'msg_type' => $type]);
        Session::driver()->save();
        $resp->send();
        exit;
    }

    /**
     * @param $to
     * @param $msg
     * @param string $type
     */
    public static function redirectTo($to, $msg, $type = 'info')
    {
        $resp = redirect($to)->with(['msg' => $msg, 'msg_type' => $type]);
        Session::driver()->save();
        $resp->send();
        exit;
    }

    /**
     * @param $msg
     * @param string $type
     */
    public static function redirectBackFooter($msg, string $type = 'info')
    {
        $resp = redirect()->back()->with(['msg_footer' => $msg, 'msg_type_footer' => $type]);
        Session::driver()->save();
        $resp->send();
        exit;
    }

    /**
     * @return string
     */
    public static function showMessage()
    {
        $msg = Session::get('msg');
        $msg_type = Session::get('msg_type');
        if (!empty($msg)) {
            return '<div class="alert-text-'.$msg_type.'">
                    <i class="ri-information-line"></i> '.$msg.'
                </div>';
        }
    }

    /**
     * @return string
     */
    public static function showMessageFooter()
    {
        $msg = Session::get('msg_footer');
        $msg_type = Session::get('msg_type_footer');
        if (!empty($msg)) {
            return '<div class="alert-text-'.$msg_type.'">
                    <i class="ri-information-line"></i> '.$msg.'
                </div>';
        }
    }
}
