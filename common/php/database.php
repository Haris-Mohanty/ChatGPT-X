<?php

$db = new mysqli("localhost", "root", "8658763042@Haris", "chatgpt");

if($db -> connect_error){
    echo "Database not connected!";
}

?>