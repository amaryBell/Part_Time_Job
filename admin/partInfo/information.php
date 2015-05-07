<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>兼职信息管理</title>
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
            url = "newuser.php";
            document.getElementById("hidtype").value="submit";
        }
        function edituser() {
            var row = $("#dg").datagrid("getSelected");
            if (row) {
                $("#dlg").dialog("open").dialog('setTitle', '编辑信息');
                $("#fm").form("load", row);
                url = "edituser.php?id=" + row.UserID;
            }
        }
        function saveuser() {
            $("#fm").form("submit", {
                url: url,
                onsubmit: function () {
                    return $(this).form("validate");
                },
                // success: function (result) {
                    // if (result == "1") {
                        // $.messager.alert("提示信息", "操作成功");
                       // $("#dlg").dialog("close");
                       // $("#dg").datagrid("load");
                    // }
                   // else {
                       // $.messager.alert("提示信息", "操作失败");
                   // }
                // }
				success: function () {
				   $.messager.alert("提示信息", "操作成功");
				   $('#dlg').dialog("close");
				   //$('#dg').datagrid("reload");
				   location.reload(url);
                }
            });
        }
        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('删除信息', '您确定要删除信息吗?', function (r) {
                    if (r) {
                        $.post('destroy_user.php', { id: row.UserID }, function (result) {
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
	$sql = "SELECT * FROM pt_information";
	$result = mysql_query($sql); //执行SQL语句，获得结果集 
	mysql_close($con);
?>

<table id="dg" title="用户信息管理" class="easyui-datagrid" style="width:auto;height:auto"
        url="#" toolbar="#toolbar" pagination="true" rownumbers="true"
        fitcolumns="true" singleselect="true">
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-add" onclick="newuser()" plain="true">添加</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-edit" onclick="edituser()" plain="true">修改</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-remove"  onclick="destroyUser()" plain="true">删除</a>
		</div>
	<thead>
		<tr>
			<th field="ck" checkbox="true"></th>
			<th field="author" width="70">作者</th>
			<th field="title" width="70">标题</th>
			<th field="content" width="70">内容</th>
			<th field="publishtime" width="70">发布时间</th>
			<th field="confirmtime" width="70">确定时间</th>
			<th field="categoryID" width="70">类别号</th>
		</tr>
	</thead>
	
<?php
	//下面就是选择性的输出打印了,打印表格 
	while( $row = mysql_fetch_array($result) )
	/*逐行获取结果集中的记录，得到数组row */
	{  
		/*数组row的下标对应着数据库中的字段值 */
		$author = $row['author']; 
		$title = $row['title']; 
		$content = $row['content']; 
		$pubtime = $row['publishtime']; 
		$contime = $row['confirmtime'];
		$cateID = $row['categoryID'];
		
		echo "<tr>"; 
		echo "<td>$author</td>"; 
		echo "<td>$title</td>"; 
		echo "<td>$content</td>"; 
		echo "<td>$pubtime</td>"; 
		echo "<td>$contime</td>"; 
		echo "<td>$cateID</td>";
		echo "</tr>"; 
	} 
?>
</table>
<div id="dlg" class="easyui-dialog" style="width: 300px; height: 250px; padding: 10px 20px;"
       closed="true" buttons="#dlg-buttons"> 

       <form id="fm" method="post"  align="center" > 
       <div class="fitem"> 
           <label> 
               作者 
           </label> 
           <input name="author" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               标题</label> 
           <input name="title" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               内容</label> 
           <input name="content" class="easyui-validatebox" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               发布时间</label> 
           <input name="publishtime" class="easyui-vlidatebox" required="true" /> 
       </div> 
		<div class="fitem"> 
           <label> 
               确定时间</label> 
           <input name="confirmtime" class="easyui-vlidatebox" /> 
       </div>
       <div class="fitem"> 
           <label> 
               类别号</label> 
           <input name="categoryID" class="easyui-vlidatebox" /> 
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