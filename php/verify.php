<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$otp = $_POST['otp'];

$get_data = "SELECT $otp FROM signup WHERE email = '$email' AND otp = '$otp'";

$response = $db -> query($get_data);

if($response -> num_rows != 0){

    $update_status = "UPDATE signup SET status = 'ACTIVE' WHERE email = '$email'";
    if($db -> query($update_status)){
        echo "success";
    }else{
        echo "Unable to update status!";
    }

}else{
    echo "Incorrect OTP!";
}

?>