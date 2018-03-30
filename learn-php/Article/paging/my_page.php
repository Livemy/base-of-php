<html>
	<head>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<title>简单分页</title>
	</head>
	<style>
		div.content{
			text-align: center;
			height: 300px;
		}
		div.page{
			text-align: center;
		}
		div.page a{
			border: 1px solid #aaaadd;
			text-decoration: none;
			padding: 2px 5px;
			margin: 2px;
		}
		div.page span.current{ 
			border: #000099 solid 1px;
			background: #000099;
			padding: 4px 6px;
			margin: 2px;
			color: white;
			font-weight: bold;
		}
		div.page span.disable{
			border: 1px solid #eee;
			padding: 2px 5px ;
			margin: 2px;
			color: #ddd;
		}
	</style>
	<body>
		

<?php
//	echo "<pre>";
//	print_r($_SERVER['SERVER_SOFTWARE']);
//	echo "</pre>";
	
	/**1.传入页码**/
	$page=isset($_GET['p'])?trim($_GET['p']):1;
	
	/**2.根据页码取出数据：php->mysql处理**/
	$host="127.0.0.1";
	$username="root";
	$password="357159";
	$db="paging";
	$pagesize=10;//显示的数据数
	$showpage=5;//显示的页码数
	$conn=mysqli_connect($host, $username, $password, $db);
	if(!$conn){
		echo '连接失败';
		exit;
	}
	//设置数据库编码格式
	mysqli_query($conn, "set names utf8");
	//编写sql语句获取分页数据：select * from 表名 limit 起始位置，显示条数
	$sql="select * from my_page limit ".($page-1)*$pagesize .",{$pagesize}";	
	$result=mysqli_query($conn, $sql);
//	$row=mysqli_fetch_assoc($result);//处理后的结果是一个数组
	//直接上面用不行，因为隐式指针不会自动跳转
	//sql语句查询到的结果是个数据源，我们要经过处理后才能为我们所用
	echo "<div class='content'>";
	echo "<table border=1 cellspacing=0 width=15% style='text-align:center;' align='center' >"; //cellspacing代表的是边框之间的间距
	echo "<tr><td>id</td><td>name</td></tr>";
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>{$row['id']}</td>";
		echo "<td>{$row['name']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
	
	//需要养成的小习惯：释放结果，关闭链接
	mysqli_free_result($result);
	//获取数据总数
	$total_sql="select count(*) from my_page";
	$total_result=mysqli_query($conn, $total_sql);
	$total_info=mysqli_fetch_array($total_result); //对结果进行处理
	$total=$total_info[0];
	echo '总条数为：'.$total."<br>";
	//计算页数
	$total_page=ceil($total/$pagesize);//总页数
	mysqli_close($conn);
	
	/**3.显示数据+分页条**/
//	$page_banner="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a>";
	$page_banner="<div class='page'>";
	//计算偏移量
	$pageoffset=($showpage-1)/2;
	if($page>1){
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1"."'>首页</a>";
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
	}else{
		$page_banner.="<span class='disable'>首页</span>";
		$page_banner.="<span class='disable'><上一页</span>";
	}
	//初始化数据(即用来表示从哪个页码开始显示，到哪个页码显示结束)
	$start=1;
	$end=$total_page;
	if($total_page>$showpage){ //总页码数大于了我们想要显示的页码数
		if($page>$pageoffset+1){//并且当前页码大于了偏移量加一
			$page_banner.="...";
		}
		if($page>$pageoffset){//当前页码大于偏移量
			//例如当前页是5是，起始位置就要为（5-2）
			$start=$page-$pageoffset;
			$end=$total_page>$page+$pageoffset?$page+$pageoffset:$total_page;
		}else{ //当前页码小于等于偏移量
			$start=1;
			$end=$total_page>$showpage?$showpage:$total_page;
		}
		
		if($page+$pageoffset>$total_page){
			$start=$start-($page+$pageoffset-$end);
		}
	}
	
	//显示数据      
	for($i=$start;$i<=$end;$i++){
		if($page==$i){
			$page_banner.="<span class='current'>{$i}</span>";
		}else{
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($i)."'>{$i}</a>";
		}
	}
	
	if($total_page>$showpage&&$total_page>$page+$pageoffset){
		$page_banner.="....";
	}
	if($page<$total_page){
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_page)."'>尾页</a>";
	}else{
		$page_banner.="<span class='disable'>下一页></span>";
		$page_banner.="<span class='disable'>尾页</span>"; 
	}
	$page_banner.="<br>"."共{$total_page}页<br>";
	
	$page_banner.="<form action='my_page.php' method='get'>";
	$page_banner.="到第<input type='text' size='2' name='p'>";
	$page_banner.="<input type='submit' value='确定'>";
	$page_banner.="</form>";
	$page_banner.="</div>";//这个div包裹的是全体
	echo $page_banner;
?>
	</body>
</html> 