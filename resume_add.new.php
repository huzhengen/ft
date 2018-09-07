<?php
session_start();
if(intval($_SESSION['uid']) < 1){
	header("Location:user_login.php");
	die("请先<a href='user_login.php'>登录</a>");
}

$is_login = true;
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
	<title>添加简历</title>
</head>
<body>
<div class="container">
	<?php include "header.new.php" ?>
	<h1>添加简历</h1>
	<form action="resume_save.new.php" method="post" id="form_resume" onsubmit="send_form('form_resume');return false">
		<div class="form-group">
			<label>简历标题</label>
			<input type="text" class="form-control" placeholder="标题" name="title">
			<div class="invalid-feedback" id="form_resume_notice"></div>
		</div>
		<div class="form-group">
			<label>简历详情</label>
			<textarea class="form-control" rows="13" name="content" placeholder="支持Markdown语法"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">添加简历</button>
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