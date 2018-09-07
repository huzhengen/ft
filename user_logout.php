<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-07
 * Time: 10:23:43
 */
session_start();
foreach ($_SESSION as $key => $value){
	unset($_SESSION[$key]);
}

header("Location: /");