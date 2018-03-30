<?php
	#读取cookie的值
	//注意，该cookie的变量名为'mr',变量的值为'明日科技'
	setcookie("mr",'明日科技',time()+60);
	
	if(isset($_COOKIE['mr'])){
		echo '读取cookie的值：'.$_COOKIE['mr'];
	}
?>