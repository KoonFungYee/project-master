<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// $name = "aa";
// $password = "123";
// $user_type = "Cooker";
// $phone = "01";
// $address = "cc";
// $user_type= "Cooker";

$sql = "SELECT * FROM register WHERE `phone` = '$phone' AND `password` = '$password' AND `usertype` = '$user_type'";
$result = $conn->query($sql);

$respond = array();
if ($result->num_rows > 0) {
    array_push($respond, 'success');
    while ($row = mysqli_fetch_array($result)){
        array_push($respond, $row['phone']);
    }
    echo json_encode($respond);
    
}else{
    array_push($respond, 'failed');
    echo json_encode($respond);
}

?>