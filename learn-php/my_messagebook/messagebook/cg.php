<?php

    include_once("../conn.php");
	$id=$_POST['id'];
	$content=$_POST['content'];	
	$sql="update message set content='$content' where id='$id'";
	$info=mysqli_query($conn, $sql);
	if($info){
		echo '修改成功';
	}else{
		echo '修改失败';
	}
 
?>

<?php
	$url="message.php";
	echo "<script>location.href='$url';</script>";	
?>