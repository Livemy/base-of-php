<?php
	
	#连接数据库
	require_once("../conn.php");
	
	#除了登陆之外，我们还应该添加会话控制
	session_start();
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from user_information where username='$username' and password='$password'";
	
	$info=mysqli_query($conn, $sql);
	
	$row=mysqli_fetch_row($info);
	
	if($row){
		echo "<script>alert('登陆成功,$username!!!');</script>";
	}else{
		echo 'Error:'.mysqli_error($conn);
		echo "<script>alert('登陆失败,没有该用户!!!');location.href='../index.html';</script>";
	}
?>

<?php
	
	#登陆成功后的跳转页面	
	$url="../messagebook/message.php";
	echo "<script>window.location.href='$url';</script>";
?>