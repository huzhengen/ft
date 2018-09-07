<?php
	session_start();
	if(intval($_SESSION['uid']) < 1){
		header("Location:user_login.php");
		die("请先<a href='user_login.php'>登录</a>");
	}

	$is_login = true;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>添加简历</title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<h1>添加简历</h1>
	<form action="resume_save.new.php" method="post" id="form_resume" onsubmit="send_form('form_resume');return false">
		<div id="form_resume_notice" class="form-info full"></div>
		<p><input class="full" type="text" name="title" placeholder="简历名称"></p>
		<p><textarea name="content" class="full" placeholder="写入简历内容，支持Markdown语法"></textarea></p>
		<p>
			<input class="middle-button" type="submit" value="保存简历">
			<input class="middle-button cancel_button" type="button" value="返回上页" onClick="history.back(1);void(0);">
		</p>
	</form>
</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>