<?php

//DATABASE LINK
require_once("../common/php/database.php");

$question = $_POST['question'];
$answer = $_POST['answer'];

$get_data = "SELECT * FROM dashboard";

$response = $db -> query($get_data);

if($response){

}else{
    $create_table = "CREATE TABLE dashboard(
        id INT(11) NOT NULL AUTO_INCREMENT,
        question VARCHAR(255),
        answer MEDIUMTEXT,
        PRIMARY KEY(id)
    )";

    if($db -> $($create_table)){

        $insert_data = "INSERT INTO dashboard(question, answer) VALUES ('', '$answer')";

    }else{
        echo "Unable to Create Table!";
    }
}

?>