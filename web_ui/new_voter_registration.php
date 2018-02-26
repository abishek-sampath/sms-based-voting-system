<link rel="stylesheet" href="result.css">
<?php include 'dbconnect.php';

if(isset($_POST['disp']))
{
	//include 'display.php';
	
	header("Location: display_voters.php");
}
if(isset($_POST['newvoterbutton']))
{
//$num =$_POST['number'];
$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		
$ag = ucwords($_POST['age']);
$sex =$_POST['sex'];
$district =$_POST['district'];

$region =$_POST['region'];
$addr1=$_POST['addr1'];
$addr2=$_POST['addr2'];
		
$nam=$fname.' '.$lname;
		$addr=$addr1.','.$addr2;
		
 //echo $district;
 //echo $region;

$result=mysql_query("select * from users",$conn);
$rowcount=mysql_num_rows($result);
$rowcount=$rowcount+1;
$rowcount="V".$rowcount;
$uid=rand(100000,999999);

$result=mysql_query("insert into users 
				(num,name,age,sex,district,region,address,vid,uid,flag,sentcid,sentformat)
				values('0','$nam','$ag','$sex','$district','$region','$addr','$rowcount','$uid','0','0','0')");


$rr=rand(0,40);


$result=mysql_query("select * from users",$conn);
$r=mysql_fetch_array($result);
//$cc=mysql_num_rows($result);


//$cc=mysql_query("select count(num) from users",$conn);

?>
<br><br>
<span class="processresults"><p>Thank you for registering with the Tamilnadu Election Commission<p>
<p>Your Voter ID is:<p><span><?php echo $rowcount ?></span>
<br>
<br><br>
<br><br>
<p class="backlink" id="index.php" onclick="nav(this.id)">Go Back to Main Site</p>

<span>
<script type='text/javascript' src='js/new_voter.js'></script>



<?php
}


?>
