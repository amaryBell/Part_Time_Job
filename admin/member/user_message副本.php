<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>�û��������</title>
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../jquery-easyui-1.3.5/demo/demo.css">
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.min.js"></script>
	<script type="text/javascript" src="../jquery-easyui-1.3.5/jquery.easyui.min.js"></script>
	<script type="text/javascript" >
	 var url;
        var type;
        function newuser() {
            $("#dlg").dialog("open").dialog('setTitle', '�½���Ϣ'); 
            $("#fm").form("clear");
            url = "new_user.php";
            document.getElementById("hidtype").value="submit";
        }

        function edituser(){
		var selectedRows=$("#dg").datagrid('getSelections');  
		if(selectedRows.length!=1){
			$.messager.alert("ϵͳ��ʾ","��ѡ��һ��Ҫ�༭�����ݣ�");
			return;
		}
		var row=selectedRows[0];
		$("#dlg").dialog("open").dialog("setTitle","�༭�û���Ϣ");
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
					$.messager.confirm("ϵͳ��ʾ","����ɹ�,�Ƿ�ˢ��ҳ�棿",function(r){
						if(r){
							//resetValue();
							$("#dlg").dialog("close");
							location.reload("user_massage.php");
						}
					});
				}else{
					$.messager.alert("ϵͳ��ʾ","����ʧ��");
					return;
				}
			}
		});
	}
        function deleteuser() {
            //var row = $('#dg').datagrid('getSelected');
			var selectedRows=$("#dg").datagrid('getSelections');
			if(selectedRows.length==0){
			$.messager.alert("ϵͳ��ʾ","��ѡ��Ҫɾ�������ݣ�");
			return;
			}
            if (row) {
                $.messager.confirm('ɾ����Ϣ', '��ȷ��Ҫɾ����Ϣ��?', function (r) {
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
			// $.messager.alert("ϵͳ��ʾ","��ѡ��Ҫɾ�������ݣ�");
			// return;
		// }
		// var strIds=[];
		// for(var i=0;i<selectedRows.length;i++){
			// strIds.push(selectedRows[i].userID);
		// }
		// var ids=strIds.join(",");
		// $.messager.confirm("ϵͳ��ʾ","��ȷ��Ҫɾ����<font color=red>"+selectedRows.length+"</font>��������",function(r){
			// if(r){
				// $.post("delete_user.php",{ids:ids},function(result){
					// if(result.success){
						// $.messager.alert("ϵͳ��ʾ","�����ѳɹ�ɾ����");
						// $("#dg").datagrid("reload");
					// }else{
						// $.messager.alert('ϵͳ��ʾ',result.errorMsg);
					// }
				// },"json");
			// }
		// });
	// }
	</script>

</head>
<body>

<?php
	error_reporting(E_ALL ^ E_DEPRECATED); //ȡ���汾������ʾ
	$con = mysql_connect("localhost","root","");
	/* localhost �Ƿ����� root ���û���  ������*/ 
	if (!$con)
	 {
	 die("���ݿ����������ʧ��");
	 }
	/* �����һ���߼����жϣ��������������������ַ��� */ 
	@mysql_select_db("part_time", $con);
	mysql_query("set names GBK");	
	/* ѡ��mysql���������һpt_user"; 
	/* �������sql, "SELECT * FROM pt_user" ��SQLָ���ʾѡȡ��qq�е����� */ 
	$sql = "SELECT * FROM pt_user";
	$result = mysql_query($sql); //ִ��SQL��䣬��ý���� 
	mysql_close($con);
?>

<table id="dg" title="�û���Ϣ����" class="easyui-datagrid" style="width:auto;height:auto"
        url="#" toolbar="#toolbar" pagination="true" rownumbers="true"
        fitcolumns="true" singleselect="true">
		<div id="toolbar">
			<a href="javascript:newuser()" class="easyui-linkbutton" iconcls="icon-add" plain="true">���</a> 
			<a href="javascript:edituser()" class="easyui-linkbutton" iconcls="icon-edit" plain="true">�޸�</a> 
			<a href="javascript:deleteuser()" class="easyui-linkbutton" iconcls="icon-remove" plain="true">ɾ��</a>
		</div>
	<thead>
		<tr>
			<th field="userID" width="70">���</th>
			<th field="userName" width="70">����</th>
			<th field="password" width="70">����</th>
			<th field="sex" width="70">�Ա�</th>
			<th field="email" width="70">����</th>
			<th field="address" width="70">��ַ</th>
			<th field="telephone" width="70">�绰</th>
			<th field="userNumber" width="70">�ʺ�</th>
			<th field="userImage" width="70">��Ƭ</th>
		</tr>
	</thead>
	
<?php
	//�������ѡ���Ե������ӡ��,��ӡ��� 
	while( $row = mysql_fetch_array($result) )
	/*���л�ȡ������еļ�¼���õ�����row */
	{  
		/*����row���±��Ӧ�����ݿ��е��ֶ�ֵ */
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
               ���� 
           </label> 
           <input name="userName" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               ����</label> 
           <input name="password" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               �Ա�</label> 
           <input name="sex" class="easyui-validatebox" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               ����</label> 
           <input name="email" class="easyui-vlidatebox" required="true" /> 
       </div> 
		<div class="fitem"> 
           <label> 
               ��ַ</label> 
           <input name="address" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               �绰</label> 
           <input name="telephone" class="easyui-vlidatebox" /> 
       </div>
       <div class="fitem"> 
           <label> 
               �ʺ�</label> 
           <input name="userNumber" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               ��Ƭ</label> 
           <input name="userImage" class="easyui-vlidatebox" /> 
       </div>
       <input type="hidden" name="action" id="hidtype" /> 
       <input type="hidden" name="ID" id="Nameid" /> 
       </form> 
   </div>
<div id="dlg-buttons"> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="saveuser()" iconcls="icon-save">����</a> 
        <a href="javascript:void(0)" class="easyui-linkbutton" onclick="javascript:$('#dlg').dialog('close')"
            iconcls="icon-cancel">ȡ��</a> 
</div> 
<br>

</body>
</html>
</html>