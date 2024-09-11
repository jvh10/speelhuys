<?php

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbDatabase = "steptember";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_error) {
    die("connectie mislukt: " . $conn->connect_error);
}
