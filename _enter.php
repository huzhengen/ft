<?php
error_reporting(E_ALL & ~E_NOTICE);

// if(!define("DS")) define("DS", DIRECTORY_SEPARATOR);
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", __DIR__);
define("FROOT", ROOT . DS . "framework");
define("VIEW", FROOT . DS . "view");

include "vendor/autoload.php";

$GLOBALS['m'] = $m = v('m') ? v('m') : 'resume';
$class = ucfirst(strtolower($m));
$GLOBALS['a'] = $a = v('a') ? v('a') : 'index';

// echo "$m > $a";

// $app = new $m();
// $app->$a();

try{
    $controller = "FangFrame\\Controller\\".$class;
    call_user_func([new $controller(), $a]);

    // throw new Exception("error");

}catch(\Exception $e){
    die($e->getMessage());
}