<?php
/*	$host="localhost";
	$uname="root";
	$pwd="";
	$db="voting";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	 
	*/	
	 include 'dbconnect.php';
	 
	$num=$_REQUEST['num'];
	$text=$_REQUEST['text'];

	$flag['code']=0;

	if($r=mysql_query("insert into msgs values('$num','$text')",$conn))
	{
		$flag['code']=1;
		echo"hi";
	}

	print(json_encode($flag));
	//mysql_close($con);
	header("Location: count.php?num=$num&text=$text");
	
	 
?>