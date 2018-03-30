
//通过id取得标题栏和内容栏,故可以先封装一个取id的函数
function $(id){
	return typeof id=='string'?document.getElementById(id):id;
}


window.onload=function(){
	
	//alert("aaa");
	var link=$('choose_link').getElementsByTagName('li');
	var con=$('content').getElementsByTagName("div");
	
	for(var i=0;i<link.length;i++){
		//遍历所有的菜单
		link[i].id=i; //为当前添加id属性
		link[i].onclick=function(){
//			alert(this.id); //测试有没有成功，this代表的即是当前点击的对象
            for(var j=0;j<con.length;j++){
            	con[j].classList.remove("current");
//				content[j].style.display="none";
//				console.log(content[j]);
            }
            con[this.id].classList.add("current");
//				content[this.id].style.display="block";
		}
	}
}

















