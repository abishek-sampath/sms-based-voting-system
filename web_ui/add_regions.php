<html>
<head>

<?php include 'dbconnect.php';

if(isset($_POST['disp']))
{
	//include 'display.php';
	
	header("Location: display_regions.php");
}
if(isset($_POST['add']))
{

$rn =ucwords($_POST['rname']);
$rc = ucwords($_POST['rcode']);
$city = ucwords($_POST['city']);

 
echo $rn;
echo $rc;


$result=mysql_query("insert into regions values(0,'$rn','$rc','$city')");
echo $result;
echo "success";

}

?>

</head>

<title>ADD NEW REGIONS</title>



<body>
<P><H1>ADD REGIONS</H1></p>

<br><br>

<form method="POST" >

Region name: <input type="text" name="rname"/><br><br>
Region CODE: <input type="text" name="rcode"/><br><br>
City: <input type="text" name="city"/><br><br>
 
 
 
 <input type="submit" name="add" value="ADD NEW REGION"/>
</form>

<br><br>

<form method="POST">
<input type="submit" name="disp" value="display regions"/>

</form>
 
 
 
 </body>


</html>