<?php
$dbhost = 'mysql3.000webhost.com';
$dbuser = 'a8017729_root';
$dbpass = 'root1234';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}


$db = mysql_select_db("a8017729_voting", $conn)
		or die("Could not select database");
//echo "db connected  ";
//echo $db; 
?>