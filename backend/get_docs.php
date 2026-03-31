<?php
session_start();
include "db.php";

// IMPORTANT: fix encoding
header("Content-Type: application/json; charset=UTF-8");

// check login
if(!isset($_SESSION['user_code'])){
    echo "[]";
    exit();
}

$user_code = $_SESSION['user_code'];

$sql = "SELECT doc_type, filename FROM documents WHERE user_code='$user_code'";
$res = $conn->query($sql);

$data = array();

if($res){
    while($row = $res->fetch_assoc()){
        $data[] = $row;
    }
}

// return simple array (no status object)
echo json_encode($data);
?>