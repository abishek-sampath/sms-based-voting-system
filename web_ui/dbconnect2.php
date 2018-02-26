<?php
	
	$dbhost='localhost';
	$dbuser='root';
	$dbpassword='';
	
	$conn= mysql_connect($dbhost,$dbuser,$dbpassword);
	
	if(!$conn)
	{
		die('could not connect: '.mysql_error());
	}
	else
	{
		$db = mysql_select_db('voting',$conn)
			or die('could not connect to database');
	}

?>