<?php
include 'connection.php';

if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $query = "DELETE FROM employees WHERE employee_id = '$employee_id'";

    if (mysqli_query($connect, $query)) {
        echo "Data berhasil dihapus";
        header("Location: employee_details.php");
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>