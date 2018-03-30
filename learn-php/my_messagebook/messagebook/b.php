<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="../css/a.css" />
		<link rel="stylesheet" href="../css/write.css" />
		<?php
			include_once("../conn.php");	
		?>
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
					<li class="nav"><a href="c.php">删除留言记录</a></li>
					<li class="nav"><a href="../login_and_reg/logout.php">退出登陆</a></li>
			    </ul>
			</div>
			<div class="content" id="content">
			   <div class="all_message">
			   		<table width="500" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef">
			   			<?php
			   				$sql="select * from message order by id desc";
							$info=mysqli_query($conn, $sql);
							while($row=mysqli_fetch_array($info)){	
			   			?>
			   			<tr bgcolor="#eff3ff">
			   				<td>
			   					<font color="red">标题：</font><?php echo $row['title']; ?><br />
			   					<font color="red">用户：</font><?php echo $row['username']; ?>
			   					<div align="right"><a href="del.php?id=<?php echo $row['id']; ?>">删除</a></div>
			   				</td>
			   			</tr>
			   			<tr bgcolor="#ffffff">
			   				<td>发表内容：<?php echo $row['content'];?></td>
			   			</tr>
			   			<tr bgcolor="#ffffff">
			   				<td><div align="right">时间：<?php echo $row['lastdate'];?></div></td>
			   			</tr>
			   			<?php
							}	
			   			?>
			   			<tr bgcolor="#f0fff0">
			   				<td>
			   					<div align="center"><a href="message.php"></a></div>
			   				</td>
			   			</tr>
			   		</table>
			   </div>
			</div>
	</body>
</html>
