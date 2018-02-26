<html>
<head>
<?php include 'dbconnect.php';

if(isset($_POST['Delete']))
{

$rc=$_POST['rcode'];
echo $rc;

$res=mysql_query("delete from regions where rcode='$rc'",$conn);
//echo $res;
 //echo "successSSSS";
//echo $res;
}

?>
</head>
<body>
<p><H1>REGIONS DATABASE</H1></p>

<br>
<br>


<table cellpadding="5" cellspacing="1" border="3">

<th>S.NO:</th>
<th>CONSTITUENCY</th>
<th>REGION CODE</th>
<th>DISTRICT</th>






<?php

$result=mysql_query("select * from regions ",$conn);
while($row=mysql_fetch_array($result))
{
?>
<tr>
<td>
<?php echo $row['sl'];
?>
</td>

<td>
<?php echo $row['rname'];
?>
</td>
<td>
<?php echo $row['rcode'];
?>
</td>
<td>
<?php echo $row['city'];
?>
</td>

</tr>
<?php
}
?>


</table>
<br><br>

<form method="POST">
Delete Region Code <input type="text" name="rcode" />
<input type="submit" name="Delete" value="Delete region"/>

</form>
</body>
</html>