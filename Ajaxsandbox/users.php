<?php
	
	//链接数据库
	$link = mysqli_connect('localhost','root','357159','user');
	mysqli_set_charset($link,'utf8'); //设定字符集  
	if (!$link) {
	 die("连接失败:".mysqli_connect_error());
	}


	$query="select * from user ";
	$result=mysqli_query($link,$query);

	//mysqli_fetch_array()只能返回结果集的一行，要想全部输出的话就要用循环
	// $users=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// $users=mysqli_fetch_array($result);
	// while ($users=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	// 	echo $users['username'];
	// }
	/**
	* 
	*/
	class User
	{
		
		public $id;
		public $username;
	}
	$data=array();
	while ( $users=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		$user=new User();
		$user->id=$users['id'];
		$user->username=$users['username'];
		$data[]=$user;
	}


	echo json_encode($data);
?>  