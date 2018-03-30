<?php
	/*
	 * 预处理语句用于执行多个相同的 SQL 语句，并且执行效率更高。
	 * */
	 
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db_name="myDB";
	//连接
	$conn=new mysqli($host,$username,$password,$db_name);
	//检测连接
	if($conn->connect_error){
		die("连接失败：".$conn->connect_error);
	}
	//预处理及绑定
	$stmt=$conn->prepare("insert into MyGuests(firstname,lastname,email)values(?,?,?)");
	$stmt->bind_param("sss",$firstname,$lastname,$email);
	
	//设置参数并执行sql语句
	$firstname="eee";
	$lastname="eeeee";
	$email="eee@qq.com";
	$stmt->execute();
	
	$firstname="fff";
	$lastname="fffff";
	$email="fff@qq.com";
	$stmt->execute();
	
	$firstname="ggg";
	$lastname="ggggg";
	$email="ggg@qq.com";
	$stmt->execute();
	
	echo '新记录插入成功！！！';
	
	$stmt->close();
	$conn->close();
	
	/*
	 * 解析以下实例的每行代码:

"INSERT INTO MyGuests (firstname, lastname, email) VALUES(?, ?, ?)"
在 SQL 语句中，我们使用了问号 (?)，在此我们可以将问号替换为整型，字符串，双精度浮点型和布尔值。

接下来，让我们来看下 bind_param() 函数：

$stmt->bind_param("sss", $firstname, $lastname, $email);
该函数绑定了 SQL 的参数，且告诉数据库参数的值。 "sss" 参数列处理其余参数的数据类型。s 字符告诉数据库该参数为字符串。

参数有以下四种类型:

i - integer（整型）
d - double（双精度浮点型）
s - string（字符串）
b - BLOB（binary large object:二进制大对象）
每个参数都需要指定类型。

通过告诉数据库参数的数据类型，可以降低 SQL 注入的风险
	 * */
?>