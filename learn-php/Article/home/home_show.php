<?php
require_once("../paging.php");
//根据传递过来的id值，获取详情页内容，存于数组$data中
$id=$_GET['id'];
$sql="select *from article where id=$id";
$info=mysqli_query($conn,$sql);
$a=mysqli_num_rows($info);
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
		padding: 20px 40px;
		font-size:25px;
	}
	.content{
		width:400px;
		min-height:100px;
		border:1px solid red;

	}
	.top_con{
		width:400px;
		padding:5px 10px 20px 10px ;
	}	 	
	.bottom_con{
		margin:0px 0px 0px -1px;
		width:400px;
	}
	.con_tit{
		font-size:22px;
		margin:20px 0px 10px 10px;
		font-weight:bold;
	}
	.con_aut{
		font-size:13px;
		padding-left:10px;
		padding-top:10px;
	}	 
	.con_des{
		padding-top:15px;
		text-indent:2em;
		font-size:18px;
		padding-left:10px
	}
	.con_det{
		text-indent:2em;
		font-size:17px;
		margin:20px 0px 0px 0px;
		padding-left:10px
	}	
	ul{
		list-style:none;
		margin-left:-30px;
	}
	li{
		margin:15px 0px 0px 0px;
	}
	</style>
</head>
<body>
<div class="box">
	<div class="head"><a href="home_list.php">返回</a><div class="tit">php资讯站</div></div>
	<div class="content">
		<div class="top_con">
			<?php
			//将$data中的数据通过foreach循环出来，显示在相应div里面
				if(!empty($data)){
					foreach($data as $value){
			?>
			<div class="con_tit"><?php echo $value['title']?></div>
			<div class="con_aut"><?php echo $value['author']?> 发表于<?php echo date("Y-m-d",$value['dataline'])?></div>
			<div class="con_des"><?php echo $value['description']?></div>
			<div class="con_det"><?php echo $value['content']?></div>
			<?php
				}
			}
			?>
		</div>
		<div class="bottom_con">
			<div style="margin-left:10px;font-size:20px;">最新资讯</div>
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