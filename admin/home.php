<!DOCTYPE html>
<html>
<head>
	<meta charset="GBK">
	<title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.3.5/demo/demo.css">
	<script type="text/javascript" src="jquery-easyui-1.3.5/jquery.min.js"></script>
	<script type="text/javascript" src="jquery-easyui-1.3.5/jquery.easyui.min.js"></script>
	
	<script type="text/javascript" >
		
		
	var url;
	// 打开新标签
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
				<font>&nbsp;&nbsp;<strong>欢迎：</strong>管理员</font>
			</td>
		</tr>
	</table>
</div>
<div region="center">
	<div class="easyui-tabs" fit="true" border="false" id="tabs">
		<div title="首页" data-options="iconCls:'icon-home'">
			<div align="center" style="padding-top: 100px"><h2>欢迎使用校园兼职网后台管理系统</h2></div>
		</div>
	</div>
</div>

<div region="west" style="width: 200px" title="导航菜单" split="true">
<div class="easyui-accordion" data-options="fit:true,border:false">
		<div title="人员管理" data-options="selected:true,iconCls:'icon-user'" style="padding: 10px">
			<a href="javascript:openTab('权限管理','../member/user_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">权限管理</a>
			<a href="javascript:openTab('用户信息','../member/user_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">用户信息</a>
			<a href="javascript:openTab('企业信息','../member/company_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">企业信息</a>
			<a href="javascript:openTab('管理员信息','../member/admin_message.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">管理员信息</a>
		</div>
		<div title="信息管理" data-options="iconCls:'icon-comment'" style="padding:10px">
			<a href="javascript:openTab('新闻动态','../news/news.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">新闻动态</a>
		</div>
		<div title="兼职信息管理" data-options="iconCls:'icon-comment'" style="padding:10px">
			<a href="javascript:openTab('类别管理','../partInfo/category.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">类别管理</a>
			<a href="javascript:openTab('简历管理','../partInfo/resume.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">简历管理</a>
			<a href="javascript:openTab('兼职信息','../partInfo/information.php','icon-user')" class="easyui-linkbutton" data-options="plain:true,iconCls:'icon-manage'" style="width: 150px;">兼职信息</a>
		</div>
	</div>
</div>


<div region="south" style="height: 40px;padding: 5px;" align="center">
	版权所有 中山大学南方学院电软系计算机零点阳光<br>
	2015-2020
</div>
</body>
</html>
