<?php

$conn = mysqli_connect("localhost","root","","profit-report");

$email = $_POST["email"];
$name = $_POST["name_user"];
$username = $_POST["username"];
$password = md5($_POST['password']);

$query = "INSERT INTO user VALUES (NULL,'$email','$name','$username','$password','kasir')";

$result = mysqli_query($conn, $query);
if ($result) {
   header('Location: index.php');
} else if (mysqli_connect_error($conn, $query)) {
    echo "Pendaftaran gagal : " . mysqli_error($conn);
}
?>