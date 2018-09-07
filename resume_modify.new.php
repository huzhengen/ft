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
<html lang="zh-cn">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="app.css">
	<title>修改简历</title>
</head>
<body>
<div class="container">
	<?php include "header.new.php" ?>
	<h1>修改简历</h1>
	<form action="resume_update.new.php" method="post" id="form_resume" onsubmit="send_form('form_resume');return false">
		<input type="hidden" name="id" value="<?=$resume['id']?>">
		<div class="form-group">
			<label>简历标题</label>
			<input type="text" class="form-control" value="<?=$resume['title']?>" name="title">
		</div>
		<div class="form-group">
			<label>简历详情</label>
			<textarea class="form-control" rows="13" name="content"><?=htmlspecialchars($resume['content'])?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">更新简历</button>
		<button type="button" class="btn btn-primary" onClick="history.back(1);void(0);">返回上页</button>
	</form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/main.js"></script>
</body>
</html>