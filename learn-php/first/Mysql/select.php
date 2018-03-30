<?php
	#读取数据
	/*$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	
	$conn=mysqli_connect($host, $username, $password, $db_name);
	if(!$conn){
		die("连接失败：".mysqli_connect_error);
	}*/
	include_once("conn.php");
	$sql="select id,firstname,lastname from MyGuests";
	$result=mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)>0){
		//输出数据
		while($row=mysqli_fetch_assoc($result)){
			echo "id:".$row["id"]."-Name:".$row["firstname"]." ".$row["lastname"]."<br>";
		}
	}else{
		echo '0结果';
	}
	
	mysqli_close($conn);
	
	/*
	 * 首先，我们设置了 SQL 语句从 MyGuests数据表中读取 id, firstname 和 lastname 三个字段。
	 * 之后我们使用改 SQL 语句从数据库中取出结果集并赋给复制给变量 $result。
     * 函数 num_rows() 判断返回的数据。
     * 如果返回的是多条数据，函数 fetch_assoc() 将结合集放入到关联数组并循环输出。 
	 * while() 循环出结果集，并输出 id, firstname 和 lastname 三个字段值。
	 * */
?>