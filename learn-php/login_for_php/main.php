<?php
	
	#首先，我们需要连接数据库
	require_once("conn.php");
	
	#获取表单输入内容
	$name=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from login where username='$name' and password='$password'";
	#以下的写法不可以
	//$sql="select * from login where username="."$name"." and password="."$password";
	
	#结果
	$info=mysqli_query($conn, $sql);
	if(!$info){
		echo "Error:".mysqli_error($conn);
	}
	
	#表示从结果集中获取一行作为枚举数组
	$row=mysqli_fetch_row($info);
	if($row){
		echo '成功';
		echo "<script>alert('登陆成功!!!')</script>";
	}else{
		echo '失败';
		echo mysqli_error($conn);
		echo "<script>alert('登陆失败!!!')</script>";
	}
?>