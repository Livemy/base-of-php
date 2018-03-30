<?php
	
	#测试mysqli_fetch_array,mysqli_fetch_assoc,mysqli_fetch_row,mysqli_nub_rows
	
	$host="127.0.0.1";
	$user="root";
	$password="357159";
	$database="test";
	$conn=mysqli_connect($host, $user, $password, $database );
	if(!$conn){
		echo '数据库连接失败';
		exit();
	}
	mysqli_query($conn, "set names utf8");
	
	$sql="select * from test";
	$info=mysqli_query($conn, $sql);
	
	//mysqli_fetch_arry的测试
////	$result=mysqli_fetch_array($info);
//	while($result=mysqli_fetch_array($info)){
////		echo $result['id']." >= ".$result['name'];
//      echo $result[0].">=".$result[1];
//	}

	//mysqli_fetch_object的测试
	$nums=mysqli_num_rows($info);
	echo $nums;
	
	//小习惯，用完之后应该释放结果集，关闭数据库连接
	mysqli_free_result($info);
	mysqli_close($conn);
?>