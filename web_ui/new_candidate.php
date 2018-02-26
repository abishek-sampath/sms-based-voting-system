<!DOCTYPE html>

	<html>
		<head>
		<meta charset="utf-8">
		<title>Indian Election Commission</title>
		<link rel="stylesheet" href="index.css">
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
		<script type='text/javascript' src='js/blur.js'></script>
		<script type='text/javascript'>
		
		function AjaxFunction()
			{
			var httpxml;
			try
			  {
			  // Firefox, Opera 8.0+, Safari
			  httpxml=new XMLHttpRequest();
			  }
			catch (e)
			  {
			  // Internet Explorer
					  try
								{
							 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
								}
						catch (e)
								{
							try
						{
						httpxml=new ActiveXObject("Microsoft.XMLHTTP");
						 }
							catch (e)
						{
						alert("Your browser does not support AJAX!");
						return false;
						}
						}
			  }
			function stateck() 
				{

				if(httpxml.readyState==4)
				  {	  
				  
			//alert(httpxml.responseText);
			var myarray = JSON.parse(httpxml.responseText);
			// Remove the options from 2nd dropdown list 
			for(j=document.testform.region.options.length-1;j>=0;j--)
			{
			document.testform.region.remove(j);
			}

			for (i=0;i<myarray.data.length;i++)
			{
			var optn = document.createElement("OPTION");
			optn.text = myarray.data[i].rname;
			optn.value = myarray.data[i].sucategory;  // You can change this to subcategory 
			document.testform.region.options.add(optn);

			} 
				  }
				} // end of function stateck
				var url="dd.php";
			var cat_id=document.getElementById('s1').value;
			url=url+"?cat_id="+cat_id;
			httpxml.onreadystatechange=stateck;
			//alert(url);
			httpxml.open("GET",url,true);
			httpxml.send(null);
			  }
		
		</script>
		<?php
			include 'dbconnect.php';
		?>
	</head>
	
	<body>
		
		<?php
			include 'header.php';
		?>
		
		<div id="all" name="all">
			
			<div id="main" name="main">
				
				<div id="form" name="form">
					<form name="testform" action="new_candidate_registration.php" method="POST" enctype="multipart/form-data">
						<p class="pagetitle">New Candidate Registration</p>
						<hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
						<p class="formtitle">Personal Details</p>
						<p>First Name:</p>
						<p><input type="text" name="fname" value=""></p>
						<p>Last Name:</p>
						<p><input type="text" name="lname" value=""></p>
						<p>Age:</p>
						<p><input type="text" name="age" value=""></p>
						<p>
							Sex: </p><p><select name="sex">
							<option>Select</option>
							<option>Male</option>
							<option>Female</option>
							</select>
						</p>
						<br><hr color="a9a9a9" size="1" style="opacity:0.4"><br>
						<p class="formtitle">Address Address</p>
						<p>Address line 1:</p>
						<p><input type="text" name="addr1" value="" class="formboxes"></p>
						<p>Address line 2:</p>
						<p><input type="text" name="addr2" value="" class="formboxes"></p>
						<p><label id="city">City:</label><input type="text" name="city" value=""><label id="state">State:</label><input type="text" name="state" value=""></p>
						<br><hr color="a9a9a9" size="1" style="opacity:0.4">
						<p class="formtitle">Election Details</p>
						<p>Documents(Upload as a zip File):</p>
						<p><input type="file" name="docs"></p>
						
						<p>Select Party: </p>
						<p><select name="party">
						<option>Select</option>
						<?php 
						 $res=mysql_query("select * from party",$conn);
						 while($row=mysql_fetch_array($res))
						 {
						 ?>
						<option>
						<?php echo "".$row['pcode']." - ".$row['pname'];
						?>
						</option>
						<?php
						}
						?>

						</select>
						</p>

					<p>District:</p> 
						</p><select name ="district">
						<option>Select</option>
						<?php 
						 $res=mysql_query("select distinct(city) from regions",$conn);
						 while($row=mysql_fetch_array($res))
						 {
						 ?>
						<option>
						<?php echo $row['city'];
						?>
						</option>
						<?php
						}
						?>
						</select>
						</p>
						<p>region: </p>
						<p>
						<select name ="region">
						<option>Select</option>
						<?php 
						 $res=mysql_query("select * from regions",$conn);
						 while($row=mysql_fetch_array($res))
						 {
						 ?>
						<option>
						<?php echo $row['rname'];
						?>
						</option>
						<?php
						}
						?>
						</select>
						</p>

						<br><hr color="a9a9a9" size="1" style="opacity:0.6">
						<br>
						<p><input type="checkbox" id="rulecheck" value="yes">I Agree and Accenpt all the rules and regulations specified by the Election Commission of India and the Government of India</p>
						<br>
						<p class="submit"><input type="submit" name="newcandidatebutton" value="Create Candidate ID" style="box-shadow:2px 2px 2px gray"></p>
						
					</form>
				</div>
			</div>
			
			<div id="sidebar">
				<hr id="floatline" size="35" color="blue" style="top:153px;box-shadow:2px 2px 2px gray">
				<br><br>
				<span class="menu" onmouseover="changein(26)" onmouseout="changeout()" id="index.php" onclick="nav(this.id)" style="cursor:pointer;">Home</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(90)" onmouseout="changeout()" id="new_voter.php" onclick="nav(this.id)" style="cursor:pointer;">New Voter</span>
				<br><br><br>
				<span class="currentmenu" onmouseover="changein(153)" onmouseout="changeout()" id="new_candidate.php" onclick="nav(this.id)" style="cursor:pointer;">New Candidates</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(218)" onmouseout="changeout()" id="sms_reg.php" onclick="nav(this.id)" style="cursor:pointer;">SMS Vote Registration</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(281)" onmouseout="changeout()" id="counting.php" onclick="nav(this.id)" style="cursor:pointer;">Vote Countings</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(344)" onmouseout="changeout()" id="about.php" onclick="nav(this.id)" style="cursor:pointer;">About</span>
				
			</div>
			
			<div style="display:block; clear:both"></div>
		</div>
		
		<script type="text/javascript">
				$('#all').blurjs( {
					overlay: 'rgba(255,255,255,0.8)',
					radius: 10
				} );
				
				function changein(n) {
					var myele = document.querySelector("#floatline");
					myele.style.top = n+"px";
				}
				
				function changeout() {
					var myele = document.querySelector("#floatline");
					myele.style.top = "153px";
				}
				
				
				
				function nav(id) {
					window.location.href = id;
				}
			
		</script>
	</body>
<html>