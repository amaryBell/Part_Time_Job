
	<!--error_reporting(E_ALL ^ E_DEPRECATED); //取消版本错误提示
	$con = mysql_connect("localhost","root","");
	/* localhost 是服务器 root 是用户名  是密码*/ 
	if (!$con)
	 {
	 die("数据库服务器连接失败");
	 }
	/* 这就是一个逻辑非判断，如果错误就输出括号里的字符串 */ 
	@mysql_select_db("part_time", $con); 
	/* 选择mysql服务器里的一pt_user"; */
    $sql="INSERT INTO pt_user (UserName, PassWord, Sex, Email, Address, Telephone, UserNumber)VALUES('$_POST[UserName]','$_POST[PassWord]','$_POST[Sex]','$_POST[Email]','$_POST[Address]','$_POST[Telephone]','$_POST[UserNumber]')";
	mysql_query($sql,$con);   //这里是添加数据。
   
	//读取数据
	$sql = "select * form pt_user";   //读取所有。
	//$sql = "select * form user_zy where id=".$id;   //读取某一项。
	$result = mysql_query($sql,$con);
	while($info = mysql_fetch_array($result)){
	$arr[] = $info; //$arr 为最后所要读取的值。
	var_dump($arr);
	}
	-->
	
<html>
<body>
<?php
	echo "你填写的资料是: ".$_POST['UserName'].",".$_POST['PassWord'];
	// $connect=mysql_connect("localhost","root","");
	// mysql_select_db("part_time", $connect);
	// $name = $_POST['UserName'];
	// $psw = $_POST['PassWord'];
	// mysql_query("insert into pt_user(UserName, PassWord) values("'.$name.'"','"'.$psw.'")";
	// $result = mysql_query($sql); //执行SQL语句，获得结果集 
	// mysql_close();
?>
</body>
</html>