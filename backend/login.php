<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // store user_code in session
    $_SESSION['user_code'] = $row['user_code'];

    echo "Login Success";
} else {
    echo "Invalid Credentials";
}
?>