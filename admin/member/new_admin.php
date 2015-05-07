
<?php
	
	error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	@mysql_select_db("part_time", $con); 
	mysql_query("set names GBK");
	$name = $_POST['adminName'];
	$psw= $_POST['password'];	
	$sex =  $_POST['sex']; 
	$email =  $_POST['email'];
	$telephone = $_POST['telephone']; 
	$adminnb =  $_POST['adminNumber']; 
	$adminimg = $_POST['adminImage'];
	$sql = "insert into pt_admin(password,email,adminName,sex,telephone,adminNumber,adminImage) values ('$psw','$email','$name','$sex','$telephone','$adminnb','$adminimg')";
	mysql_query($sql);
	$sql1 = "SELECT * FROM pt_admin";
	$result = mysql_query($sql1); //执行SQL语句，获得结果集 
	mysql_close($con);
	?>
