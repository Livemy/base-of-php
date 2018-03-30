<?php
	
	#用户注册页面
	require_once("conn.php");
	
//	echo 'aaa';
//	echo $_POST['username'];
	
	//我们使用trim（）函数过滤到数据中的空格
	//$name=trim($_POST['username']);
//  if(isset($_POST["username"])){
//  	echo $_POST['username'];
//  }else{
//  	echo 'erroe';
//  }
    $name=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from login where username='$name'";
	$info=mysqli_query($conn, $sql);//$inof存储的是query（）函数返回的 结果
	$res=mysqli_num_rows($info);
	
	//判断用户名是否已经被注册过了
	if(empty($name)){
		echo "<script>alert('用户名不能为空');location.href='reg.php';</script>";
	}else if(empty($password)){
		echo "<script>alert('密码不能为空');location.href='reg.php';</script>";
	}else{  //用户名和密码都不为空时，判断是否被注册过了
		if($res){
			echo "<script>alert('用户名已经存在');location.href='reg.php';</script>";
		}else{
			$sql2="insert into login(username,password) values ('$name','$password')";
			$result=mysqli_query($conn, $sql2);
			if($result){
				echo "<script>alert('注册成功');</script>";
			}else{
				echo "<script>alert('注册失败');</script>";
			}
		}
	}
	
?>