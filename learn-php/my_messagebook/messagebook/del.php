<?php
	
	include_once("../conn.php");
	$id=$_GET['id'];
	echo $id;
	
	$sql="delete from message where id='$id'";
	$info=mysqli_query($conn, $sql);
	if($info){
		echo '删除成功！！！';
		$sql="update message set id=id-1 where id>"."$id"." order by id";
		if(mysqli_query($conn, $sql)){
			echo '排序成功!!!';
		}else{
			echo '排序不成功';
		}
	}else{
		echo '删除失败';
	}
?>

<?php
	
	echo "<script>window.history.back(-1);</script>";	
?>