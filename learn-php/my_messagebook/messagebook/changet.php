<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>留言信息界面</title>
		<link rel="stylesheet" href="../css/a.css" />
		<link rel="stylesheet" href="../css/write.css" />
		<script type="text/javascript" src="js/change.js" ></script>
	</head>
	<body>
		<?php
			require_once("../conn.php");
			session_start();
			$id=$_GET['id'];
			
		?>
		<div class="wrap">
			<div class="header">
				<h3>欢迎你的到来----<?php echo $_SESSION['username'];?></h3>
			    <ul id="choose_link">
					<li class="nav"><a href="message.php">编写留言记录</a></li>
					<li class="nav"><a href="c.php">个人留言记录</a></li>
					<li class="nav"><a href="b.php">全体留言记录</a></li>
					<li class="nav"><a href="">修改留言记录</a></li>
					<li class="nav"><a href="">删除留言记录</a></li>
					<li class="nav"><a href="../login_and_reg/logout.php">退出登陆</a></li>
			    </ul>
			</div>
			
			<div class="content" id="content">
				<div class="write content-item current">
					<form id="form3" id="form3" method="post" action="cg.php">
						<h3 class="h3"><?php echo $_SESSION['username'];?>,请输入你要修改的信息</h3>
						<br /><br />
						<p class="p">
							<span style="letter-spacing: 3px;">请输入修改内容:&nbsp;&nbsp;</span><textarea name="content" class="text"></textarea>
						<br /><br />
						</p>
						<input type="submit" name="submit" class="title sub-item" value="提交" />
						<input type="hidden" name="id" value="<?php echo $id;?>" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
