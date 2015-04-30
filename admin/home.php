<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>��̨����</title>
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/demo/demo.css">
	<script type="text/javascript" src="jquery-easyui-1.3.5/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-easyui-1.3.5/jquery.easyui.min.js"></script>
	
	<script type="text/javascript" >
		
		
	var url;
	// ���±�ǩ
	function openTab(text, url, iconCls) {
		if ($("#tabs").tabs("exists", text)) {
			$("#tabs").tabs("select", text);
		} else {
			var content = "<iframe frameborder=0 scrolling='auto' style='width:100%;height:100%' src='${pageContext.request.contextPath}/" + url + "'></iframe>"
			$("#tabs").tabs("add", {
				title : text,
				iconCls : iconCls,
				closable : true,
				content : content
			});
		}
	}
	</script>
</head>
<body class="easyui-layout">
<div region="north" style="height: 85px;background-color: #E0ECFF">
	<table style="padding: 5px" width="100%">
		<tr>
			<td width="30%">
				<img src="images/logo1.png"/>
			</td>
			<td valign="bottom" align="right" width="50%">
				<font>&nbsp;&nbsp;<strong>��ӭ��</strong>����Ա</font>
			</td>
		</tr>
	</table>
</div>
<div region="center">
	<div class="easyui-tabs" fit="true" border="false" id="tabs">
		<div title="��ҳ" data-options="iconCls:'icon-home'">
			<div align="center" style="padding-top: 100px"><h2>��ӭʹ��У԰��ְ����̨����ϵͳ</h2></div>
		</div>
	</div>
</div>

<div region="west" style="width: 200px" title="�����˵�" split="true">
<div class="easyui-accordion" data-options="fit:true,border:false">
		<div title="��Ա����" data-options="selected:true,iconCls:'icon-user'" style="padding: 10px">
			<a href="javascript:openTab('Ȩ�޹���','../member/user_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">Ȩ�޹���</a>
			<a href="javascript:openTab('�û���Ϣ','../member/user_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">�û���Ϣ</a>
			<a href="javascript:openTab('��ҵ��Ϣ','../member/company_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">��ҵ��Ϣ</a>
			<a href="javascript:openTab('����Ա��Ϣ','../member/admin_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">����Ա��Ϣ</a>
		</div>
		<div title="��Ϣ����" data-options="iconCls:'icon-comment'" style="padding:10px">
			<a href="javascript:openTab('���Ŷ�̬','../news/news.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">���Ŷ�̬</a>
		</div>
		<div title="��ְ��Ϣ����" data-options="iconCls:'icon-comment'" style="padding:10px">
			<a href="javascript:openTab('������','../partInfo/category.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">������</a>
			<a href="javascript:openTab('��������','../partInfo/resume.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">��������</a>
			<a href="javascript:openTab('��ְ��Ϣ','../partInfo/information.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">��ְ��Ϣ</a>
		</div>
	</div>
</div>


<div region="south" style="height: 40px;padding: 5px;" align="center">
	��Ȩ���� ��ɽ��ѧ�Ϸ�ѧԺ����ϵ������������<br>
	2015-2020
</div>
</body>
</html>
