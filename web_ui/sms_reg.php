<!DOCTYPE html>

	<html>
		<head>
		<meta charset="utf-8">
		<title>Indian Election Commission</title>
		<link rel="stylesheet" href="index.css">
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
		<script type='text/javascript' src='js/blur.js'></script>
		<?php
			include 'dbconnect.php';
		?>
		</head>
	
	<body>
		<?php
			include 'header.php';
		?>
		
		<div id="all">
			
			<div id="main">
				
				<div id="form">
					<form action="sms_reg_process.php" method="POST">
						
						<p class="pagetitle">SMS Registration</p>
						<hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
						<p class="formtitle">Personal Details</p>
						<p>First Name:</p>
						<p><input type="text" name="fname" value=""><p>
						<p>Last Name:</p>
						<p><input type="text" name="lname" value=""><p>
						<p>Date of Birth:</p>
						<p><input type="date" name="dob" value=""><p>
						<p>Voter ID Number(Type in Uppercase letters wherever necessary)</p>
						<p><input type="text" name="vid" value=""><p>
						<p>Phone Number (You can use only this number to vote)</p>
						<p><span style="padding-right:10px;">+91</span><input type="tel" name="tel" value=""><p>
						<br><hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
						<p><input type="checkbox" name="rulecheck" value="yes" >I Agree and Accept all the rules and regulations specified by the Election Commission of India and the Government of India</p>
						<br>
						<p id="sub" class="submit"><input type="submit" name="smsregbutton" value="Submit" style="box-shadow:2px 2px 2px gray"></p>
						
					</form>
				</div>
			</div>
			
			<div id="sidebar">
				<hr id="floatline" size="35" color="blue" style="top:218px;box-shadow:2px 2px 2px gray">
				<br><br>
				<span class="menu" onmouseover="changein(26)" onmouseout="changeout()" id="index.php" onclick="nav(this.id)" style="cursor:pointer;">Home</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(90)" onmouseout="changeout()" id="new_voter.php" onclick="nav(this.id)" style="cursor:pointer;">New Voter</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(153)" onmouseout="changeout()" id="new_candidate.php" onclick="nav(this.id)" style="cursor:pointer;">New Candidates</span>
				<br><br><br>
				<span class="currentmenu" onmouseover="changein(218)" onmouseout="changeout()" id="sms_reg.php" onclick="nav(this.id)" style="cursor:pointer;">SMS Vote Registration</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(281)" onmouseout="changeout()" id="counting.php" onclick="nav(this.id)" style="cursor:pointer;">Vote Countings</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(344)" onmouseout="changeout()" id="about.php" onclick="nav(this.id)" style="cursor:pointer;">About</span>
			</div>
			
			<div style="display:block; clear:both"></div>
		</div>
		
		<script type="text/javascript">
				$('#all').blurjs( {
					source: "body",
					overlay: 'rgba(255,255,255,0.8)',
					radius: 10
				} );
				
				function changein(n) {
					var myele = document.querySelector("#floatline");
					myele.style.top = n+"px";
				}
				
				function changeout() {
					var myele = document.querySelector("#floatline");
					myele.style.top = "218px";
				}
				
				function nav(id) {
					window.location.href = id;
				}
				
				function check() {
					
				}
		</script>
	</body>
<html>