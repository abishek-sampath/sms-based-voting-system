<html>
<head>
<?php include 'dbconnect.php';

if(isset($_POST['Delete']))
{

$rc=$_POST['rcode'];
echo $rc;

$res=mysql_query("delete from party where rcode='$rc'",$conn);
//echo $res;
 //echo "successSSSS";
//echo $res;
}

?>
</head>
<body>
<p><H1>PARTY DATABASE</H1></p>

<br>
<br>


<table cellpadding="5" cellspacing="1" border="3">

<th>PARTY NAME</th>
<th>PARTY CODE</th>




<?php

$result=mysql_query("select * from party ",$conn);
while($row=mysql_fetch_array($result))
{
?>
<tr>
<td>
<?php echo $row['pname'];
?>
</td>
<td>
<?php echo $row['pcode'];
?>
</td>
</tr>
<?php
}
?>


</table>
<br><br>

<form method="POST">
Delete PARTY Code <input type="text" name="pcode" />
<input type="submit" name="Delete" value="Delete PARTY"/>

</form>
</body>
</html>