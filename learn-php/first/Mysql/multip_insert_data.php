<?php
	//使用mysqli_multi_query()函数来执行多次sql语句
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	$conn=mysqli_connect($host,$username,$password,$db_name);
	if(!$conn){
		die("连接失败：".mysqli_connect_error);
	}
	
	//注意，sql语句结尾的分号必不可少，前面的"."也是,加了"."才能够表示是要一同插入的数据
	$sql="insert into MyGuests(firstname,lastname,email) values ('aaa','aaaaa','aa@qq.com');";
	$sql.="insert into MyGuests(firstname,lastname,email)values('bbb','bbbbb','bb@qq.com');";
	$sql.="insert into MyGuests(firstname,lastname,email)values('ccc','ccccc','cc@qq.com');";
	
	if(mysqli_multi_query($conn,$sql)){
		echo '新的记录插入成功了！！！';
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>