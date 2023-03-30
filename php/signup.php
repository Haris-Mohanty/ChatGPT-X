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
    $
}

?>