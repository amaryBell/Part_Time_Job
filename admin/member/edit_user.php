
<?php
	
	error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	@mysql_select_db("part_time", $con); 
	mysql_query("set names GBK");
	$id = $_POST['userID'];
	$name = $_POST['userName'];
	$psw= $_POST['password'];	
	$sex =  $_POST['sex']; 
	$email =  $_POST['email']; 
	$addr = $_POST['address']; 
	$telephone = $_POST['telephone']; 
	$usernb =  $_POST['userNumber']; 
	$userimg = $_POST['userImage'];
	$sql = "update pt_user set userName='$name',password='$psw',sex='$sex',email='$email',address='$addr',telephone='$telephone',userNumber='$usernb',userImage='$userimg' where userID=$id";
	var_dump($sql);
	//exit();
	
	mysql_query($sql);
	$sql1 = "SELECT * FROM pt_user";
	$result = mysql_query($sql1); //执行SQL语句，获得结果集 
	mysql_close($con);
	?>
