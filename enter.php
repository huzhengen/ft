<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-07
 * Time: 15:25:06
 */
include "vendor/autoload.php";

$m = v('m') ? v('m') : 'resume';
$m = ucfirst(strtolower($m));
$a = v('a') ? v('a') : 'index';


try{
	$controller = "FranFrame\\Contorller\\".$m;
	call_user_func([new $m(), a]);
//	throw new Exception("error");
}catch(\Exception $e){
	die($e->getMessage());
}
