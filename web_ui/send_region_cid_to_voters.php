<link rel="stylesheet" href="result.css">

<?php include 'dbconnect.php';

if(isset($_POST['disp']))
{
	//include 'display.php';
	
	header("Location: display_voters.php");
}
if(isset($_POST['candidateidbtn']))
{
$format ="1";
//$format ="0";
//echo $format;

$result=mysql_query("update smssendflag set regioncidflag='$format'");

//echo "inserted";
}
?>
<br><br>
<span class="processresults"><p>Candidate Names and  CIDs Sent to all Citizens with Registered Phone Number<p>
		
		Thank You
		<br>
		<br><br>
		<br><br>
		<p class="backlink" id="admin.php" onclick="nav(this.id)">Go Back to Admin Page</p>

		<span>
<script type='text/javascript' src='js/new_voter.js'></script>

