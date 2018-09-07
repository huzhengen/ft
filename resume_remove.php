<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-06
 * Time: 16:02:47
 */
session_start();
if(intval($_SESSION['uid']) < 1){
	header("Location:user_login.php");
	die("请先<a href='user_login.php'>登录</a>");
}

$id = intval($_REQUEST['id']);
if($id < 1) die("错误的简历ID");

try{
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE `resume` SET `is_deleted` = 1, `title` = CONCAT(`title`, ?) WHERE `id`=? AND `uid`=? LIMIT 1";
	$sth = $dbh->prepare($sql);
	$ret = $sth->execute(['_DEL_'.time(), $id, intval($_SESSION['uid'])]);

//	die("简历删除成功<script>location.reload();</script>");
	die("done");
}

catch (Exception $Exception){
	die($Exception->getMessage());
}