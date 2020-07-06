<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];
$custphone = $_POST['custphone'];


$respond = array();
$sql = "SELECT * FROM `order` WHERE `cookerphone` = '$phone' and `phone` = '$custphone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)){
        array_push($respond, $row['startdate']);
        array_push($respond, $row['person']);
        array_push($respond, $row['day']);
    }
    echo json_encode($respond);
    
}else{
    array_push($respond, 'failed');
    echo json_encode($response);
}
