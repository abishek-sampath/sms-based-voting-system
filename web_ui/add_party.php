<html>
<head>

<?php include 'dbconnect.php';

if(isset($_POST['disp']))
{
	//include 'display.php';
	
	header("Location: display_party.php");
}
if(isset($_POST['add']))
{

$pn =ucwords($_POST['pname']);
$pc = ucwords($_POST['pcode']);
 
echo $pn;
echo $pc;


$result=mysql_query("insert into party values('$pn','$pc')");
echo $result;
echo "success";

}

?>

</head>

<title>ADD NEW Party</title>



<body>
<P><H1>ADD PARTIES</H1></p>

<br><br>

<form method="POST" >

Party name: <input type="text" name="pname"/><br><br>
Party CODE: <input type="text" name="pcode"/><br><br>
 
 
 
 <input type="submit" name="add" value="ADD NEW PARTY"/>
</form>

<br><br>

<form method="POST">
<input type="submit" name="disp" value="display regions"/>

</form>
 
 
 
 </body>


</html>