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

    if($db -> query($create_table)){

        $insert_data = "INSERT INTO dashboard(question, answer) VALUES ('$question', '$answer')";

        if($db -> query($insert_data)){
            echo "success";
        }else{
            echo "Unable to Store Data!";
        }

    }else{
        echo "Unable to Create Table!";
    }
}

?>