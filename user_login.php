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
	<title>用户登录</title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<h1>用户登录</h1>
	<form action="user_login_check.new.php" method="post" id="form_login" onsubmit="send_form('form_login');return false">
		<div id="form_login_notice" class="form-info middle"></div>
		<p><input class="middle" type="text" name="email" placeholder="邮箱"></p>
		<p><input class="middle" type="password" name="password" placeholder="密码（6~12个字符）"></p>
		<p><input class="middle-button" type="submit" value="登录"><a href="user_reg.php" class="login middle-button">注册</a></p>
	</form>
</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>