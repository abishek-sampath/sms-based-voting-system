<?php
/*	$host="localhost";
	$uname="root";
	$pwd="";
	$db="voting";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	*/	
	 include 'dbconnect.php';
	 

	$flag=$_REQUEST['flag'];

	$flag['code']=0;

	if($r=mysql_query("update smssendflag set regioncidflag='$flag' ",$conn))
	{
		$flag['code']=1;
		echo"hi";
	}
	//mysql_close($con);
?>