$(function(){

	//获取我们网页中的表格，为了方便后面将数据加入到表格之中
	var g_table=$("table.data");
	var init_data_url="data.php?action=init_data_list";
	$.get(init_data_url,function(data){
		//这是jQuery封装的Ajax之get方法调用数据
		// alert(data);
		
		// js将我们所获取的数据用一行一行的表格显示出来
		// debugger;这个是用来调试的断点
		var row_items=$.parseJSON(data);
		for(var i=0,j=row_items.length;i<j;i++){
			//只所以这样写，是因为在某些浏览器里面不仅会便利数组的长度，也会遍历数组里的方法
			var data_dom=create_row(row_items[i]);
			g_table.append(data_dom);//将所创建的行追加到我们的表格之中
		}


	});


	//删除功能
	function delHandler(){
		var meButton=$(this);
		var data_id=$(this).attr("dataid");
		$.post("data.php?action=del_row",{dataid:data_id},function(res){
			if("ok"==res){
				//删除当前行
				$(meButton).parent().parent().remove();

			}else{
				alert("删除失败");
			}
		})
	}

	//编辑功能
	function editHandler(){
		var meButton=$(this);
		var data_id=$(this).attr("dataid");

		//这是我们要编辑的当前行
		//此时当前行并没有事件，我们我们需要重新为这一行绑定事件
		var meRow=$(this).parent().parent();

		//编辑行
		var editRow=$("<tr></tr>");
		for(var i=0;i<8;i++){
			var editTd=$("<td><input type='text' class='txtField' /></td>");
			var v=meRow.find('td:eq('+i+')').html();
			editTd.find('input').val(v);
			editRow.append(editTd);
		}

		var opt_td=$("<td></td>");//操作列
		//保存键及其功能
		var saveBtn=$("<a href='javascript:;' class='optLink'>保存&nbsp;</a>");
		saveBtn.click(function(){
			var currentRow=$(this).parent().parent();
			var input_fields=currentRow.find("input");
			var post_fields={};//保存所要发给php的数据
			for(var i=0,j=input_fields.length;i<j;i++){
				post_fields['col_'+i]=input_fields[i].value;
				//这里用的是value而不是val（）方法取值是应为input_fields[i]已经是一个普通的html对象了
			}
			post_fields['id']=data_id;
			$.post("data.php?action=edit_row",post_fields,function(res){
				if(res=="ok"){
					//新建数据行替换当前行，实现更新数据后的页面刷新
					var newUpdateRow=create_row(post_fields);
					currentRow.replaceWith(newUpdateRow);
				}else{
					alert("数据更新失败");
				}
			})
		})
		//取消键及其功能
		var cancelBtn = $("<a href='javascript:;' class='optLink'>取消&nbsp;</a>");
		cancelBtn.click(function(){
			var currentRow=$(this).parent().parent();
			//注意；当前行依旧没用事件，所以我们仍然需要为其绑定事件
			meRow.find('a:eq(0)').click(delHandler);
			meRow.find('a:eq(1)').click(editHandler);
			// debugger;
			currentRow.replaceWith(meRow);
		})

		opt_td.append(saveBtn);
		opt_td.append(cancelBtn);
		editRow.append(opt_td);

		// debugger;
		//用编辑行替换当前行
		meRow.replaceWith(editRow);

	}

	//我们将创建行封装成一个函数，传入的是所查询到的一行sql结果
	function create_row(data_item){
		// debugger;
		var row_obj=$("<tr></tr>");
		for(var k in data_item){
			//用索引循环数组
			if("id"!= k){
				//这个if判断是为了去除id列
				var col_td=$("<td></td>");
				col_td.html(data_item[k]);//将数据填入到相应的列之中
				row_obj.append(col_td);//将列添加到行中
			}
		}

		//删除按钮
		var delButton = $('<a class="optLink" href="javascript:;">删除&nbsp;</a>');
		delButton.attr("dataid",data_item['id']);//将数据的id值传入，以便后续删除语句的执行
		delButton.click(delHandler);

		//编辑按钮
		var editButton = $('<a class="optLink" href="javascript:;">编辑&nbsp;</a>');
		editButton.attr("dataid",data_item['id']);//将数据的id值传入，以便后续删除语句的执行
		editButton.click(editHandler);

		//将编辑和删除按钮添加到我们的新建行中
		var opt_td = $('<td></td>');
		opt_td.append(delButton);
		opt_td.append(editButton);

		//再将我们删除和编辑所在的列添加到我们的新建行中
		row_obj.append(opt_td);
		return row_obj;
	}

	//找到添加按钮，然后调用添加函数，进行数据的添加
	$("#addBtn").click(function(){
		//定义行
		var addRow=$("<tr></tr>");

		//添加8列到行中
		for(var i=0;i<8;i++){
			var col_td=$("<td><input type='text' class='txtField'/></td>");
			addRow.append(col_td);
		}

		//编辑列
		var col_opt=$("<td></td>");
		//确认键及其功能
		var confirmBtn=$("<a href='javascript:;' class='optLink'>确认&nbsp;</a>");
		confirmBtn.click(function(){
			//找到当前行，然后取出其中的值
			var currentRow=$(this).parent().parent();
			var input_fields=currentRow.find("input");//这是一个input数组，里面有8个列，分别存放着我们所写入的数据
			//我们要做的便是将input里面的数据分别对应的取出，然后发送到php中进行数据的数据库写入
			var post_fields={};//接受对象
			for(var i=0,j=input_fields.length;i<j;i++){
				//input_fields是一个jQuery对象，加了索引之后就变成了一个普通的对象
				post_fields['col_'+i]=input_fields[i].value;//这样就接收到了文本框数组
			}
			//然后将我们的数据发送给data.php
			$.post("data.php?action=add_row",post_fields,function(res){
				if(res>0){
					//利用先前所获取的输入数据新建一行create_row(post_fields)
					//然后利用jQuery的replace（）函数将输入行替换
					post_fields['id'] = res;
					var postAddRow = create_row(post_fields);//从这里可以看出，post_fields是一个长度为8的，索引为'col_i'的数组
					currentRow.replaceWith(postAddRow);
				}else{
					alert("插入失败");
				}
			})
		})
		//取消键及其功能
		var cancelBtn = $("<a href='javascript:;' class='optLink'>取消&nbsp;</a>");
		cancelBtn.click(function(){
			//同前面的删除功能是一样的，都是先将前端列给删除，只不过这里不用对数据库进行操作
			$(this).parent().parent().remove();
		})


		col_opt.append(confirmBtn);
		col_opt.append(cancelBtn);
		addRow.append(col_opt);
		//将新建的行添加到表格之中
		g_table.append(addRow);
	})

});
