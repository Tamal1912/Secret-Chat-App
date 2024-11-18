<?php

$host = "localhost";
$user = "root";
$password = "";
$db="secret-chat";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    echo "Connection failed";
}

?>