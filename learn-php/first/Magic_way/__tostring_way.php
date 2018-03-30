<?php
	#__tostring方法的作用是当使用echo或print输出对象时，将对象转换成字符串
	class People{
		public function __toString(){
			return "我是toString方法的返回体";
		}
	}
	
	$peo=new People();
	echo $peo;
?>