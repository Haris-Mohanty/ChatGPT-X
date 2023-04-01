<?php

//DATABASE LINK
require_once("../common/php/database.php");

$email = $_POST['email'];
$password = $_POST['password'];

$check_email = "SELECT * FROM signup WHERE email = '$email'";

$response = $db -> query($check_email);


?>