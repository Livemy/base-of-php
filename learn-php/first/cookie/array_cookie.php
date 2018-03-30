<?php
	#为cookie设置数组
	
	setcookie("user[1]","张三");
	setcookie("user[2]",'李四');
	setcookie("user[super]",'尹剑梅');
?>

<?php
	
	if(isset($_COOKIE)){
		foreach($_COOKIE['user'] as $key=>$value){
		echo $key."=>".$value."<br/>";
	}	
	}
?>