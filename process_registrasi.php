<?php
session_start();
include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phoneNumber = $_POST['phoneNumber'];
$dateBirth = $_POST['dateBirth'];
$jenisKelamin = $_POST['jenisKelamin'];

$query = mysqli_query($connect, "INSERT INTO users
             VALUES('', '$username', '$password', '$firstName', '$lastName', '$phoneNumber', '$dateBirth', '$jenisKelamin')")
    or die(mysqli_error($connect));

if ($query) {
    header("Location: login.php?pesan=berhasil");
} else {
    echo "Proses registrasi gagal";
}
?>