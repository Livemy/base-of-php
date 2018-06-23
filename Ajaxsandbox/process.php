<?php
	//给Ajax请求返回的内容
	// echo '这里给php自制接口给Ajax请求返回的内容';
	// 
	if(isset($_GET['name'])){
		echo "GET: 你的名字是：".$_GET['name'];
	}
	
	//链接数据库
	$link = mysqli_connect('localhost','root','357159','user');
	mysqli_set_charset($link,'utf8'); //设定字符集  
	if (!$link) {
	 die("连接失败:".mysqli_connect_error());
	}

	// if(isset($_POST['name'])){
	// 	echo "POST: 你的名字是：".$_POST['name'];
	// }
	if(isset($_POST['name'])){

		//将拿到的数据转化一下,防止出现乱码的问题
		$name=mysqli_real_escape_string($link,$_POST['name']);

		$query="insert into user(username) values ('$name');";
		if(mysqli_query($link,$query)){
			echo '用户添加成功';
		}else{
			echo '添加失败: '.mysqli_error($conn);
		}
	}
?>