<?php
// koneksi ke database
include 'connection.php';

// Query untuk mendapatkan jumlah total pegawai
$sqlTotal = "SELECT COUNT(*) as total_employees FROM employees";
$result = $connect->query($sqlTotal);
$total_employees = $result->num_rows > 0 ? $result->fetch_assoc()['total_employees'] : 0;

// Query untuk mendapatkan jumlah pegawai perempuan
$sqlFemale = "SELECT COUNT(*) as total_female FROM employees WHERE gender = 'Perempuan'";
$result = $connect->query($sqlFemale);
$total_female = $result->num_rows > 0 ? $result->fetch_assoc()['total_female'] : 0;

// Query untuk mendapatkan jumlah pegawai laki-laki
$sqlMale = "SELECT COUNT(*) as total_male FROM employees WHERE gender = 'Laki-laki'";
$result = $connect->query($sqlMale);
$total_male = $result->num_rows > 0 ? $result->fetch_assoc()['total_male'] : 0;

// Tutup koneksi database
$connect->close();

// Siapkan data untuk chart
$dataPoints = array(
    array("label" => "Male", "symbol" => "L", "y" => $total_male),
    array("label" => "Female", "symbol" => "P", "y" => $total_female)
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        // Kirim data PHP ke script.js dengan global JavaScript variable
        var totalEmployees = <?php echo $total_employees; ?>;
        var totalFemale = <?php echo $total_female; ?>;
        var totalMale = <?php echo $total_male; ?>;
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Jumlah Pegawai"
                },
                data: [{
                    type: "doughnut",
                    indexLabel: "{symbol} - {y}",
                    yValueFormatInt: "\" orang\"",
                    showInLegend: true,
                    legendText: "{label} : {y}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">ShintaWebsite</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <img class="sidebar-logo-img" src="assets/dashboard-cartoon.svg" alt="Logo">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-users"></i>
                        <span>Data Pegawai</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="employee_details.php" class="sidebar-link">Detail Pegawai</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="employee_add.php" class="sidebar-link">Tambah Pegawai</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#buttonLogout">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <!-- Modal Logout -->
            <div class="modal fade" id="buttonLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar Akun</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="logout.php" class="btn btn-primary">Ya</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#">SELAMAT DATANG | PT. HIDUP SEJAHTERA</a>
                </div>
            </nav>
            <!-- navbar -->

            <!-- isi dashboard -->
            <div class="col-md-15 p-5 pt-4">
                <h4>
                    <i class="lni lni-dashboard"></i>
                    <b>DASHBOARD</b>
                </h4>
                <hr>

                <div class="row">
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body text-white">
                            <div class="card-body-icon">
                                <i class="lni lni-users"></i>
                            </div>
                            <h5 class="card-title">TOTAL PEGAWAI</h5>
                            <div class="display-4"><?php echo $total_employees; ?></div>
                            <a href="employee_details.php">
                                <p class="card-text">Lihat Detail <i class="lni lni-angle-double-right"></i></p>
                            </a>
                        </div>
                    </div>

                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body text-white">
                            <div class="card-body-icon">
                                <i class="lni lni-users"></i>
                            </div>
                            <h5 class="card-title">MALE</h5>
                            <div class="display-4"><?php echo $total_male; ?></div>
                            <a href="employee_male.php">
                                <p class="card-text">Lihat Detail <i class="lni lni-angle-double-right"></i></p>
                            </a>
                        </div>
                    </div>

                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body text-white">
                            <div class="card-body-icon">
                                <i class="lni lni-users"></i>
                            </div>
                            <h5 class="card-title">FEMALE</h5>
                            <div class="display-4"><?php echo $total_female; ?></div>
                            <a href="employee_female.php">
                                <p class="card-text">Lihat Detail <i class="lni lni-angle-double-right"></i></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <!-- isi dashboard -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>