<?php
function debug($arr){
    echo '<pre>'. print_r($arr, true).'</pre>';
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

function __autoload($class_name){
    include $class_name . '.php';
}
