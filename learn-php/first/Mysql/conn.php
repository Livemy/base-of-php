<?php
	//数据库连接代码
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	//创建连接，成功连接的话该方法返回的是MySQL连接标识，失败的话则返回的是false
	$conn=mysqli_connect($host, $username, $password, $db_name);
	if(!$conn){
		die('Connection failed:'.mysqli_connect_error());
	}
?>