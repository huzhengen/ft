<?php
session_start();
if(intval($_SESSION['uid']) < 1){
	header("Location:user_login.php");
	die("请先<a href='user_login.php'>登录</a>");
}

$is_login = true;

try {
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT `id`,`uid`,`title`,`created_at` FROM `resume` WHERE `uid` = ? AND `is_deleted` = 0";

	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([intval($_SESSION['uid'])]);
	$resume_list = $sth->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $Exception){
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
	<title>我的简历</title>
</head>
<body>
<div class="container">
	<?php include "header.new.php" ?>
	<h1>我的简历</h1>
	<?php if($resume_list): ?>
		<ul class="list-group">
			<a href="resume_add.new.php" class="list-group-item list-group-item-action active">添加简历</a>
			<?php foreach ($resume_list as $item): ?>
				<li class="list-group-item" id="rlist-<?=$item['id']?>">
					<a href="resume_detail.new.php?id=<?=$item['id']?>"><?=$item['title']?></a>
					<a href="resume_detail.new.php?id=<?=$item['id']?>"><img src="image/open_in_new.png" alt="查看"></a>
					<a href="resume_modify.new.php?id=<?=$item['id']?>"><img src="image/mode_edit.png" alt="编辑"></a>
					<a href="javascript:confirm_delete('<?=$item['id']?>');void(0);"><img src="image/close.png" alt="删除"></a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/main.js"></script>
</body>
</html>