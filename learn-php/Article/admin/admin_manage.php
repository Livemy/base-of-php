<?php
//连接数据库
require_once("../connect.php");
$SQL="SELECT * FROM article ORDER BY dateline DESC";
//执行查询语句
$query=mysqli_query($conn,$SQL);
//判断查询语句是否查询到结果，查到则使用mysqli_fetch_assoc()将其逐行取出，放入数组$data中，没查到则直接赋值空数组给$data
if($query&&mysqli_num_rows($query)){
	while($row=mysqli_fetch_assoc($query)){
		$data[]=$row;
	}
}else{
	$data=array();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
 <meta name="format-detection" content="telephone=no" /> 
<title>文章管理</title>
<meta charset="utf-8" />
	<style>
	.box{
		background-color:#f0f0f0;
	}
	.title{
		margin:0 auto;
		border:1px solid black;
		width:400px;
	}
	.middle{
		margin:0 auto;
		border:1px solid black;
		width:400px;
	}
	.menu{
		margin:-50px 0px 1px 319px;
		width:80px;
	}
	.content{
		clear:both;
	}
	.art{
		text-align:center;
	}
	
	.num{
		float:left;
		border:1px solid black;
		width:50px;
		font-size: 13px;
	}	 	
	.tit{
		float:left;
		border:1px solid black;
		width:274px;
		font-size: 13px;
	}	 	
	.act{
		float:left;
		border:1px solid black;
		width:70px;
		font-size: 13px;
	}
	.bottom{
		width:400px;
		margin:0 auto;
		border:1px solid black;
		clear:both;
	}	 	
	</style>
</head>
<body>
<div class="box">
	<div class="title"><h1>后台管理系统</h1>
		<div class="menu">
			<a href="admin_add.php">发布文章</a><br/>
			<a href="admin_manage.php">管理文章</a>
		</div>
	</div>
	<div class="middle">
			<div class="art">文章管理列表</div>
			<div class="num">编号</div>
			<div class="tit">标题</div>
			<div class="act">操作</div>	
			<div class="content">
				<?php 
				//在$data不为空的情况下，通过foreach()将$data循环输出数来
				if(!empty($data)){
					foreach($data as $value){
				?>
				<div class="num"><?php echo $value['id']; ?></div>
				<div class="tit"><?php echo $value['title']; ?></div>
				<div class="act">
				<!--修改和删除直接使用<a>标签链接，通过get方式传递当前文章的id -->
					<a href="admin_modify.php?id=<?php echo $value['id']; ?>">修改</a>
					<a href="admin_del_handle.php?id=<?php echo $value['id']; ?>">删除</a>
				</div>
				<?php
					}
				}
			?>
			</div>
	</div>
	<div class="bottom">
		欢迎联系我们<a href="http://www.php.cn">php中文网</a><br/>
		前台展示页面<a href="../home/home_list.php">php咨询站</a>		
	</div>
</div>
</body>
</html>