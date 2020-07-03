<?php
error_reporting(0);
include_once("dbconnect.php");

$phone = $_POST['phone'];
$ranking = $_POST['ranking'];
$comment=$_POST['comment'];

//$name = "aa";
//$password = "bb";
//$phone = "01";
//$address = "cc";
//$user_type= "Cooker";

$sqlinsert = "INSERT INTO `feedback`(`phone`, `ranking`, `comment`) VALUES ('$phone','$ranking','$comment')";
if ($conn->query($sqlinsert) === TRUE){
    echo "success";
}else {
    echo "failed";
}

?>