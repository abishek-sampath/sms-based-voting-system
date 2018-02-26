<html>
<head>
<?php include 'dbconnect.php';
header("Refresh: 5;url='http://localhost/votingfinal/display_candidate.php'");
?>
</head>
<body>
<p><H1>CANDIDATE DATABASE</H1></p>

<br>
<br>


<table cellpadding="5" cellspacing="1" border="3">

<th>S.NO:</th>
<th>NAME</th>
<th>AGE</th>
<th>SEX</th>
<th>PARTY NAME</th>
<th>DISTRICT</th>
<th>REGION</th>
<th>CANDIDATE CODE</th>
<th>CID</th>
<th>TOTAL</th>




<?php

$result=mysql_query("select * from candidate ",$conn);
while($row=mysql_fetch_array($result))
{
?>
<tr>
<td>
<?php echo $row['csl'];
?>
</td>
<td>
<?php echo $row['cname'];
?>
</td>

<td>
<?php echo $row['cage'];
?>
</td>
<td>
<?php echo $row['csex'];
?>
</td>
<td>
<?php echo $row['cparty'];
?>
</td>
<td>
<?php echo $row['cdistrict'];
?>
</td>

<td>
<?php echo $row['cregion'];
?>
</td>

<td>
<?php echo $row['ccode'];
?>
</td>
<td>
<?php echo $row['cid'];
?>
</td>
<td>
<?php echo $row['ctotal'];
?>
</td>
</tr>
<?php
}
?>


</table>
</body>
</html>