<?php

//DATABASE LINK
require_once("../common/php/database.php");

$question = $_POST['question'];

$get_data = "SELECT answer FROM dashboard WHERE question = '$question'";

$response = $db -> query($get_data);

if($response -> num_rows != 0){
    $data = $response -> fetch_assoc();
    echo json_encode($data);
}else{
    echo "Thank You!";
}

?>