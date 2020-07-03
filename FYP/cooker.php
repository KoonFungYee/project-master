<?php
error_reporting(0);
include_once("dbconnect.php");


$sql = "SELECT * FROM `register` where `usertype` like 'Cooker'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $response = array();
    while ($row = mysqli_fetch_array($result)){
	$resultlist = array();
        $resultlist[name] = $row["name"];
	$resultlist[address] = $row["address"];
	$resultlist[phone] = $row["phone"];
 	array_push($response, $resultlist);
    }
    echo json_encode($response);
    
}else{
    echo "nodata";
}

?>