<?php

$host="localhost";
$user="root";
$password="";
$dbname="house";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Connection Faild: " . $conn->connect_error);
}

?>