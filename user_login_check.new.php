<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-05
 * Time: 11:04:58
 */
error_reporting(E_ALL & ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");

$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);

if(strlen($email) < 1) die("邮箱地址不能为空");
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) die("邮箱地址错误");
if(mb_strlen($password) < 6) die("密码不能短于6个字符");
if(mb_strlen($password) > 12) die("密码不能长于12个字符");

try{
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM `user` WHERE `email`=? LIMIT 1";

	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([$email]);
	$user = $sth->fetch(PDO::FETCH_ASSOC);

	if(!password_verify($password, $user['password'])){
		die($user . "错误的邮箱或者密码");
//		die($user['password']);
	}

	session_start();
	$_SESSION['email'] = $eamil;
	$_SESSION['uid'] = $user['id'];

	die("用户登录成功<script>location='resume_list.new.php'</script>");
}
catch (PDOException $Exception){
	if($Exception->getCode() == 23000){
		die("邮箱地址已被注册");
	}else{
		die($Exception->getMessage());
	}
}
catch (Exception $Exception){
	die($Exception->getMessage());
}