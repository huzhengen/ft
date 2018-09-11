<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$is_login = intval($_SESSION['uid']) < 1 ? false : true;
if(intval($_SESSION['uid']) < 1){
	header("Location:user_login.php");
	die("请先<a href='user_login.php'>登录</a>");
}

try {
	$dbh = new PDO("mysql:host=localhost;dbname=fangtangdb", "root", "root");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT `id`,`uid`,`title`,`created_at` FROM `resume` WHERE `is_deleted` = 0";

	$sth = $dbh->prepare($sql);
	$ret = $sth->execute([intval($_SESSION['uid'])]);
	$resume_list = $sth->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $Exception){
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
	<title>最新简历</title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<h1>最新简历</h1>
	<?php if($resume_list): ?>
		<ul class="resume_list">
			<?php foreach ($resume_list as $item): ?>
				<li id="rlist-<?=$item['id']?>">
					<a href="resume_detail.php?id=<?=$item['id']?>" class="title middle"><?=$item['title']?></a>
					<a href="resume_detail.php?id=<?=$item['id']?>"><img src="image/open_in_new.png" alt="查看"></a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<p><a href="resume_add.php" class="resume_add"><img src="image/add.png" alt=""> 添加简历</a></p>
</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>