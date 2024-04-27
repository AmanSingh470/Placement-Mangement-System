<?php

include 'connection.php';
include 'query.php';

function xss_prevent($value)
{
    return strip_tags(htmlspecialchars($value));
}

function sql_prevent($conn, $value)
{
    return mysqli_real_escape_string($conn, $value);
}

function sendData($success, $data){
    if(gettype($data) == 'string') echo json_encode(array("success"=>$success, "message"=>$data));
    else echo json_encode(array("success"=>$success, "data"=>$data));
    die;
}

