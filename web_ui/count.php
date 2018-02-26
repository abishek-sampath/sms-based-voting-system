<?php
include 'dbconnect.php';
//include 'and_msg.php';

$num=$_GET['num'];
$text=$_GET['text'];
$r=mysql_query("insert into msgs values('$num','received')",$conn);
$num="".$num;
$num=substr($num,3,10);
$r=mysql_query("insert into msgs values('$num','$text')",$conn);

//$text="VOTE_V2_387786_THRC2";
//$num="15555215558";
$farr = explode("_",$text);
print_r($farr);
echo $farr[0]; echo "<br>";
echo $farr[1];echo "<br>";
echo $farr[2];echo "<br>";
echo $farr[3];echo "<br>";

echo $num;
echo $text;
echo "<br>";echo "<br>";

$v=$farr[0];
$vid=$farr[1];
$uid=$farr[2];
$cid=$farr[3];


 //$result = mysql_query("SELECT  users.num,users.vid,users.uid,users.region,candidate.region,candidate.cid FROM users,candidate ") or die(mysql_error());
 $result = mysql_query("SELECT  * FROM users ") or die(mysql_error());
 
 while($row=mysql_fetch_array($result))
 {
	if((strcmp($num,$row['num'])==0))
	{
//	echo $num;	echo $row['num']."<br>";
	//echo $vid;
		if((strcmp($vid,$row['vid'])==0))
		{
//echo $vid;		echo $row['vid']."<br>";
	//		echo $row['uid']."<br>";
			if((strcmp($uid,$row['uid'])==0))
			{	
	//	echo	$row['region'];
	//	echo $row['candidate.region'];
				
				echo $row['region'];
				$vregion=$row['region'];
				
				$new="correct";
				
			}
				else
				{
				//	echo $row['uid'];
				$new="wrong";
				}
			
		
			echo $new;
		}
	}
	else{
	//	echo "next";
	}
 }
 echo "<br><br>";
  $result = mysql_query("SELECT  * FROM candidate ") or die(mysql_error());
 $flag=0;
 while($row=mysql_fetch_array($result))
 { echo $cid; echo $row['cid'];
	
	if($flag!=2)
	{
	if((strcmp($cid,$row['cid'])==0))
	{
		$cregion=$row['cregion'];
		echo $cregion;
		$total=$row['ctotal'];
		
		$flag=2;
		
	}
	else {$flag=1;//echo "not found";
	}
	
	}
}

if($flag==1)echo "not found";
if($flag==2)
{echo " found";
if(strcmp($vregion,$cregion)==0) {echo "equal";
echo $total;
$total=$total+1;
echo $total;
echo $cid;
if($r=mysql_query("UPDATE candidate set ctotal='$total' where cid='$cid'",$conn));


}
else echo "unequal";
}
 /*
$num=$num+1;
$t= $t."BOO";*/
if($r=mysql_query("insert into msgs values('$num','$new')",$conn))
	{
	$flag['code']=1;
	echo"hi";
	}
print(json_encode($flag));
//echo $text;
?>