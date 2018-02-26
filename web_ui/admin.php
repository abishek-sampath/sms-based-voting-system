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
		
		<div id="all">
			
			<div id="main">
				
				<div id="form">
					<form method="POST" name="testform" enctype="multipart/form-data">
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
						<br><hr color="a9a9a9" size="1" style="opacity:0.6"><br>
						<p>
						</form>
						<form method="post" action="send_region_cid_to_voters.php">
						<input type="submit" id="candidateidbtn" name="candidateidbtn" value="Send Candidate ID"/></p>
						</form>
						
						<br>
						<form method="post" action="send_format_to_voters.php">
						<p><input type="submit" id="voterformatbtn" name="voterformatbtn" value="Send Voter format"/></p>
					</form>

					<br>
						<p><button type="button" id="sendresultsbtn" name="sendresultsbtn">Send Results</button></p>
						<br>
						
					
				</div>
			</div>
			
			<div id="sidebar">
				<hr id="floatline" size="35" color="blue" style="top:26px;box-shadow:2px 2px 2px gray">
				<br><br>
				<span class="menu" id="index.php" style="cursor:pointer;" onclick="nav(this.id)">Logout</span>
				
			</div>
			
			<div style="display:block; clear:both"></div>
		</div>
		
		<script type='text/javascript' src='js/new_voter.js'></script>
	</body>
<html>