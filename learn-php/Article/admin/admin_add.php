<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
 	<meta name="format-detection" content="telephone=no" /> 
	<title>发布文章</title>
	<meta charset="utf-8" />
	<style>
	.box{
		background-color:#f0f0f0;
	}
	.title{
		background-color:#f0f0f0;
		width:400px;
		height:100px;
		border-bottom:1px solid black;
	}
	.menu{
		margin:-25px 0px 1px 319px;
		width:80px;
	}	
	.middle{
		border-bottom:1px solid black;
	} 
	.bottom{
	}	
	</style>
</head>
<body>
	<div class="box">
		<div class="title">
			<h1>后台管理系统</h1>
			<div class="menu">
				<a href="admin_add.php">发布文章</a><br/>
				<a href="admin_manage.php">管理文章</a>
			</div>
		</div>
		<div class="middle">
			<form method="post" action="admin_add_handle.php">
				<div><h2>发布文章</h2></div>
				<div>标题:<input type="text" name="title" /></div><br/>
				<div>作者:<input type="text" name="author" /></div><br/>
				<div>简介:<br/><textarea name="description" cols="50" rows="4"></textarea></div><br/>
				<div>内容:<br/><textarea name="content" cols="50" rows="9" ></textarea></div><br/>
				<div><input type="submit" name="button" value="提交" /></div><br/>
			</form>
		</div>
		<br/>
		<div class="bottom">欢迎联系我们<a href="http://www.php.cn">php中文网</a></div>
	</div>
</body>
</html>