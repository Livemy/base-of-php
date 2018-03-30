<?php
	/*
	 * 初始化session变量，通过$_POST[]方法获取表单提交的用户名和密码，完成对用户名和密码 的检验
	 * 如果正确，则将用户名和密码赋值给session变量，并通过js脚本跳转到main.php页面
	 * 否则，通过js脚本给出提示信息，跳转到index.php页面
	 * */
	 session_start();
	 if($_POST['user']=='tan'&&$_POST['password']=='357159'){
	 	$_SESSION['user']=$_POST['user'];
		$_SESSION['password']=$_POST['password'];
		echo "<script>alert('欢迎你的归来');window.location.href='main.php';</script>";
	 }else{
	 	echo "<script>alert('你输入的密码或用户名不正确');window.location.href='index.php';</script>";
	 }
?>