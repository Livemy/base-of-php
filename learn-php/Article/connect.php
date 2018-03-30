<?php
	
	#连接数据库文件
	require_once("config.php");
	
	$conn=mysqli_connect(HOST, USERNAME, PASSWORD,"articledb") 
		or die("数据库连接错误");
	
	
	#设置数据库的字符集
	mysqli_query($conn,"set names utf8");
?>