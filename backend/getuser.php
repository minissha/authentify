<?php
session_start();

if(isset($_SESSION['user_code'])){
    echo $_SESSION['user_code'];
} else {
    echo "Not Logged In";
}
?>