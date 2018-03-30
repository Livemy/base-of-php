<?php

	//制作简单的分页条
	
	/* 1.传入页码 */
	$page=$_GET["p"];
	/**2.根据页码取出数据：php->mysql的处理**/
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db="paging";
	//连接数据库
	$conn=mysqli_connect($host, $username, $password, $db);
	if(!$conn){
		echo '数据库连接失败';
		exit;
	}
	//设置数据库编码格式
	mysqli_query($conn,"set names utf8");
	
	//编写sql获取分页数据
	//select * from 表名 limit 起始位置，显示条数
	$sql="select * from paging limit ".($page-1)*5 ." ,5";
    $result=mysqli_query($conn, $sql);
	//处理数据
	echo "<table border=1 cellsapcing=0 width=15%>";
	echo "<tr><td>ID</td><td>名字</td><td>性别</td></tr>";
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['sex']}</td>";
		echo "</tr>";
	}
?>