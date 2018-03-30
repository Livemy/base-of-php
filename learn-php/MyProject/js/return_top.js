window.onload=function(){
	
	var btn=document.getElementById("btn");
	var timer;
	var isTop=true;
	//获取页面可视化区域高度
	var clientHeight=document.documentElement.clientHeight;
	
	window.onscroll=function(){
		
		//获取滚动条到顶部的距离
		var osTop=document.documentElement.scrollTop;
		if(osTop>=clientHeight){
			btn.style.display="block";
		}else{
			btn.style.display="none";
		}
		
		if(!isTop){
			clearInterval(timer);
		}
		isTop=false;
	}
	
	btn.onclick=function(){
		
		//设置定时器
		timer=setInterval(function(){
			
			//获取滚动条到顶部的距离
			var osTop=document.documentElement.scrollTop;
			//设置滚动速度
			var speed=Math.floor(-osTop/6);
			//实现向上滚动（即滚动条到顶部距离的 减少）
			document.documentElement.scrollTop=osTop+speed;
			
			isTop=true;
			
			//清除定时器应该在这里清除，放在外面的话会出错
			if(osTop==0){
				clearInterval(timer);
			}
		},50);
	}
	
}
