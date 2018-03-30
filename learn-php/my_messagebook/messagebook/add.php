<?php
	#向数据库写入数据
	
	session_start();
	
	include_once("../conn.php");
	$username=$_SESSION['username'];
	
	if($_POST["submit"]){
//		$sql="insert into message (username,title,content) values ('$username','$_POST['title']','$_POST['content']')";
		$sql="insert into message (username,title,content)".
			"values ('$username','$_POST[title]','$_POST[content]')";
		$info=mysqli_query($conn, $sql);
		if($info){
			echo "<script>alert('留言成功!!!');location.href='message.php';</script>";
		}else{
			echo "<script>alert('留言失败!!!');location.href='message.php';</script>";
		}
	}else{
		echo "提交错误";
	}
?>