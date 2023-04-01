<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];

$header_info = "From: chatgpt0x@gmail.com \r\nMIME-Version:1.0 \r\nContent-Type: text/html;charset=ISO-8859-1 \r\n";



$check_email = "SELECT email FROM signup WHERE email = '$email'";

$response = $db -> query($check_email);
if($response -> num_rows != 0){

    $check_pass = "SELECT password FROM signup WHERE email = '$email' AND password = '$password'";
    $pass_res = $db -> query($check_pass);
    if($pass_res -> num_rows != 0){

        $check_status = "SELECT status FROM signup WHERE email = '$email' AND status = 'ACTIVE'";

        $status_res = $db -> query($check_status);
        if($status_res -> num_rows == 0){

            $get_otp = "SELECT otp FROM signup  WHERE email = '$email'";
            $otp_res = $db -> query($get_otp);

            $data = $otp_res -> fetch_assoc();
            //new otp
            $new_otp = $data['otp'];
            $design = '
                   <html>
                   <body style="background: rgb(15, 84, 195);padding: 40px;">
                       <h1 style="color: antiquewhite; text-align: center;">Your New OTP is : '.$new_otp.'</h1>
                       <h2 style="color: antiquewhite; text-align: center;">Do not Share your OTP with Anyone!</h2>
                   </body>
                   </html>
                   ';

            if(mail($email, "ChatGPT", $design, $header_info)){
                echo "Status Pending";
            }else{
                echo "Incorrect OTP!";
            }
        }else{
            echo "Login Success";
        }

    }else{
        echo "Incorrect Password!";
    }

}else{
    echo "Wrong Email!";
}

?>