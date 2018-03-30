			    </div>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>留言信息界面</title>
		<link rel="stylesheet" href="../css/a.css" />
		<link rel="stylesheet" href="../css/write.css" />
		<!--<script type="text/javascript" src="js/change.js" ></script>-->
	</head>
	<body>
		<?php
			session_start();
		?>
		<div class="wrap">
			<div class="header">
				<h3>欢迎你的到来----<?php echo $_SESSION['username'];?></h3>
			    <ul id="choose_link">
					<li class="nav"><a href="message.php">编写留言记录</a></li>
					<li class="nav"><a href="c.php">个人留言记录</a></li>
					<li class="nav"><a href="b.php">全体留言记录</a></li>
					<li class="nav"><a href="change.php">修改留言记录</a></li>
					<li class="nav"><a href="">删除留言记录</a></li>
					<li class="nav"><a href="../login_and_reg/logout.php">退出登陆</a></li>
			    </ul>
			</div>
			
			<div class="content" id="content">
				<div class="write content-item current">
					<form id="form3" id="form3" method="post" action="add.php">
						<h3 class="h3"><?php echo $_SESSION['username'];?>,请输入你要留言的信息</h3>
						<br /><br />
						<p class="p">
							<span style="letter-spacing: 1px;">请输入留言的标题:&nbsp;&nbsp;</span><input type="text" name="title" class="titlea" />
						    <br /><br />
						</p>
						<p class="p">
							<span style="letter-spacing: 3px;">请输入留言内容:&nbsp;&nbsp;</span><textarea name="content" class="text"></textarea>
						<br /><br />
						</p>
						<input type="submit" name="submit" class="title sub-item" value="提交" />
						<input type="reset" class="title sub-item" value="重置" />
					</form>
				</div>
			    <!--<div class="my_message  content-item">
			    	<p>个人留言记录</p>
			    </div>
			    <div class="all_message  content-item">
			    	<p>全体留言记录</p>
			    </div>
			    <div class="change_message  content-item">
			    	<p>修改留言记录</p>
			    </div>
			    <div class="remove_message  content-item">
			    	<p>删除留言记录</p>
			    </div>-->
			</div>
		</div>
	</body>
</html>
