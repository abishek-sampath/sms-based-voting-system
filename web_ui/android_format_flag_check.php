<?php

	 include 'dbconnect.php';
	 
	$result = mysql_query("SELECT * FROM smssendflag") or die(mysql_error());
 
 
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
//      
		$product["num"] = $row["formatflag"];
    	
		
		
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



