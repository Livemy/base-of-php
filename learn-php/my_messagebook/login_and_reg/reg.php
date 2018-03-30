<?php
	
	require_once("../conn.php");
	
	#启动会话控制
	session_start();
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from user_information where username='$username' and password='$password'";
	$info=mysqli_query($conn, $sql);
	#mysqli_num_rows($info)返回的是结果集中的数据数
	$rows=mysqli_num_rows($info);
	
	if(empty($username)){
		echo "<script>alert('对不起，用户名不能为空!);</script>";
	}else if(empty($password)){
		echo "<script>alert('对不起，用户密码不能为空');</script>";
	}else{
		if($rows){
			echo '对不起，该用户名已经存在，请你重新输入!!!';
			echo "<script>window.location.href='reg.html';</script>";
		}else{
			$sql="insert into user_information(username,password) values ('$username','$password');";
			$info=mysqli_query($conn, $sql);
			if($info){
				echo "<script>alert('恭喜你--$username,注册成功!!!')</script>";
			}else{
				echo "<script>alert('很抱歉，注册失败');</script>";
			}
		}
	}
	
?>

<?php
	
	$url="../messagebook/message.php";
	echo "<script>window.location.href='$url';</script>";	
?>