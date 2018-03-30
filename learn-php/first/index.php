<?php
 echo "success???";
 echo '<img src="img/5.jpg">';
	{
		echo "你好，php！！！";
		echo "<br/>";
		echo date("Y-m-d H:i:s");
	}
	
	/*
	 *单引号输入的是完整的字符串，而双引号输出的是变量的值
	 * 所以如果没有特殊的需要的话，我们应该尽量使用单引号*
	*/
	echo '<br/>';
	$a="你好，欢迎来到PHP的世界！";
	echo "<h3>$a</h3>";
	echo '<h3>$a</h3>';
	
	#数组
	$arr=array(0=>1,1=>2,'hi'=>"Hello");
	echo $arr[0];
	echo $arr[1];
	echo $arr['hi']; //key值要和键值完全相同
	
	#print和echo的区别
	/*
	 * echo语句前不能使用错误屏蔽运算符“@”
	 * print语句可以看作一个有返回值的函数，因此print语句能作为表达式的一部分，而echo语句不能。
	 * */
	
	echo '<br/>';
	echo '当前php文件路径：'.__FILE__.'<br/>';
	echo '当前PHP的版本为：'.PHP_VERSION.'<br/>';
	
	#可变变量
	$change_name="php";
	$php="编程的关键因素在于学好语言的基础";
	echo "change_name";
	echo 'change_name';
	echo $change_name; //输出变量change_name的值
	echo $$change_name; //通过可变变量输出$php的值
	
	#利用循环写个乘法口诀表
	for($i=1;$i<=9;$i++){
		echo "<table border=1 cellspacing=0 cellpadding=0 bordercolor=#cccccc>";
		echo "<tr>";
		for($j=1;$j<=$i;$j++){
			echo "<td width=60 align=center>";
			echo "$j*$i=".$i*$j;
			echo "</td>";
		}
		echo "</tr>";
		echo "</table>";
	}
?>