<?php


	/*
	 *    当我们在一个页面之中要引入多个类时，需要使用include_once()或require_once()一个一个引入，这很浪费。
	 * 所以就有了__autoload（）方法来解决。
	 * 当程序要用到一个类，但该类还没有被实例化时，使用__autoload()方法将在指定路径下自动查找和该类
	 * 相同名称的文件，如果找到就继续执行，否则报告错误。
	 * */
	 
	 function __autoload($class_name){
	 	$class_path=$class_name.'/inc.php'; //类文件路径你
	 	if(file_exists($class_path)){
	 		include_once($class_path);
	 	}else{
	 		echo '类路径错误';
	 	}
	 }
	 
	 $mrcrof=new People();
	 echo $mrcrof;
?>