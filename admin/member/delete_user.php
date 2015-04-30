
<?php
	
	error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	 $id= $_POST['userID'];
	@mysql_select_db("part_time", $con); 
	mysql_query("set names GBK");
	$sql = "delete from pt_user where userID=$id";
	mysql_query($sql);
	$sql1 = "SELECT * FROM pt_user";
	$result = mysql_query($sql1); //执行SQL语句，获得结果集 
	mysql_close($con);
	?>
