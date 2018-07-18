<?php

class Router
{
    static function start()
    {
        $controller = 'Main';
        $model = 'Main';
        $action = 'index';
        $controller_path = APP.'/controllers/';
        $model_path = APP.'/models/';

        //$routes = explode('/', $_GET['url']);
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // var_dump($routes);

        if (!empty($routes[2])) {
//            $controller = ucwords($routes[4]).'Controller';
            $controller = ucwords($routes[2]);
        }
        if(!empty($routes[3])){
            $action = $routes[3];
        }

        $controller_name = $controller_path.$controller.'Controller.php';
        $model_name = $model_path.$controller.'.php';
        $action_name = $action;

        if(file_exists($controller_name))
        {
            require $controller_name;
            $controller = $controller.'Controller';

        }else{
           Router::errorPage();
        }

        $controllers = new $controller;

        if(file_exists($model_name))
        {
            require_once $model_name;

        }else{
            Router::errorPage();
        }

        if(method_exists($controller, $action)){
            $controllers->$action();
        }else{
            Router::errorPage();
        }
    }
    
    function errorPage()
    {
        Router::redirect('404.php');
    }
    
    function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SESSION['HTTP_REFERER']) ? $_SESSION['HTTP_REFERER'] : ' ';
    }
    header("Location: $redirect");
    exit;
}

}
