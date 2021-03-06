<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-05
 * Time: 11:04:58
 */
error_reporting(E_ALL & ~E_NOTICE);
header("Content-type:text/html; charset=utf-8");

session_start();
if(intval($_SESSION['uid']) < 1){
	header("Location:user_login.php");
	die("请先<a href='user_login.php'>登录</a>");
}

$id = intval($_REQUEST['id']);
$title = trim($_REQUEST['title']);
$content = trim($_REQUEST['content']);
print_r($title);

if(strlen($id) < 1) die("简历ID不能为空");
if(strlen($title) < 1) die("简历名称不能为空");
if(mb_strlen($content) < 10) die("密码不能少于10个字符");

try{
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE `resume` SET `title`=?, `content`=? WHERE `id`=? AND `uid`=? LIMIT 1";
	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([$title, $content, $id, intval($_SESSION['uid'])]);

	die("简历更新成功<script>location='resume_list.php'</script>");
}
catch (PDOException $Exception){
	$errorInfo = $sth->errorInfo();
	if($errorInfo[1] == 1062){
		die("邮箱地址已被注册");
	}else{
		die($Exception->getMessage());
	}
}
catch (Exception $Exception){
	die($Exception->getMessage());
}