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

$title = trim($_REQUEST['title']);
$content = trim($_REQUEST['content']);

if(strlen($title) < 1) die("简历名称不能为空");
if(mb_strlen($content) < 10) die("简历内容不能少于10个字符");

try{
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO `resume` (`title`, `content`, `uid`, `created_at`) VALUES (?,?,?,?)";

	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([$title, $content, intval($_SESSION['uid']), date("Y-m-d H:i:s")]);

	die("简历保存成功<script>location='resume_list.new.php'</script>");
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