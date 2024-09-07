<?php
include 'connection.php';

$employee_id = $_POST['employee_id'];
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

$query = mysqli_query($connect, "UPDATE `employees` SET `first_name`='$first_name', `last_name`='$last_name', `email`='$email', `gender`='$gender', `phone_number`='$phone_number', `hire_date`='$hire_date', `job_title`='$job_title', `salary`='$salary', `department_name`='$department_name', `address`='$address', `date_of_birth`='$date_of_birth', `foto`='$foto' WHERE `employees`.`employee_id`='$employee_id';");

if ($query) {
    echo "Data pegawai berhasil diperbarui.";
    header("Location: employee_details.php");
    exit();
} else {
    echo "Proses edit pegawai gagal: " . mysqli_error($connect);
}
?>