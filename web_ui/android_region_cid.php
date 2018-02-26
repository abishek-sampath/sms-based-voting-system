<?php

	 include 'dbconnect.php';
	 
//	$result = mysql_query("SELECT users.num,users.region,candidate.name,candidate.cid FROM candidate,users where candidate.region=users.region order by users.region ") or die(mysql_error());
 $result = mysql_query("SELECT distinct cregion,cname,cid FROM candidate order by cregion ") or die(mysql_error());
 
 
 $cid_text="Candidate and codes";
 //echo "hi<br>";
// $row=mysql_fetch_array($result);
 //$r=$row['region'];
 $i=0;
 
 while($row=mysql_fetch_array($result))
 {
	//echo $r;
	$r[$i]=$row['cregion'];
	$n[$i]=$row['cname'];
	$c[$i]=$row['cid'];
//echo $r[$i]."  ".$n[$i]."  ".$c[$i]."<br>";
//$rr[$i]=$r;
$i++;
 }
 //echo $i;
 
 $ii=0;
 //echo "aaray";
 $chk=$r[$ii];
 //echo "<br>";
 $t=0;
 $text[$t]="Candidate Names and Cids";
 //echo $text[$t];
 
 
 while($ii<$i)
 {
 
 //echo "chk: ".$chk;
 if($chk==$r[$ii]) { //echo $n[$ii];echo $c[$ii];
 
 $text[$t]="".$text[$t]."\n".$n[$ii]." - ".$c[$ii];
 //echo "chk: ".$chk;

// echo "text: ".$text[$t];
// echo "<br>";
//   echo "t: ".$t;
// echo "<br>";

 }
 
 else 
 {
 //echo "<br>";
 //echo "diff";
 $chk=$r[$ii];
 $ii--;
 //echo "<br>";
 //echo "text: ".$text[$t];
 //echo "<br>";
 //echo $t;
 //echo "<br>";
 // echo "ii: ".$ii;
 //echo "<br>";

 $t++;
 $text[$t]="Candidate Names and Cids";
 
 }
 //echo $ii;
 //echo $reg;
 
 $ii++;  
 //echo "ince ii: ".$ii;
// echo "<br>";

 }
 
 //echo
// echo $t;
 //echo "<br>";
//echo "<br>";

 $f=$t;
 $ii=0;
 //echo $f;
 while($ii<$t)
 {
//echo "text: ".$text[$ii];
 
 //echo "<br>";

 
 $ii++;
 }
 //echo "<br><br><br>";echo "regionss<br><br><br>";
  $result = mysql_query("SELECT distinct cregion FROM candidate order by cregion ") or die(mysql_error());
 $ii=0;
 $reg[0]="das";
 while($row=mysql_fetch_array($result))
 {
	$reg[$ii]=$row['cregion'];
//	echo $reg[$ii]."<br>";
 $ii++;
 }
// echo "<br><br><br>";




 while($row=mysql_fetch_array($result))
 {
	
 }
 
 
 
 $i=0;
// echo "<br><br><br>";
 while($i<$ii)
 {
	//$reg[$ii]=$row['region'];
//	echo $num[$i]." ".$region[$i]." ".$msg[$i]."<br>";
 $i++;
 }
 //echo "<br><br><br>";
 
   $result = mysql_query("SELECT num,region FROM users ") or die(mysql_error());
 $ii=0;
 //$reg[0]="das";
 $tt=0;$flag=0;

 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
		
        $product = array();
		$num[$ii]=$row['num'];
	$region[$ii]=$row['region'];
	$rtemp=$row['region'];
	$tt=0;
	$flag=0;
	while($flag==0)
	{
		if(strcmp($rtemp,$reg[$tt])==0)
		{
			$msg[$ii]=$text[$tt];
			
			$flag=1;
			}
		$tt++;
	}

		
		
//      
		$product["num"] = $num[$ii];
     $product["region"] = $region[$ii];
	  $product["msg"] = $msg[$ii];
	
	$ii++;
	 
		
		
		
      // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
    //  mysql_close($con);
?>



