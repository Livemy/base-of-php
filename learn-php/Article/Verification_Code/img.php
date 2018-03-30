<?php
	
	#验证码的制作
	
	//使用session来存储验证信息
	session_start();
	//通过imagecreatetruecolor($width,$height)函数来创建一个指定长宽的底图
	$width=100;
	$height=30;
	$image=imagecreatetruecolor(100, 30);
	//使用imagecolorallcate()方法做个白色填充,该方法默认是输出黑色
	$bg_color=imagecolorallocate($image, 255, 255, 255); //代表白色
	//再将其填充到我们的底图之中
	imagefill($image, 0, 0, $bg_color);
	$captch_code="";
	
	//实现数字验证码
	for($i=0;$i<4;$i++){
		//循环输出四个数字
		$fontsize=6;//字体的大小为6
		$fontcolor=imagecolorallocate($image, rand(0, 120), rand(0,120),rand(0,120));//定义字体的颜色
		//定义字母和数字的组合
		$data="abcdefghijklmnopqrstuvwxyz1234567890";
//		$fontcontent=rand(0,9);//定义数字体的取值范围
		$font_content=substr($data,rand(0, strlen($data)),1);
		$captch_code.="$font_content";
		$x=($i*100/4)+rand(5,10);
		$y=rand(5, 10);
		imagestring($image, $fontsize, $x, $y, $font_content, $fontcolor);
	}
	$_SESSION['code']=$captch_code;
	
	//增加干扰元素
//	for($i=0;$i<200;$i++){
//		$pointcolor=imagecolorallocate($image, rand(0,200), rand(0, 200), rand(0,200));
//		imagesetpixel($image, rand(1,99), rand(1, 29), $pointcolor);//该函数创建单一的点
//	}
	//增加线
	for($i=0;$i<8;$i++){
		$line_color=imagecolorallocate($image,rand(60, 220), rand(60, 220), rand(60, 220));
		imageline($image, rand(1, 99), rand(1, 29),rand(1,99),rand(1,29), $line_color);
		//该内置函数是用来创建线的
//		imageline($image, $x1, $y1, $x2, $y2, $color);
	}
	
	
	//用php的header（）方法表名输出内容的格式为png
	header('content-type:image/png');
	imagepng($image);//显示图片
	//然后销毁图片以便于系统资源的回收
	imagedestroy($image);
?>