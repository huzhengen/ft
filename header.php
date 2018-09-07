<div class="headbox">
	<div class="logo"><a href="/">首页</a></div>
	<?php if($is_login): ?>
		<ul class="menu">
			<li><span class="menu_square"></span><a href="resume_list.php">我的简历</a></li>
			<li><span class="menu_square"></span><a href="user_logout.php">退出</a></li>
		</ul>
	<?php else: ?>
		<ul class="menu">
			<li><span class="menu_square"></span><a href="user_reg.php">注册</a></li>
			<li><span class="menu_square"></span><a href="user_login.php">登录</a></li>
		</ul>
	<?php endif; ?>
</div>