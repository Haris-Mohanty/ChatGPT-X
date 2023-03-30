<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];
$otp = rand(212225, 872545);

$get_data = "SELECT * FROM signup";

$response = $db -> query($get_data);

if($response){
   
    $insert_data = "INSERT INTO signup(email, password, otp) VALUES ('$email', '$password', '$otp')";

        if($db -> query($insert_data)){
            if(mail($email, "ChatGpt", "Please don't share your OTP with Anyone!", "Your OTP is : ".$otp)){
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
            if(mail($email, "ChatGpt", "Please don't share your OTP with Anyone!", "Your OTP is : ".$otp)){
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