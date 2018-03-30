<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文件的上传</title>
	</head>
	<body>
		<!-- 上传文件的form表单，必须有enctype属性-->
		<!-- 上传文件时，好像必须是post才有效-->
		<form action="" method="post" enctype="multipart/form-data">
			<!-- 上传文件域，type类型为file-->
			<input type="file" name="upfile" />
			<input type="submit" value="提交文件" />
		</form>
		
		<!-- 处理表单返回结果-->
		<?php
			if(!empty($_FILES)){
				echo '问津空';
				foreach($_FILES['upfile'] as $name=>$value)
						echo $name.'='.$value.'<br/>';
				echo '好像成功了码？';
			}	
		?>
		
		<!-- 服务器信息 -->
		<?php
			echo '当前服务器的ip地址为：<b>'.$_SERVER['SERVER_ADDR']."</b><br>";	
			echo '当前服务器的主机名称为：<b>'.$_SERVER['SERVER_NAME']."</b><br>";
			echo '客户端的IP地址为：<b>'.$_SERVER['REMOTE_ADDR']."</b><br>";
			echo '客户端连接到主机所使用的端口：<b>'.$_SERVER['REMOTE_PORT']."</b><br>";
			echo '当前运行的脚本所在文档的根目录：<b>'.$_SERVER['DOCUMENT_ROOT']."</b><br>";
		?>
		
		<!-- 变量函数 -->
		<?php
			function a($a,$b){
				return $a+$b;
			}	
			function b($a,$b){
				return $a*$a+$b*$b;
			}
			function c($a,$b){
				return $a*$a*$a+$b*$b*$b;
			}
			$result="a";
			$result="b";
			$result="c";
			echo "运算结果是：".$result(2,3);
		?>
		
		<!--定界符的前后不能有任何一个空格或其它的字符-->
		<?php
			echo <<<str
				hell<p>kkk</p>
str;
		?>
		
		<!--转义字符-->
		<?php
			echo 'I\'m';	
		?>
		
		<!--数据库链接-->
		<?php
			#aaa,这里看起来注释好像没用了，但是再浏览器中它还是照常工作的，真实让人惊奇的呢！！！！
			echo 'aaa';
			$host="127.0.0.1";
			$userName="root";
			$password="357159";
			/*if($connID=mysqli_connect($host,$userName,$password)){
				echo "<script type='text/javascript'>alert('数据库链接成功！！！');</script>";
			}else{
				echo "<script type='text/javascript'>alert('数据库链接失败了！！！');</script>";
			}*/
			/*$db_name="db_user";
			$conID=mysqli_connect($host,$userName,$password);
			if(mysqli_select_db($conID,$db_name)){
				echo "数据库链接成功";
			}else{
				echo '数据库链接失败';
			}
			$result=mysqli_query($conID,"select * from tb_user");
			echo "$result";*/
			
			#以下时菜鸟教程中的链接方法
			//创建链接
			$conn=new mysqli($host,$userName,$password);
			//检测链接
			if($conn->connect_error){
				die("链接失败:".$conn->connect_error);
			}
			//创建数据库
			$sql="create database myDB";
			if($conn->query($sql)===TRUE){
				echo "数据库创建成功了！！！";
			}else{
				echo "Error creating database:".$conn->error;
			}
			
			//关闭数据库链接
			$conn->close();
		?>
	</body>
</html>
