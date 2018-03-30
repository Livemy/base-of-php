<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>表单的综合运用</title>
	</head>
	<body>
		<?php
		    echo '这是常识';	
		?>
		<form id="form1" name="form1" method="post" action="post.php">
			<table width="503" border="0" align="center" cellpadding="1" bgcolor="#BBBBBB">
				<tr>
					<td height="46" colspan="2" bgcolor="#DDDDDD"><font color="#333333" size="+2">请输入你的 个人信息</font></td>
				</tr>
				<tr>
					<td width="82" height="20" align="right" bgcolor="#DDDDDD">姓名：</td>
					<td width="414" height="20" bgcolor="#DDDDDD"><input type="text" name="name"/></td>
				</tr>
				<tr>
					<td height="20" align="right" bgcolor="#DDDDDD">性别：</td>
					<td height="20" bgcolor="#DDDDDD">
						<input type="radio" name="sex" value="男" />男&nbsp;&nbsp;
						<input type="radio" name="sex" value="女" />女
					</td>
				</tr>
				<tr>
					<td height="20" align="right" bgcolor="#DDDDDD">生日:</td>
					<td height="20" bgcolor="#DDDDDD">
						<select name="year">
							
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="提交" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
