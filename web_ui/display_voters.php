<html>
<head>
<?php include 'dbconnect.php';

?>
</head>
<body>
<p><H1>VOTERS DATABASE</H1></p>

<br>
<br>


<table cellpadding="5" cellspacing="1" border="3">

<th>S.NO:</th>
<th>NUMBER</th>
<th>NAME</th>
<th>AGE</th>
<th>SEX</th>
<th>DISRICT</th>
<th>REGION</th>
<th>ADDRESS</th>
<th>VOTER ID</th>
<th>UNIQUE ID</th>
<th>FLAG</th>




<?php

$result=mysql_query("select * from users ",$conn);
while($row=mysql_fetch_array($result))
{
?>
<tr>
<td>
<?php echo $row['sl'];
?>
</td>
<td>
<?php echo $row['num'];
?>
</td>

<td>
<?php echo $row['name'];
?>
</td>
<td>
<?php echo $row['age'];
?>
</td>
<td>
<?php echo $row['sex'];
?>
</td>
<td>
<?php echo $row['district'];
?>
</td>

<td>
<?php echo $row['region'];
?>
</td>

<td>
<?php echo $row['address'];
?>
</td>
<td>
<?php echo $row['vid'];
?>
</td>
<td>
<?php echo $row['uid'];
?>
</td>
<td>
<?php echo $row['flag'];
?>
</td>

</tr>
<?php
}
?>


</table>
</body>
</html>