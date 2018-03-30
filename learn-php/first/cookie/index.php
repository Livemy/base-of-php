<?php
	setcookie("mr",'明日科技');
	setcookie("mr",'明日科技',time()+60); //设置cookie的有效时间为60秒
	/*
	 * 设置有效时间为60秒，有效目录为"/12.1"，有效域名为"mrbccd.cn"及其所有的子域名
	 * 1代表cookie只能再HTTPS连接上有效；如果为0的话代表cookie再HTTPS和HTTP连接上都有效
	 * */
	setcookie("mr",'明日科技',time()+60,"/12.1",".mrbccd.cn",1);
?>