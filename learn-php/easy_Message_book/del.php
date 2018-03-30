<?php
    include 'conn.php';
    $id = $_GET['id'];
    echo "$id";
    $query="delete from my_message where id="."$id";
    if(mysqli_query($conn,$query)){
	    echo '删除成功';
    }else{
	    echo 'Error sql:'."$query"."<br>".'Error:'.mysqli_error($conn);
    }
	$sql="update my_message set id=id-1 where id>"."$id"." order by id";
	if(mysqli_query($conn, $sql)){
		echo '重新排序成功';
	}else{
		echo 'Error sql:'."$sql"."<br>".'Error:'.mysqli_error($conn);
	}
	
	#如果数据表为空，则删除所有记录
	/*if(!$row=mysqli_fetch_array($sql)){
		$sql="truncate table my_message";
		mysqli_query($conn, $sql);
	}*/
?>


<?php
    //页面跳转，实现方式为javascript
    $url = "list.php";
    echo "<script>";
	echo "window.location.href='$url'";
	echo "</script>";
?>