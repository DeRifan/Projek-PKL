<?php
require "cek_login.php";
$email = $_POST["email"];
$name = $_POST["name_user"];
$username = $_POST["username"];
$password = $_POST["password"];

$quiry_sql = "INSERT INTO user (email, name_user, username, password)
            VALUES ('$email','$name','$username','$password')";

if (mysqli_query($conn, $query_sql)) {
    header("location:index.php");
} else {
    echo "Pendaftaran gagal : " . mysqli_error($conn);
}
?>