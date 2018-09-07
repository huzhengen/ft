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

$is_login = true;

try{
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM `resume` WHERE `id`=? LIMIT 1";

	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([$id]);
	$resume = $sth->fetch(PDO::FETCH_ASSOC);

	if($resume['uid'] != $_SESSION['uid']) die("只能修改自己的简历");
}
catch (Exception $Exception){
	die($Exception->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>修改简历</title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<h1>修改简历</h1>
	<form action="resume_update.php" method="post" id="form_resume" onsubmit="send_form('form_resume');return false">
		<input type="hidden" name="id" value="<?=$resume['id']?>">
		<div id="form_resume_notice" class="form-info full"></div>
		<p><input class="full" type="text" name="title" placeholder="简历名称" value="<?=$resume['title']?>"></p>
		<p><textarea name="content" class="full" placeholder="写入简历内容，支持Markdown语法"><?=htmlspecialchars($resume['content'])?></textarea></p>
		<p>
			<input class="middle-button" type="submit" value="更新简历">
			<input class="middle-button cancel_button" type="button" value="返回上页" onClick="history.back(1);void(0);">
		</p>
	</form>
</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>