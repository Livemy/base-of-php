<?php
	#使用面向过程的方法向数据表中插入数据
	/*$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	//创建连接，成功连接的话该方法返回的是MySQL连接标识，失败的话则返回的是false
	$conn=mysqli_connect($host, $username, $password, $db_name);
	if(!$conn){
		die('Connection failed:'.mysqli_connect_error());
	}*/
	include_once(conn.php);
	//sql语句
	$sql="insert into MyGuests(firstname,lastname,email) values ('John','Doe','john@example.com')";
	//向数据表插入数据（即执行sql语句）
	if(mysqli_query($conn, $sql)){
		echo '新记录插入成功了！！！';
	}else{
		echo 'Error:'.$sql."<br>".mysqli_error($conn);
	}
	//关闭数据库连接
	mysqli_close($conn);
	
	//接下来运用面向对象的方式进行插入数据
	$con=new mysqli($host,$username,$password,$db_name);
	if($con->connect_error){
		die("连接失败：".$con->connect_error);
	}
	$sq="insert into MyGuests(firstname,lastname,email) values ('tan','kaimin','lanxue@qq.com')";
	if($con->query($sq)==true){
		echo '插入成功!!';
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$con->close();
?>