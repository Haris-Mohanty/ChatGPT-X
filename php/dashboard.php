<?php

//DATABASE LINK
require_once("../common/php/database.php");

$question = $_POST['question'];
$answer = $_POST['answer'];

$get_data = "SELECT * FROM dashboard";

$response = $db -> query($get_data);

if($response){

}else{
    $create_table = "CREATE TABLE ";
}

?>