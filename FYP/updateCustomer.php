<?php
error_reporting(0);
include_once("dbconnect.php");

$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$usertype = $_POST['user_type'];
$phone = $_POST['phone'];
//$name = "ab";
//$password = "bb";
//$phone = "01";
//$address = "cc";
//$user_type= "Cooker";

$sqlinsert = "UPDATE `register` SET `name` = '$name', `password`= '$password', `address` = '$address', `usertype` = '$usertype' WHERE `phone`='$phone'";
if ($conn->query($sqlinsert) === TRUE){
    echo "success";
}else {
    echo "failed";
}

?>