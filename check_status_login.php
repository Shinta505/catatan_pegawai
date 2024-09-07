<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysqli_error($connect));
$check = mysqli_num_rows($data);

if ($check > 0) {
    $employee = $data->fetch_assoc();
    $_SESSION['employee_id'] = $employee["employee_id"];
    $_SESSION['username'] = $username;
    $_SESSION['status']   = "login";
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
