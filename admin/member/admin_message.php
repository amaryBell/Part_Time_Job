<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>管理员管理界面</title>
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/demo/demo.css">
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.min.js"></script>
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" >
	 var url;
        var type;
        function newAdmin() {
            $("#dlg").dialog("open").dialog('setTitle', '新建信息'); 
            $("#fm").form("clear");
            url = "new_admin.php";
            document.getElementById("hidtype").value="submit";
        }
        function editAdmin() {
            var row = $("#dg").datagrid("getSelected");
			
            if (row) {
                $("#dlg").dialog("open").dialog('setTitle', '编辑信息');
				
                $("#fm").form("load", row);
                var url = "edit_admin.php?id=" + row.adminID;
				
				$("#fm").form("submit", {
                url: url,
                onsubmit: function () {
                    return $(this).form("validate");
                },
				success: function () {	   
                }
				
            });
				console.log(url);
            }
        }
        function saveAdmin() {
            $("#fm").form("submit", {
                url: url,
                onsubmit: function () {
                    return $(this).form("validate");
                },
				success: function () {
				   location.reload(url);				   
                }
            });
        }
		
 		function deleteAdmin(){
		var url = "delete_admin.php";
		var selectedRows=$("#dg").datagrid('getSelections');
		if(selectedRows.length==0){
			$.messager.alert("系统提示","请选择要删除的数据！");
			return;
		}
		var strIds=[];
		for(var i=0;i<selectedRows.length;i++){
			strIds.push(selectedRows[i].userID);
		}
		var ids=strIds.join(",");
		$.messager.confirm("系统提示","您确认要删掉这<font color=red>"+selectedRows.length+"</font>条数据吗？",function(r){
			if(r){
				$.post("delete_admin.php",{ids:ids},function(result){
					if(result.success){
						$.messager.alert("系统提示","数据已成功删除！");
						$("#dg").datagrid("reload");
					}else{
						$.messager.alert('系统提示',result.errorMsg);
					}
						
				},"json");
				location.reload(url);
			}
			
		});
	}
	</script>

</head>
<body>

<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = mysql_connect("localhost","root","");
	/* localhost 是服务器 root 是用户名 abc123 是密码*/ 
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	/* 这就是一个逻辑非判断，如果错误就输出括号里的字符串 */ 
	@mysql_select_db("part_time", $con); 
	mysql_query("set names GBK");
	/* 选择mysql服务器里的一pt_user"; 
	/* 定义变量sql, "SELECT * FROM qq" 是SQL指令，表示选取表qq中的数据 */ 
	$sql = "SELECT * FROM pt_admin";
	$result = mysql_query($sql); //执行SQL语句，获得结果集 
?>



<table id="dg" title="管理员信息管理" class="easyui-datagrid" style="width:auto;height:auto"
        url="#" toolbar="#toolbar" pagination="true" rownumbers="true"
        fitcolumns="true" singleselect="true">
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-add" onclick="newAdmin()"
				plain="true">添加</a> <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-edit"
                onclick="editAdmin()" plain="true">修改</a> <a href="javascript:void(0)" class="easyui-linkbutton"
                iconcls="icon-remove"  onclick="deleteAdmin()" plain="true">删除</a>
		</div>
	<thead>
		<tr>
			<th field="ck" checkbox="true"></th>
			<th field="adminName" width="70">姓名</th>
			<th field="password" width="70">密码</th>
			<th field="sex" width="70">性别</th>
			<th field="email" width="70">邮箱</th>
			<th field="telephone" width="70">电话</th>
			<th field="adminNumber" width="70">帐号</th>
			<th field="adminImage" width="70">照片</th>
		</tr>
	</thead>
	
	<?php
	/*下面就是选择性的输出打印了，由于不清楚你的具体情况给你个表格打印吧*/
	//打印表格 
	while( $row = mysql_fetch_array($result) )
	/*逐行获取结果集中的记录，得到数组row */
	{  
		/*数组row的下标对应着数据库中的字段值 */
		
		$name = $row['adminName']; 
		$psw = $row['password']; 
		$sex = $row['sex']; 
		$email = $row['email']; 
		$telephone = $row['telephone']; 
		$adminnb = $row['adminNumber']; 
		$adminimg = $row['adminImage']; 
		
		echo "<tr>"; 
		echo "<td></td>"; 
		echo "<td>$name</td>"; 
		echo "<td>$psw</td>"; 
		echo "<td>$sex</td>"; 
		echo "<td>$email</td>"; 
		echo "<td>$telephone</td>"; 
		echo "<td>$adminnb</td>";
		echo "<td>$adminimg</td>";
		echo "</tr>"; 
	} 
	?>
		
	
</table>
<div id="dlg" class="easyui-dialog" style="width: 300px; height: 280px; padding: 10px 20px;"
       closed="true" buttons="#dlg-buttons"> 

        <form id="fm" method="post"  align="center" >
		<input name="userID" type="hidden">
       <div class="fitem"> 
           <label> 
               姓名 
           </label> 
           <input name="adminName" class="easyui-validatebox" required="true" /> 
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
               电话</label> 
           <input name="telephone" class="easyui-vlidatebox" /> 
       </div>
       <div class="fitem"> 
           <label> 
               帐号</label> 
           <input name="adminNumber" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               照片</label> 
           <input name="adminImage" class="easyui-vlidatebox" /> 
       </div>
       <input type="hidden" name="action" id="hidtype" /> 
       <input type="hidden" name="ID" id="Nameid" /> 
       </form> 
   </div>
<div id="dlg-buttons"> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="saveAdmin()" iconcls="icon-save">保存</a> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#dlg').dialog('close')"
            iconcls="icon-cancel">取消</a> 
    </div> 
<br>

</body>
</html>
</html>