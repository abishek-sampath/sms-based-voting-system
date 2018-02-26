<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TamilNadu Election Commission</title>
		<link rel="stylesheet" href="index.css">
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
		<script type='text/javascript' src='js/blur.js'></script>
	</head>

	<body>
	
		<?php
			include 'header.php';
		?>
		
		<div id="all">
			<div id="main">	
				<div id="login">
					<form action="admin.php" onSubmit="return check()" method="POST" name="loginform">
						<hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
						<p><label>Username / Voter ID :</label></p>
						<p><input id="user" type="text" name="username"></p>
						<br>
						<p><label>Password :</label></p>
						<p><input id="pass" type="password" name="username"></p>
						<br>
						<p><input class="submit" type="submit" name="submit_button" value="Login" style="box-shadow:2px 2px 2px gray"></p>
						<hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
					</form>
				</div>	
			</div>
			<div id="sidebar">
				<hr id="floatline" size="35" color="blue" style="top:26px;box-shadow:2px 2px 2px gray">
				<br><br>
				<span class="currentmenu" onmouseover="changein(26)" onmouseout="changeout()" id="index.php" onclick="nav(this.id)" style="cursor:pointer;">Home</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(90)" onmouseout="changeout()" id="new_voter.php" onclick="nav(this.id)" style="cursor:pointer;">New Voter</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(153)" onmouseout="changeout()" id="new_candidate.php" onclick="nav(this.id)" style="cursor:pointer;">New Candidates</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(218)" onmouseout="changeout()" id="sms_reg.php" onclick="nav(this.id)" style="cursor:pointer;">SMS Vote Registration</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(281)" onmouseout="changeout()" id="counting.php" onclick="nav(this.id)" style="cursor:pointer;">Vote Countings</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(344)" onmouseout="changeout()" id="about.php" onclick="nav(this.id)" style="cursor:pointer;">About</span>
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('#all').blurjs( {
					overlay: 'rgba(255,255,255,0.8)',
					radius: 10
				} );
			} );
				
				function changein(n) {
					var myele = document.querySelector("#floatline");
					myele.style.top = n+"px";
				}
				
				function changeout() {
					var myele = document.querySelector("#floatline");
					myele.style.top = "26px";
				}
				
			function nav(id) {
					window.location.href = id;
				}
			
			function check() {
				var uname =document.getElementById('user').value;
				var pass =document.getElementById('pass').value;
				if ( uname == "abishek" && pass == "abishek")
				{
					return true;
				}
				else
				{
				alert("Incorrect Username/Password. Please try again!");
				return false;
				}
				return false;
			}
		</script>
		
	</body>
</html>
		