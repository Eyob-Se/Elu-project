<?php

$host="localhost";
$user="root";
$password="";
$dbname="rental_system";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connection Faild: " . $conn->connect_error);
}else {
    echo "Connected Successfully";
}

?>