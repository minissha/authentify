<?php
$conn = new mysqli("localhost", "root", "", "authentify");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// IMPORTANT: fix encoding issue
$conn->set_charset("utf8");
?>