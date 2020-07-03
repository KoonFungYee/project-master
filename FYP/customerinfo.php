<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];

$respond = array();
$sql = "SELECT * FROM `register` WHERE `phone` = $phone";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)){
        array_push($respond, $row['name']);
        array_push($respond, $row['password']);
        array_push($respond, $row['address']);
        array_push($respond, $row['usertype']);
    }
    echo json_encode($respond);
    
}else{
    array_push($respond, 'failed');
    echo json_encode($response);
}

?>