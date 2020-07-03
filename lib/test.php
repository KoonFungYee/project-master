<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];

$respond = array();
$sql = "SELECT * FROM `feedback` WHERE `phone` = $phone";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)){
        array_push($respond, $row['phone']);
        array_push($respond, $row['ranking']);
        array_push($respond, $row['comment']);
    }
    echo json_encode($respond);
    
}else{
    array_push($respond, 'failed');
    echo json_encode($response);
}

?>