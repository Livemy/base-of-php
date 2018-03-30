<?php
	#应用全局数组$_SESSION[]将数组中的数据保存到session中
	session_start();
	$array=array('PHP入门到精通','PHP网络编程自学手册','PHP函数参考大全','PHP开发典型模板大全',
	            'PHP网络编程标准教程','PHP程序开发范例宝典'
	);
	$_SESSION['mr_book']=$array; //将数组中的数据写入session中，mr_book是session会话变量
?>

<?php
	foreach($_SESSION['mr_book'] as $key=>$value){ //读取session中存储的值
		if($value=='PHP开发典型模板大全'){  //换行
			$br="<br><br>";
		}else{
			$br="&nbsp;&nbsp;&nbsp;&nbsp";
		}
		echo $value.$br; //输出session数组中的内容
	}		
?>