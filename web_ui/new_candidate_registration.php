<link rel="stylesheet" href="result.css">
<?php include 'dbconnect.php';

if(isset($_POST['disp']))
{
	//include 'display.php';
	
	header("Location: display_candidate.php");
}
if(isset($_POST['newcandidatebutton']))
{

//$nam =ucwords($_POST['name']);
	$nam=$_POST['fname'].' '.$_POST['lname'];
//		$address=$_POST['addr1'].','.$_POST['addr2'];
	
$ag = ucwords($_POST['age']);
$sex =$_POST['sex'];
$district =$_POST['district'];

$party=$_POST['party'];
$region =$_POST['region'];

$res=mysql_query("select * from regions where rname='$region'",$conn);

$row=mysql_fetch_array($res);
$rcode=$row['rcode'];


$result=mysql_query("select * from candidate",$conn);

$rowcount=mysql_num_rows($result);
$rowcount=$rowcount+1;
$ccode="C".$rowcount;

$cid=$rcode.$ccode;

$result=mysql_query("insert into candidate 
						(cname,cage,csex,cparty,cdistrict,cregion,ccode,cid,ctotal)
							values('$nam','$ag','$sex','$party','$district','$region','$ccode','$cid','0')");
$result=mysql_query("select * from candidate",$conn);
$r=mysql_fetch_array($result);


?>
<br><br>
<span class="processresults"><p>Thank you for registering with the Tamilnadu Election Commission<p>
<p>Your Candidate ID is:<p><span><?php echo $cid ?></span>
<br>
<br><br>
<br><br>
<p class="backlink" id="index.php" onclick="nav(this.id)">Go Back to Main Site</p>

<span>
<script type='text/javascript' src='js/new_voter.js'></script>
<?php
}


?>
