<?php
	
	if(isset($_REQUEST['code'])){
		session_start();
		if(strtolower($_REQUEST['code'])==$_SESSION['code']){
			header('Content-type:text/html;charset=UTF8');
			echo "<font color='#0000cc'>输入正确</font>";
		}else{ 
			header('Content-type:text/html;charset=UTF8');
			echo "<font color='#cc0000'><b>输入错误</b></font>";
		}
		exit();
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>验证码确认</title>
</head>
<body>
	<form method="post" action="form.php">
		<p>
			验证码图片：
			<img src="img.php" alt="验证码，看不清楚，换一张"
				 onclick="this.src=this.src+'?'+new Date().getTime();"/>;
		</p>
		<p>
			请输入图片的内容：
			<input type="text" value="" name="code" />
			<input type="submit" value="提交" style="padding: 6px 20px;" />
		</p>
	</form>
</body>