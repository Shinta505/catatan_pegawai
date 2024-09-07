<?php
session_start();
include 'connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone_number = $_POST['phone_number'];
$hire_date = $_POST['hire_date'];
$job_title = $_POST['job_title'];
$salary = $_POST['salary'];
$department_name = $_POST['department_name'];
$address = $_POST['address'];
$date_of_birth = $_POST['date_of_birth'];
$foto = $_POST['foto'];

$query = mysqli_query($connect, "INSERT INTO employees
             VALUES('', '$first_name', '$last_name', '$email', '$gender', '$phone_number', '$hire_date', '$job_title', '$salary', '$department_name', '$address', '$date_of_birth', '$foto')")
    or die(mysqli_error($connect));

if ($query) {
    header("Location: employee_details.php");
} else {
    echo "Proses tambah pegawai gagal";
}
?>