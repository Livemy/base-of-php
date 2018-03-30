<?php
	#"::"这个特别强大的操作符
	#怎么感觉php中面向对象的内容和C++中的面向对象的内容是一样的，真是神奇
	class Car{
		const name="别克系列";
		public function bigType(){
			echo '父类:'.Car::name; //调用Car类中的常量
		}
	}
	class SmallCar extends Car{
		const name="别克君威";
		public function smallType(){
			echo parent::bigType()."\t"; //调用父类中的方法
			echo '子类：'.self::name; //调用当前类中的常量
		}
	}
	$car=new SmallCar();
	$car->smallType();
?>