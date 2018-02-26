<link rel="stylesheet" href="result.css">
<?php include 'dbconnect.php';

	if(isset($_POST['smsregbutton']))
	{
		$name=$_POST['fname'].' '.$_POST['lname'];
		$dob=$_POST['dob'];
		$vid=$_POST['vid'];
		$tel=$_POST['tel'];
		if(!($name == "") && !($dob == "") && !($vid == "") && !($tel == ""))
		{
			
			//mysql_query("insert into testdb3 values('$name','$dob','$vid','$tel')");
			
			mysql_query("update users set num='$tel' where vid='$vid'");
		//	include "Message.php";
		//	echo "<script>alert('sms registration complete');</script>";
		}
		else
		{
			echo "<script>alert('please fill all necessary fields');</script>";
			echo "<script>window.location.href='sms_reg.php';</script>";
		}
	}
	?>
		<span class="processresults"><p>Thank you for registering with the Tamilnadu Election Commission.<p>
		<p>Your Unique ID will be sent to the Mobile Phone Number given<p>
		Thank You
		<br>
		<br><br>
		<br><br>
		<p class="backlink" id="index.php" onclick="nav(this.id)">Go Back to Main Site</p>

		<span>
<script type='text/javascript' src='js/new_voter.js'></script>
