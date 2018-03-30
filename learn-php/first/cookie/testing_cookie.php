<?php
	#应用isset（）函数来检测cookie变量
	date_default_timezone_set("Asia/Hong_Kong");//设置时区
	
	if(!isset($_COOKIE['visit_time'])){         
		setcookie("visit_time",date("Y-m-d H:i:s"),time()+60); //设置带失效时间的cookie变量
		echo "欢迎你第一次访问我们的网站"; 
		echo "<br>";
	}else{
		setcookie("visit_time",date("Y-m-d H:i:s"),time()+60);
		echo "你上次访问网站的时间为：".$_COOKIE['visit_time'];
		echo '<br>';
	}
	/*
	 * 注意，如果未设置浏览器的过期时间，那么将在关闭浏览器的同时自动删除Cookie数据
	 * 如果设置了Cookie的过期时间，那么浏览器将会保存Cookie数据，即使用户关闭了浏览器，
	 *   重启了计算机，只要没有过期，Cookie数据就会一直有效
	 * 
	 * 同时，Cookie数据也会又一个默认的过期时间吧
	 * */
?>