<?php
include ("conn.php");
/*if($_POST["submit"]){
	echo '用户名为：'.$_POST["user"]."<br>";
}*/
if ($_POST["submit"]){
    $sql="insert into my_message(user,title,content) ".
        "values ('$_POST[user]','$_POST[title]','$_POST[content]')";
	if(mysqli_query($conn, $sql)){
        echo "<script>alert('添加成功');history.go(-1)</script>";
	}else{
		echo 'Error sql:'."$sql"."<br>".'Error:'.mysqli_error($conn);
	}
    
}else{
	echo '提交错误';
}
?>