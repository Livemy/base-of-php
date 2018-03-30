<?php

    #设置编码
	header("Content-type:text/html; charset=utf-8");
	
	$conn=mysqli_connect("127.0.0.1", "root", "357159", "my_messagebook") 
	    or die("数据库连接失败");
	
	#设置数据库的字符集	  
    mysqli_query($conn, "set names utf8");
?>