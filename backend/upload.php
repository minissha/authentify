<?php
session_start();
include "db.php";

$user_code = $_SESSION['user_code'];

for($i=0; $i<count($_FILES['file']['name']); $i++){

    $doc_type = $_POST['doc_type'][$i];
    $file = $_FILES['file']['tmp_name'][$i];
    $filename = $_FILES['file']['name'][$i];

    $hash = hash_file("sha256", $file);

    move_uploaded_file($file, "../uploads/" . $filename);

    $sql = "INSERT INTO documents (user_code, doc_type, hash, filename)
            VALUES ('$user_code', '$doc_type', '$hash', '$filename')";

    $conn->query($sql);
}

echo "Uploaded Successfully";
?>