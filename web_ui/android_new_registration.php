<?php
/*
$host = "localhost";
$db = "voting";
$uname = "root";
$pwd = "";

	$con = mysql_connect($host,$uname,$pwd) or die("connection failed");
	mysql_select_db($db,$con) or die("db selection failed");
	*/ 
	 include 'dbconnect.php';
	 
	$result = mysql_query("SELECT * FROM users where num!='0' AND flag='0'") or die(mysql_error());
 
 
 
 
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
//        $product["num"] = $row["num"];        
		$product["num"] = $row["num"];
        
		$product["name"] = $row["name"];
      $product["age"] = $row["age"];
     $product["sex"] = $row["sex"];
     $product["region"] = $row["region"];
     $product["address"] = $row["address"];
     $product["vid"] = $row["vid"];
	 $product["uid"] = $row["uid"];
	 
     $product["flag"] = $row["flag"];
           
	  //  $product["id"] = $row["id"];
		
		
		
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



