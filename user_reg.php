<?php
$is_login = false;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>用户注册</title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<h1>用户注册</h1>
	<form action="user_save.php" method="post" id="form_reg" onsubmit="send_form('form_reg');return false">
		<div id="form_reg_notice" class="form-info middle"></div>
		<p><input class="middle" type="text" name="email" placeholder="邮箱"></p>
		<p><input class="middle" type="password" name="password" placeholder="密码（6~12个字符）"></p>
		<p><input class="middle" type="password" name="password2" placeholder="重复密码（6~12个字符）"></p>
		<p><input class="middle-button" type="submit" value="注册"><a href="user_login.php" class="login middle-button">登录</a></p>
	</form>
</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>