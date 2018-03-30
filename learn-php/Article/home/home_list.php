<?php
//引入分页程序
require_once("../paging.php");
//取出列表页3条数据，存于数组$data中
if($info&&mysqli_num_rows($info)){
	while($row=mysqli_fetch_assoc($info)){
		$data[]=$row;
	}
}else{
	$data=array();
}
//取最新添加的6条编号、标题信息，存于数组$data_title
if($info_title&&mysqli_num_rows($info_title)){
	while($row_title=mysqli_fetch_assoc($info_title)){
		$data_title[]=$row_title;
	}
}else{
	$data_title=array();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
<meta name="format-detection" content="telephone=no" /> 
<title>文章列表</title>
<link rel="stylesheet" href="../css/a.css" />
<meta charset="utf-8" />
	<style>
	*{
		box-sizing:border-box;
	}
	.box{
		font-family: 宋体;
		margin:0px auto;
		width:400px;
	}
	.box a:link,.box a:visited,.box a:hover{color:#000000;text-decoration:underline; }
	.head{
		background-color:#0f8ff2;
		height:80px;
	}
	.tit{
		padding: 20px 20px;
		font-size:25px;
	}
	.content{
		width:400px;
		min-height:100px;
		border:1px solid red;
	}
	.top_con{
		width:400px;
		padding:10px;
	}	 	
	.bottom_con{
		margin-left:20px;
		width:400px;
	}
	.con_tit{
		font-size:18px;
		margin:10px 0px 10px 10px;
		font-weight:bold;
	}	 
	.con_des{
		text-indent:2em;
		font-size:18px;
	}
	.con_det{
		padding: 0px 0px 0px 300px;
	}	
	ul{
		list-style:none;
		margin-left:-40px;

	}
	li{
		margin:15px 0px 0px 0px;
	}
	.index{
		margin:-5px 0px 0px 0px ;
	}
	.bg{
		position:relative;
		top: -6px;
		background-color:#fff;
		margin-left:335px;
	}
	/*.text{
		min-height: 100px;
		min-width: 100px;
		background: red;
	}*/
	</style>
</head>
<body>
<div class="text"></div>
<div class="box">
	<div class="head"><div class="tit">php资讯站</div><span class="bg"><a href="../admin/admin_manage.php">后台入口</a></span></div>
	<div class="content">
		<div class="top_con">
			<?php 
				//将$data中的数据通过foreach循环出来，显示在相应div里面
				if(!empty($data)){
					foreach($data as $value){
			?>
			<div class="con_tit"><?php echo $value['title']?></div>
			<div class="con_des"><?php echo $value['description']?></div>
			<div class="con_det"><a href="home_show.php?id=<?php echo $value['id'];?>">查看详细</a></div>

			<?php
				}
			}
			//初始化首页、上一页、下一页、末页的值，通过<a>标签进行跳转到当前页面，传入$page的值
				$first=1;
				$prev=$page-1;
				$next=$page+1;
				$last=$pagenum;
			?>
			<div class="index">
			<a href="home_list.php?page=<?php echo $first ?>">首页</a>
			<a href="home_list.php?page=<?php echo $prev ?>">上一页</a>
			<a href="home_list.php?page=<?php echo $next ?>">下一页</a>
			<a href="home_list.php?page=<?php echo $last ?>">末页</a>
			</div>
		</div>
		<div class="bottom_con">
			<div style="margin-left:10px;margin-top:20px,font-size:20px;">最新资讯</div>
			<ul>
			<?php 
			//将$data_title中的数据通过foreach循环出来，显示在相应div里面
				if(!empty($data_title)){
					foreach($data_title as $value_title){
			?>
				<li><a href="home_show.php?id=<?php echo $value_title['id']?>"><?php echo $value_title['title']?></a></li>
			<?php 
				}
			}
			?>
			</ul>
		</div>
	</div>
</div>
</body>
</html>