<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bpit_training_placement_management_system";
$conn;
try{
    global $conn;
    $conn = mysqli_connect($servername,$username,$password,$database);
}catch(Exception $error){
    echo "Connection was not successfull<br>";
}

if($conn){
    echo "Connection was successfull<br>";
}