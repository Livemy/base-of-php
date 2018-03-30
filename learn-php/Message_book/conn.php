<?php
	#数据库连接文件
	$conn=mysqli_connect("127.0.0.1", "root", "357159", "db_messagebook");
	
	//设置页面编码方式
	mysqli_query($conn, "set names gb2312");
?>