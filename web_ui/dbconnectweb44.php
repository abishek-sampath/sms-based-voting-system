<?php
$dbhost = 'mysql1.000webhost.com';
$dbuser = 'a4576128_root';
$dbpass = 'root1234';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$db = mysql_select_db("a4576128_voting", $conn)
		or die("Could not select database");
//echo "db connected  ";
//echo $db; 
?>