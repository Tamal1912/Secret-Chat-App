<?php

$host = "localhost";
$user = "root";
$password = "";
$db="secrett-chat";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    echo "Connection failed";
    exit(1);
}
?>