<?php
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$user_code = "USER" . rand(1000,9999);

// check duplicate
$check = "SELECT * FROM users WHERE username='$username'";
$res = $conn->query($check);

if($res->num_rows > 0){
    echo "User already exists";
} else {
    $sql = "INSERT INTO users (username, password, user_code)
            VALUES ('$username', '$password', '$user_code')";

    if($conn->query($sql)){
        echo "Signup Success";
    } else {
        echo "Error";
    }
}
?>