<?php
	/*$servername="127.0.0.1";
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
	
	if($conn){
		echo '数据库连接成功呢';
	}*/
	include("conn.php");
	$sql="insert into my_message(user,title,content)"
	    ."values('yinjianmei','second','第二次尝试')";
	//$sql="insert into message(id,user,title,content,lastdate)values('','tainkaimin','第一次尝试','这是简单的留言体统他',now())";
	if(mysqli_query($conn, $sql)){
		echo "aaa";
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
?> 