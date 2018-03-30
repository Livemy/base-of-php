<?php
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	
	//创建链接,此时是直接链接到具体的数据库
	$conn=new mysqli($host,$username,$password,$db_name);
	//检测连接有没有成功
	if($conn->connect_error){
		die("连接失败：".$conn->connect_error);
	}
	
	//使用sql语句创建数据表
	$sql="create table MyGuests(
		id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname varchar(30) not null,
		lastname varchar(30) not null,
		email varchar(50),
		reg_date timestamp
	)";
	if($conn->query($sql)==true){
		echo 'Table MyGuests created successfully';
	}else{
		echo '创建数据表错误：'.$conn->error;
	}
	//关闭数据库连接
	$conn->close();
?>