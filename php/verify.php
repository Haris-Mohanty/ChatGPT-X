<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$otp = $_POST['otp'];

$get_data = "SELECT $otp FROM signup WHERE email = '$email' AND otp = '$otp'";

$response = $db -> query($get_data);

if($response)

?>