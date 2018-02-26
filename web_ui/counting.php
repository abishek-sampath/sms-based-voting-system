<!DOCTYPE html>

	<html>
		<head>
		<meta charset="utf-8">
		<title>Indian Election Commission</title>
		<link rel="stylesheet" href="index.css">
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
		<script type='text/javascript' src='js/blur.js'></script>
		
		<script type="text/javascript">
				$(document).ready(function() {
					$('#all').blurjs( {
						source: "body",
						overlay: 'rgba(255,255,255,0.8)',
						radius: 10
					} );
				});
				
				function changein(n) {
					var myele = document.querySelector("#floatline");
					myele.style.top = n+"px";
				}
				
				function changeout() {
					var myele = document.querySelector("#floatline");
					myele.style.top = "282px";
				}
				
				function nav(id) {
					
					window.location.href = id;
				}
				
				function rowchange(tover) {
					var element2 = document.querySelector("#num"+tover);
					element2.style.fontSize = "240%";
				}
				
				function roworiginal(tout) {
					var element2 = document.querySelector("#num"+tout);
					element2.style.fontSize = "100%";
				}
			
		</script>
		
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
			$result=mysql_query("select * from testdb4");
			$i=1;
		?>
		</head>
	
	<body>
		
		<?php
			include 'header.php';
		?>
		
		<div id="all">
			
			<div id="main">
				
				<div id="form">
					<p class="pagetitle">Vote Counting Results</p>
					<hr color="a9a9a9" size="1" style="opacity:0.6">
					<br>
					<div id="showresultbutton">
					<form name="testform" method="POST">
						<p>Select District:</p> 
						<p name="pdist"><select name="district" id='s1' onchange=AjaxFunction();>
						<option value="">Select</option>
						<?php 
						 $res=mysql_query("select distinct(city) from regions",$conn);
						 while($row=mysql_fetch_array($res))
						 {
						 echo "<option value=$row[city]>$row[city]</option>";
						
						}
						?>
						</select>
						</p>
						<p>Select Region: </p>
						<p name="pregion">
						<select name="region" id='s2'>
						<option value="">Select</option>
						</select>
						</p>
						
						<br>
						<button  name="showresultbutton" value="Show Results" type="submit" style="box-shadow:2px 2px 2px gray">Show Results</button>
					</form>
					</div>
					<hr color="a9a9a9" size="1" style="opacity:0.6">
					<br>
				</div>
				
				<div id="counttable">
							<p class="formtitle">Candidates' Vote Results:</p>
							
							<table id="candidatecount">

						<th>S.NO:</th>
						<th>NAME</th>
						<th>PARTY NAME</th>
						<th>DISTRICT</th>
						<th>REGION</th>
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
							
					
						<!--OTHER TABLES
						-->
						<br><br><br>
						
						
						<p class="formtitle">Party-wise Results:</p>
						<table >

						<th>NO. OF REGIONS STANDING</th>
						<th>PARTY NAME</th>
						<th>NO OF VOTES</th>

						<?php

						$result=mysql_query("select count(cregion),sum(ctotal), cparty from candidate group by cparty ",$conn);
						while($row=mysql_fetch_array($result))
						{
						?>
						<tr>
						<td>
						<?php echo $row['count(cregion)'];
						?>
						</td>

						<td>
						<?php echo $row['cparty'];
						?>
						</td>
						<td>
						<?php echo $row['sum(ctotal)'];
						?>
						</td>
						</tr>
						<?php
						}
						?>

						</table>
						<br><br><br>
						
						<p class="formtitle">Region-wise Results:</p>
						<table>

						<th>NO. OF PARTIES STANDING</th>

						<th>REGION NAME</th>
						<th>NO OF VOTES</th>




						<?php

						$result=mysql_query("select count(cparty),sum(ctotal), cregion from candidate group by cregion ",$conn);
						while($row=mysql_fetch_array($result))
						{
						?>
						<tr>
						<td>
						<?php echo $row['count(cparty)'];
						?>
						</td>

						<td>
						<?php echo $row['cregion'];
						?>
						</td>
						<td>
						<?php echo $row['sum(ctotal)'];
						?>
						</td>
						</tr>
						<?php
						}
						?>
						</table>
				</div>
			</div>
			
			<div id="sidebar">
				<hr id="floatline" size="35" color="blue" style="top:282px;box-shadow:2px 2px 2px gray">
				<br><br>
				<span class="menu" onmouseover="changein(26)" onmouseout="changeout()" id="index.php" onclick="nav(this.id)" style="cursor:pointer;">Home</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(90)" onmouseout="changeout()" id="new_voter.php" onclick="nav(this.id)" style="cursor:pointer;">New Voter</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(153)" onmouseout="changeout()" id="new_candidate.php" onclick="nav(this.id)" style="cursor:pointer;">New Candidates</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(218)" onmouseout="changeout()" id="sms_reg.php" onclick="nav(this.id)" style="cursor:pointer;">SMS Vote Registration</span>
				<br><br><br>
				<span class="currentmenu" onmouseover="changein(281)" onmouseout="changeout()" id="counting.php" onclick="nav(this.id)" style="cursor:pointer;">Vote Countings</span>
				<br><br><br>
				<span class="menu" onmouseover="changein(344)" onmouseout="changeout()" id="about.php" onclick="nav(this.id)" style="cursor:pointer;">About</span>
			</div>
			
			<div style="display:block; clear:both"></div>
		</div>
		
	</body>
<html>