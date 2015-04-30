
<?php
	
	error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	@mysql_select_db("part_time", $con); 
	mysql_query("set names GBK");
	$name = $_POST['userName'];
	$psw= $_POST['password'];	
	$sex =  $_POST['sex']; 
	$email =  $_POST['email']; 
	$addr = $_POST['address']; 
	$telephone = $_POST['telephone']; 
	$usernb =  $_POST['userNumber']; 
	$sql = "insert into pt_user(userName,password,sex,email,address,telephone,userNumber) values ('$name','$psw','$sex','$email','$addr','$telephone','$usernb')";
	mysql_query($sql);
	$sql1 = "SELECT * FROM pt_user";
	$result = mysql_query($sql1); //执行SQL语句，获得结果集 
	mysql_close($con);
	?>
