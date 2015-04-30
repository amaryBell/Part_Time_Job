<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>用户管理界面</title>
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/demo/demo.css">
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.min.js"></script>
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" >
	 var url;
        var type;
        function newuser() {
            $("#dlg").dialog("open").dialog('setTitle', '新建信息'); 
            $("#fm").form("clear");
            url = "new_user.php";
            document.getElementById("hidtype").value="submit";
        }

        function edituser(){
		var selectedRows=$("#dg").datagrid('getSelections');  
		if(selectedRows.length!=1){
			$.messager.alert("系统提示","请选择一条要编辑的数据！");
			return;
		}
		var row=selectedRows[0];
		$("#dlg").dialog("open").dialog("setTitle","编辑用户信息");
		$("#userName").val(row.userName);
		$("#password").val(row.password);
		$("#sex").val(row.sex);
		$("#email").val(row.email);
		$("#address").val(row.address);
		$("#telephone").val(row.telephone);
		$("#userNumber").val(row.userNumber);
		$("#userImage").val(row.userImage);
		$("#hide").hide();
		url="User_update?userName="+row.userName;
	}
function saveuser(){
		$("#fm").form("submit",{
			url:url,
			onSubmit:function(){
				return $(this).form("validate");
			},
			success:function(result){
				if(result){
					$.messager.confirm("系统提示","保存成功,是否刷新页面？",function(r){
						if(r){
							//resetValue();
							$("#dlg").dialog("close");
							location.reload("user_massage.php");
						}
					});
				}else{
					$.messager.alert("系统提示","保存失败");
					return;
				}
			}
		});
	}
        function deleteuser() {
            //var row = $('#dg').datagrid('getSelected');
			var selectedRows=$("#dg").datagrid('getSelections');
			if(selectedRows.length==0){
			$.messager.alert("系统提示","请选择要删除的数据！");
			return;
			}
            if (row) {
                $.messager.confirm('删除信息', '您确定要删除信息吗?', function (r) {
                    if (r) {
                        $.post('detete_user.php', { userID: row.userID }, function (result) {
                            if (result.success) {
                                $('#dg').datagrid('reload');    // reload the user data  
                            } else {
                                $.messager.show({   // show error message  
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }  
		
		
		// function deleteUser(){
		// var selectedRows=$("#dg").datagrid('getSelections');
		// if(selectedRows.length==0){
			// $.messager.alert("系统提示","请选择要删除的数据！");
			// return;
		// }
		// var strIds=[];
		// for(var i=0;i<selectedRows.length;i++){
			// strIds.push(selectedRows[i].userID);
		// }
		// var ids=strIds.join(",");
		// $.messager.confirm("系统提示","您确认要删掉这<font color=red>"+selectedRows.length+"</font>条数据吗？",function(r){
			// if(r){
				// $.post("delete_user.php",{ids:ids},function(result){
					// if(result.success){
						// $.messager.alert("系统提示","数据已成功删除！");
						// $("#dg").datagrid("reload");
					// }else{
						// $.messager.alert('系统提示',result.errorMsg);
					// }
				// },"json");
			// }
		// });
	// }
	</script>

</head>
<body>

<?php
	error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	/* localhost 是服务器 root 是用户名  是密码*/ 
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	/* 这就是一个逻辑非判断，如果错误就输出括号里的字符串 */ 
	@mysql_select_db("part_time", $con);
	mysql_query("set names GBK");	
	/* 选择mysql服务器里的一pt_user"; 
	/* 定义变量sql, "SELECT * FROM pt_user" 是SQL指令，表示选取表qq中的数据 */ 
	$sql = "SELECT * FROM pt_user";
	$result = mysql_query($sql); //执行SQL语句，获得结果集 
	mysql_close($con);
?>

<table id="dg" title="用户信息管理" class="easyui-datagrid" style="width:auto;height:auto"
        url="#" toolbar="#toolbar" pagination="true" rownumbers="true"
        fitcolumns="true" singleselect="true">
		<div id="toolbar">
			<a href="javascript:newuser()" class="easyui-linkbutton" iconcls="icon-add" plain="true">添加</a> 
			<a href="javascript:edituser()" class="easyui-linkbutton" iconcls="icon-edit" plain="true">修改</a> 
			<a href="javascript:deleteuser()" class="easyui-linkbutton" iconcls="icon-remove" plain="true">删除</a>
		</div>
	<thead>
		<tr>
			<th field="userID" width="70">编号</th>
			<th field="userName" width="70">姓名</th>
			<th field="password" width="70">密码</th>
			<th field="sex" width="70">性别</th>
			<th field="email" width="70">邮箱</th>
			<th field="address" width="70">地址</th>
			<th field="telephone" width="70">电话</th>
			<th field="userNumber" width="70">帐号</th>
			<th field="userImage" width="70">照片</th>
		</tr>
	</thead>
	
<?php
	//下面就是选择性的输出打印了,打印表格 
	while( $row = mysql_fetch_array($result) )
	/*逐行获取结果集中的记录，得到数组row */
	{  
		/*数组row的下标对应着数据库中的字段值 */
		$id = $row['userID']; 
		$name = $row['userName']; 
		$psw = $row['password']; 
		$sex = $row['sex']; 
		$email = $row['email']; 
		$addr = $row['address']; 
		$telephone = $row['telephone']; 
		$usernb = $row['userNumber'];
		$userimg = $row['userImage'];		
		
		echo "<tr>"; 
		echo "<td>$id</td>";
		echo "<td>$name</td>"; 
		echo "<td>$psw</td>"; 
		echo "<td>$sex</td>"; 
		echo "<td>$email</td>"; 
		echo "<td>$addr</td>"; 
		echo "<td>$telephone</td>"; 
		echo "<td>$usernb</td>";
		echo "<td>$userimg</td>";
		echo "</tr>"; 
	} 
?>
</table>
<div id="dlg" class="easyui-dialog" style="width: 300px; height: 250px; padding: 10px 20px;"
       closed="true" buttons="#dlg-buttons"> 

       <form id="fm" method="post"  align="center" > 
       <div class="fitem"> 
           <label> 
               姓名 
           </label> 
           <input name="userName" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               密码</label> 
           <input name="password" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               性别</label> 
           <input name="sex" class="easyui-validatebox" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               邮箱</label> 
           <input name="email" class="easyui-vlidatebox" required="true" /> 
       </div> 
		<div class="fitem"> 
           <label> 
               地址</label> 
           <input name="address" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               电话</label> 
           <input name="telephone" class="easyui-vlidatebox" /> 
       </div>
       <div class="fitem"> 
           <label> 
               帐号</label> 
           <input name="userNumber" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               照片</label> 
           <input name="userImage" class="easyui-vlidatebox" /> 
       </div>
       <input type="hidden" name="action" id="hidtype" /> 
       <input type="hidden" name="ID" id="Nameid" /> 
       </form> 
   </div>
<div id="dlg-buttons"> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="saveuser()" iconcls="icon-save">保存</a> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#dlg').dialog('close')"
            iconcls="icon-cancel">取消</a> 
</div> 
<br>

</body>
</html>
</html>