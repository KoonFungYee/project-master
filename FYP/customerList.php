<?php
error_reporting(0);
include_once("dbconnect.php");

$cookerphone = $_POST['phone'];

$sql = "SELECT * FROM `register` WHERE `phone` in (select `phone` from `order` where `cookerphone` like '$cookerphone' and `status` like 'new')" or die("Hi");
$result = $conn->query($sql);

$response = array();
if ($result->num_rows > 0) {
   while ($row = mysqli_fetch_array($result)){
	$resultlist = array();
	$resultlist[name] = $row["name"];
	$resultlist[phone] = $row["phone"];
        array_push($response, $resultlist);
	
    }
    echo json_encode($response);
} else {
	echo "nodata";
}
