<?php
    $conn = mysqli_connect("localhost", "root", "111","db_database13") or die("连接数据库服务器失败！".mysqli_error()); //连接MySQL服务器
    mysqli_query($conn,"set names utf8");						//设置数据库编码格式utf8
?>
