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
        function edituser() {
            var row = $("#dg").datagrid("getSelected");
			
            if (row) {
                $("#dlg").dialog("open").dialog('setTitle', '�༭��Ϣ');
				
                $("#fm").form("load", row);
                var url = "edit_user.php?id=" + row.userID;
				
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
        function saveuser() {
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
		
 		function deleteUser(){
		var url = "delete_user.php";
		var selectedRows=$("#dg").datagrid('getSelections');
		if(selectedRows.length==0){
			$.messager.alert("ϵͳ��ʾ","��ѡ��Ҫɾ�������ݣ�");
			return;
		}
		var strIds=[];
		for(var i=0;i<selectedRows.length;i++){
			strIds.push(selectedRows[i].userID);
		}
		var ids=strIds.join(",");
		$.messager.confirm("ϵͳ��ʾ","��ȷ��Ҫɾ����<font color=red>"+selectedRows.length+"</font>��������",function(r){
			if(r){
				$.post("delete_user.php",{ids:ids},function(result){
					if(result.success){
						$.messager.alert("ϵͳ��ʾ","�����ѳɹ�ɾ����");
						$("#dg").datagrid("reload");
					}else{
						$.messager.alert('ϵͳ��ʾ',result.errorMsg);
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
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-add" onclick="newuser()" plain="true">���</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-edit" onclick="edituser()" plain="true">�޸�</a> 
			<a href="javascript:void(0)" class="easyui-linkbutton" iconcls="icon-remove"  onclick="deleteUser()" plain="true">ɾ��</a>
		</div>
	<thead>
		<tr>
			<th field="ck" checkbox="true"></th>
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
		echo "<td></td>";
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
		<input name="userID" type="hidden">
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