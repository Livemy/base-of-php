<?php
	#退出登陆界面
	session_start();
	session_unset();
	session_destroy();
	
	$url="../index.html";
	echo "<script>alert('你已经退出登陆了!!!');location.href='$url';</script>";
?>