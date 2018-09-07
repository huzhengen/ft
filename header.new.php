<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/index.new.php">首页</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		<?php
			function active_class($link){
//				$this_file_name = basename(__FILE__);
				if($link == ltrim($_SERVER['SCRIPT_NAME'], '/')){
					return "active";
				}
			}
		?>
		<?php if($is_login): ?>
			<ul class="navbar-nav">
				<li class="nav-item <?=active_class('resume_list.new.php')?>">
					<a class="nav-link" href="resume_list.new.php">我的简历</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user_logout.php">退出</a>
				</li>
			</ul>
		<?php else: ?>
			<ul class="navbar-nav">
				<li class="nav-item <?=active_class('user_reg.new.php')?>">
					<a class="nav-link" href="user_reg.new.php">注册</a>
				</li>
				<li class="nav-item" <?=active_class('user_login.new.php')?>">
					<a class="nav-link" href="user_login.new.php">登录</a>
				</li>
			</ul>
		<?php endif; ?>
	</div>
</nav>