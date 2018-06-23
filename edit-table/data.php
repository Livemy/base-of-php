<?php
	
	//简单的路由，根据传来的方法相应的选择要执行的函数
	$action = $_GET['action'];
	switch($action) {
		case 'init_data_list':
		init_data_list();
		break;
		case 'add_row':
			add_row();
			break;
		case 'del_row':
			del_row();
			break;
		case 'edit_row':
			edit_row();
			break;
	}

	function init_data_list(){
		$sql=" select * from e_table";
		$query=query_sql($sql);//函数返回值是sql语句查询所得到的结果集
		// var_dump($query);//该php函数用于打印变量的相应信息
		while($row = $query->fetch_assoc()){
			$data[] = $row;
		}
		echo json_encode($data);
	}


	//删除函数
	function del_row(){
		// echo "ok";
		// 获取数据的id
		$dataid=$_POST['dataid'];
		$sql="delete from e_table where id='$dataid';";
		if(query_sql($sql)){
			echo "ok";
		}else{
			echo "删除失败";
		}
	}


	//添加函数
	function add_row(){
		$sql="insert into e_table (c_a,c_b,c_c,c_d,c_e,c_f,c_g,c_h) values(";
		for($i=0;$i<8;$i++){
			$sql.="\"".$_POST['col_'.$i]."\",";
		}
		$sql=trim($sql,",");//去除逗号
		$sql.=");";
		// if(query_sql($sql)){
		// 	echo "ok";
		// }else{
		// 	echo "加入失败";
		// }
		// 为了将新加入的数据不刷新的展示再页面之上，我们需要对语句进行重新编写
		// 注意，query_sql()这个函数是可以接收多个参数的
		if($res = query_sql($sql,"SELECT LAST_INSERT_ID() as LD")){
			$d = $res->fetch_assoc();
			echo $d['LD'];
		} else {
			echo "db error ...";	
		}
	}



	//编辑函数
	function edit_row(){
		// var_dump($_POST);//查看具体信息，再回调的返回值（response）那里查看
		$id=$_POST['id'];
		unset($_POST['id']);//释放变量
		$sql="update e_table set ";
		for($i=0;$i<8;$i++){
			$sql.='c_'.chr(97+$i).'=\''.$_POST['col_'.$i].'\',';
			//这里有个小技巧：a的assoc码是97，自增加1是一次从b开始选到
		}
		$sql=trim($sql,",");
		$sql.=" where id='$id';";
		// echo $sql; //查看有无错误
		if(query_sql($sql)){
			echo "ok";
		}else{
			echo "db error ....";
		}
	}


	//封装的一个数据库连接函数，返回的是一个查询结果集
	function query_sql(){
		$mysqli = new mysqli("127.0.0.1", "root", "357159", "etable");
		$sqls = func_get_args();//php封装的参数获取函数，获取的是调用本函数时所传的形参（即我们所要执行的sql语句）
		//如果有多个sql语句，则会循环执行sql语句
		foreach($sqls as $s){
			$query = $mysqli->query($s);
		}
		$mysqli->close();
		return $query;
	} 

?>