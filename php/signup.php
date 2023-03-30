<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];

$get_data = "SELECT * FROM signup";

$response = $db -> query($get_data);

if($response){
    echo "S";
}else{
    $create_table = "CREATE TABLE signup(
        id INT(11) NOT NULL AUTO_INCREMENT,
        email VARCHAR(55),
        password VARCHAR(55),
        otp VARCHAR(11),
        status VARCHAR(15) NOT NULL DEFAULT 'PENDING',
        PRIMARY KEY(id)
    )"

    if($db -> query($create_table)){
        $insert_data = "INSERT INTO signup() VALUES ()";
    }else{
        echo "Unable to Create table!";
    }
}

?>