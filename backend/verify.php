<?php
include "db.php";

$user_code = $_POST['user_code'];
$doc_type = $_POST['doc_type'];

$file = $_FILES['file']['tmp_name'];

$newHash = hash_file("sha256", $file);

// fetch original
$sql = "SELECT * FROM documents 
        WHERE user_code='$user_code' AND doc_type='$doc_type'";

$res = $conn->query($sql);

if($res->num_rows == 0){
    echo "❌ No document found";
    exit();
}

$row = $res->fetch_assoc();
$storedHash = $row['hash'];

if($newHash == $storedHash){
    echo "✅ Document Verified";
} else {
    echo "❌ Document Tampered";
}
?>