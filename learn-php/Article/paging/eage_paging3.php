<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>页面的简单显示-显示总页数</title>
	</head>
	<body>
		<?php
			/**1.传入页面**/
			$page=$_GET['p'];
			/**2.根据页面取出数据：php->mysql**/
			$host="127.0.0.1";
			$username="root";
			$password="357159";
			$db="paging";
			$pagesize=5;
			//连接数据库
			$conn=mysqli_connect($host, $username, $password, $db);
			if(!$conn){
				echo '数据库连接失败';
				exit;
			}
			//设置数据库编码格式
			mysqli_query($conn,"set names utf8");
			
			//编写sql获取分页数据
			//select * from 表名 limit 起始位置，显示条数
			$sql="select * from paging limit ".($page-1)*$pagesize ." ,$pagesize";
    		$result=mysqli_query($conn, $sql);
    		
    		//处理数据
    		echo "<table border=1 cellspacing=0 width=15% >";
 			echo "<tr><td>ID</td><td>名字</td><td>性别</td></tr>";
			 while($row = mysqli_fetch_assoc($result)){
  			  	  echo "<tr>";
   				  echo "<td>{$row['id']}</td>";
    			  echo "<td>{$row['name']}</td>";
     			  echo "<td>{$row['sex']}</td>";
     			  echo "<tr>";
 			 }
 			//释放结果
 			mysqli_free_result($result);
 			//获取数据总数
 			$to_sql="select count(*)from test";
 			$to_result=mysql_fetch_array(mysqli_query($conn,$to_sql));
 			$to=$to_result[0];
 			//计算页数
 			$to_pages=ceil($to/$pagesize);
 			mysqli_close($conn);
 			
 			/**3.显示数据+分页条**/
 			$page_banner="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
 			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
 			$page_banner.="共{$to_pages}页";
 			echo $page_banner;
		?>
	</body>
</html>
