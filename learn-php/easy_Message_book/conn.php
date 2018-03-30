<?php
	
	/*#连接数据库
	$conn=mysqli_connect("127.0.0.1","root","357159") or die("数据库连接错误");
	
	if(mysqli_select_db($conn,"db_messagebook")){
		//echo '数据库连接成功';
	}else{
		//echo '数据库连接失败';
	}*/
	
	$servername="127.0.0.1";
	$username="root";
	$password="357159";
	$dbname="db_messagebook";
	//创建连接
	$conn=mysqli_connect($servername, $username, $password, $dbname);
	//检测连接
	if(!$conn){
		die("Connection failed:".mysqli_connect_error()."<br>".'error_demo'.mysqli_connect_errno());
	}else{
		echo '连接成功';
	}
	#设置编码方式
	mysqli_query($conn,"set names 'utf8'"); //使用UTF-8中文编码
?>