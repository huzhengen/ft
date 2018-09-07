<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-06
 * Time: 16:02:47
 */
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
}
catch (Exception $Exception){
	die($Exception->getMessage());
}
include 'lib/Parsedown.php';
$md = new Parsedown();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$resume['title']?></title>
	<link rel="stylesheet" href="/main.css">
</head>
<body>
<div class="container">
	<?php include "header.php" ?>
	<div class="content">
		<?=$md->text($resume['content'])?>
	</div>

</div>
<script src="https://lib.sinaapp.com/js/jquery/3.1.0/jquery-3.1.0.min.js"></script>
<script src="/main.js"></script>
</body>
</html>
