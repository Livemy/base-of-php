<?php
include_once("conn.php");
$id=isset($_GET["id"])?$_GET["id"]:"";
if(isset($_POST["submit"]) && $_POST["submit"]!=""){
  if(mysqli_query($conn,"update tb_leaveword set title='".$_POST["title"]."',content='".$_POST["content"]."' where id='".$_POST["id"]."'")){
    echo "<script>alert('���Ը��ĳɹ���');window.opener.location.reload();window.close();</script>";
  }else{
    echo "<script>alert('���Ը���ʧ�ܣ�');history.back();</script>";    
  }
 exit;
}
$sql=mysqli_query($conn,"select * from tb_leaveword where id='".$id."'");
$info=mysqli_fetch_array($sql);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�༭����</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="450" height="200" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#3399FF">
 
 <script language="javascript">
  function chkinput(form){
    if(form.title.value==""){
	
	  alert("�������ⲻ��Ϊ�գ�");
	  form.title.focus();
	  return(false);
	
	}
	
	 if(form.content.value==""){
	
	  alert("�������ݲ���Ϊ�գ�");
	  form.content.focus();
	  return(false);
	
	}
   return(true);
  
  }
 
 </script>
 
 <form name="form1" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onSubmit="return chkinput(this)">
 
  <tr>
    <td height="25" colspan="2" background="images/dh_back_1.gif" bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;<img src="images/biao.gif">&nbsp;�༭����</td>
  </tr>
  <tr>
    <td width="76" height="25" bgcolor="#FFFFFF"><div align="center">�������⣺</div></td>
    <td width="371" bgcolor="#FFFFFF">&nbsp;<input name="title" type="text" class="inputcss" size="45" value="<?php echo $info['title'];?>"></td>
  </tr>
  <tr>
    <td height="200" bgcolor="#FFFFFF"><div align="center">�������ݣ�</div></td>
    <td height="200" bgcolor="#FFFFFF">&nbsp;<textarea name="content" cols="52" rows="12" class="inputcss"><?php echo $info['content'];?></textarea></td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#FFFFFF"><div align="center"><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"><input type="submit" value="�༭" class="buttoncss" name="submit">&nbsp;&nbsp;<input type="reset" value="ȡ��" class="buttoncss"></div></td>
  </tr>
  </form>
  
</table>
</body>
</html>
