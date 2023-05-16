<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'course';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die('bazaga ulana olmadi:' . $conn->connect_error);
}

?>
