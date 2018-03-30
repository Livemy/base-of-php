<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>页面的简单显示-首页和尾页的显示</title>
		<link rel="stylesheet" href="a.css" />
	</head>
	<body>
		<?php
			/**1.传入页面**/
//			$page=$_GET['p'];
			$page=isset($_GET['p'])?trim($_GET['p']):1;
			/**2.根据页面取出数据：php->mysql**/
			$host="127.0.0.1";
			$username="root";
			$password="357159";
			$db="paging";
			$pagesize=5;
			$showpage=3;//我们要显示的页码数
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
    		echo "<div class='content'>";
    		echo "<table border=1 cellspacing=0 width=15% align='center'>";
 			echo "<tr><td>ID</td><td>名字</td><td>性别</td></tr>";
			 while($row = mysqli_fetch_assoc($result)){
  			  	  echo "<tr>";
   				  echo "<td>{$row['id']}</td>";
    			  echo "<td>{$row['name']}</td>";
     			  echo "<td>{$row['sex']}</td>";
     			  echo "<tr>";
 			 }
			 echo "</table>";
			 echo "</div>";
 			//释放结果
 			mysqli_free_result($result);
 			//获取数据总数
 			$to_sql="select count(*) from paging";//计算数据的总数
			$info=mysqli_query($conn, $to_sql);
 			$to_result=mysqli_fetch_array($info,MYSQL_BOTH);//连接计算出来的总数，并取得数据
 			$to=$to_result[0]; //就是取得的总条数
 			//计算页数
 			$to_pages=ceil($to/$pagesize);//$to_pages计算处页数，$to/$pagesize每页显示的数据获得显示多少页
 			//ceil()函数向上取整数，这样余下的也能显示出来
 			mysqli_close($conn);
 			
 			/**3.显示数据+分页条**/
 			$page_banner="";
			//计算偏移量
			$pageofset=($showpage-1)/2;
			if($page>1){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
	 			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";			
			}
			//初始化数据
			$start=1;
			$end=$to_pages;
			if($to_pages>$showpage){
				if($page>$pageofset+1){
					$page_banner.="...";
				}
				if($page>$pageofset){
					$start=$page-$pageofset;
					$end=$to_pages>$page+$pageofset?$page+$pageofset:$to_pages;
				}else{
					$start=1;
					$end=$to_pages>$showpage?$showpage:$to_pages;
				}
				if($page+$pageofset>$to_pages){
					$start=$start-($page+$pageofset-$end);
				}
			}
			for($i=$start;$i<$end;$i++){
				if($page==$i){
					$page_banner.="<span class='current'>{$i}</span>";
				}else{
					$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($i)."'>{$i}</a>";
				}
			}
			//尾部省略
			if($to_pages>$showpage&&$to_pages>$page+$pageofset){
				$page_banner.="...";
			}
			
			if($page<$to_pages){
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a>";
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>尾页</a>";
			}
 			$page_banner.="共{$to_pages}页";
			
			//添加跳转功能
			$page_banner.="<form action='eage_paging_hidded_page.php' method='get'>";
			$page_banner.="&nbsp;到第<input type='text' size='2' name='p'>页";
			$page_banner.="<input type='submit' value='确定'>";
			$page_banner.="</form>";
 			echo $page_banner;
		?>
	</body>
</html>
