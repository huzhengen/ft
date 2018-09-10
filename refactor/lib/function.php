<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-07
 * Time: 15:14:46
 */
function active_class($link){
	if($link == ltrim($_SERVER['SCRIPT_NAME'], '/')){
		return "active";
	}
}

function c($key){
	return isset($GLOBALS['FFCONFIG'][$key]) ? $GLOBALS['FFCONFIG'][$key] : false;
}

function v($key){
	return isset($_REQUEST[$key]) ? $_REQUEST[$key] : false;
}