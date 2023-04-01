<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$otp = rand(212225, 872545);

$get_data = "SELECT * FROM signup";

$header_info = "From: chatgpt0x@gmail.com \r\nMIME-Version:1.0 \r\nContent-Type: text/html;charset=ISO-8859-1 \r\n";

$design = '
<html>
<body style="background: rgb(15, 84, 195);padding: 40px;">
    <h1 style="color: antiquewhite; text-align: center;">Your OTP is : '.$otp.'</h1>
    <h2 style="color: antiquewhite; text-align: center;">Do not Share your OTP with Anyone!</h2>
</body>
</html>
';

$response = $db -> query($get_data);

if($response){
   
    $insert_data = "INSERT INTO signup(email, password, otp) VALUES ('$email', '$password', '$otp')";

        if($db -> query($insert_data)){
            if(mail($email, "ChatGPT", $design, $header_info)){
                echo "success";
            }else{
                "Unable to send OTP!";
            }
        }else{
            echo "Failed";
        }

}else{
    $create_table = "CREATE TABLE signup(
        id INT(11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(55),
        password VARCHAR(55),
        otp VARCHAR(11),
        status VARCHAR(15) NOT NULL DEFAULT 'PENDING',
        PRIMARY KEY(id)
    )";

    if($db -> query($create_table)){
        $insert_data = "INSERT INTO signup(email, password, otp) VALUES ('$email', '$password', '$otp')";

        if($db -> query($insert_data)){
            if(mail($email, "ChatGPT", $design, $header_info)){
                echo "success";
            }else{
                "Unable to send OTP!";
            }
        }else{
            echo "Failed";
        }
    }else{
        echo "Unable to Create table!";
    }
}

?>

