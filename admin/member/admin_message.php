<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>Test</title>
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
            url = "UserMessage.php";
            document.getElementById("hidtype").value="submit";
        }
        function edituser() {
            var row = $("#dg").datagrid("getSelected");
            if (row) {
                $("#dlg").dialog("open").dialog('setTitle', '�༭��Ϣ');
                $("#fm").form("load", row);
                url = "UserMessage.php?id=" + row.UserID;
            }
        }
        function saveuser() {
            $("#fm").form("submit", {
                url: url,
                onsubmit: function () {
                    return $(this).form("validate");
                },
                success: function (result) {
                    if (result == "1") {
                        $.messager.alert("��ʾ��Ϣ", "�����ɹ�");
                        $("#dlg").dialog("close");
                        $("#dg").datagrid("load");
                    }
                    else {
                        $.messager.alert("��ʾ��Ϣ", "����ʧ��");
                    }
                }
            });
        }
        function destroyUser() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('ɾ����Ϣ', '��ȷ��Ҫɾ����Ϣ��?', function (r) {
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
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con = mysql_connect("localhost","root","");
	/* localhost �Ƿ����� root ���û��� abc123 ������*/ 
	if (!$con)
	 {
	 die("���ݿ����������ʧ��");
	 }
	/* �����һ���߼����жϣ��������������������ַ��� */ 
	@mysql_select_db("part_time", $con); 
	/* ѡ��mysql���������һpt_user"; 
	/* �������sql, "SELECT * FROM qq" ��SQLָ���ʾѡȡ��qq�е����� */ 
	$sql = "SELECT * FROM pt_admin";
	$result = mysql_query($sql); //ִ��SQL��䣬��ý���� 
?>



<table id="dg" title="�û���Ϣ����" class="easyui-datagrid" style="width:auto;height:auto"
        url="#" toolbar="#toolbar" pagination="true" rownumbers="true"
        fitcolumns="true" singleselect="true">
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-add" onclick="newuser()"
				plain="true">����</a> <a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-edit"
                onclick="edituser()" plain="true">�޸�</a> <a href="javascript:void(0)" class="easyui-linkbutton"
                iconcls="icon-remove"  onclick="destroyUser()" plain="true">ɾ��</a>
		</div>
	<thead>
		<tr>
			<th field="AdminName" width="70">����</th>
			<th field="PassWord" width="70">����</th>
			<th field="Sex" width="70">�Ա�</th>
			<th field="Email" width="70">����</th>
			<th field="Telephone" width="70">�绰</th>
			<th field="AdminNumber" width="70">�ʺ�</th>
		</tr>
	</thead>
	
	<?php
	/*�������ѡ���Ե������ӡ�ˣ����ڲ������ľ����������������ӡ��*/
	//��ӡ���� 
	while( $row = mysql_fetch_array($result) )
	/*���л�ȡ������еļ�¼���õ�����row */
	{  
		/*����row���±��Ӧ�����ݿ��е��ֶ�ֵ */
		$name = $row['AdminName']; 
		$psw = $row['PassWord']; 
		$sex = $row['Sex']; 
		$email = $row['Email']; 
		$telephone = $row['Telephone']; 
		$adminnb = $row['AdminNumber']; 
		
		echo "<tr>"; 
		echo "<td>$name</td>"; 
		echo "<td>$psw</td>"; 
		echo "<td>$sex</td>"; 
		echo "<td>$email</td>"; 
		echo "<td>$telephone</td>"; 
		echo "<td>$adminnb</td>";
		echo "</tr>"; 
	} 
	?>
		
	
</table>
<div id="dlg" class="easyui-dialog" style="width: 300px; height: 280px; padding: 10px 20px;"
       closed="true" buttons="#dlg-buttons"> 

       <form id="fm" method="post"  align="center" > 
       <div class="fitem"> 
           <label> 
               ���� 
           </label> 
           <input name="AccountCode" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               ����</label> 
           <input name="AccountName" class="easyui-validatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               �Ա�</label> 
           <input name="AccountPwd" class="easyui-validatebox" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               ����</label> 
           <input name="CreateTime" class="easyui-vlidatebox" required="true" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               �绰</label> 
           <input name="CreateName" class="easyui-vlidatebox" /> 
       </div>
		<div class="fitem"> 
           <label> 
               ����</label> 
           <input name="CreateTime" class="easyui-vlidatebox" /> 
       </div> 
       <div class="fitem"> 
           <label> 
               �ʺ�</label> 
           <input name="CreateName" class="easyui-vlidatebox" /> 
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