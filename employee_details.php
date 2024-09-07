<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pegawai</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/employee_details.css">
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
                    <a class="navbar-brand text-white" href="#">PT. HIDUP SEJAHTERA</a>
                </div>
            </nav>
            <!-- navbar -->

            <div class="col-md-15 p-5 pt-4">
                <h4 class="text-center">
                    <i class="lni lni-users"></i>
                    <b>TABEL DAFTAR PEGAWAI</b>
                </h4>
                <hr>
                <div class="card shadow">
                    <div class="card-body">
                        <a href="employee_add.php" class="btn btn-danger my-3">Tambah Data</a>
                        <table class="table table-danger table-striped">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Lengkap</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Telpon</th>
                                    <th>Hire</th>
                                    <th>Job</th>
                                    <th>Gaji</th>
                                    <th>Departemen</th>
                                    <th>Alamat</th>
                                    <th>Tgl Lahir</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connection.php';
                                $query = mysqli_query($connect, "SELECT * FROM employees");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['employee_id']; ?></td>
                                        <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                                        <td><img src="<?php echo $data['foto']; ?>" alt="" width="70rem" height="70rem"></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['gender']; ?></td>
                                        <td><?php echo $data['phone_number']; ?></td>
                                        <td><?php echo $data['hire_date']; ?></td>
                                        <td><?php echo $data['job_title']; ?></td>
                                        <td>Rp <?php echo $data['salary']; ?></td>
                                        <td><?php echo $data['department_name'] ?></td>
                                        <td><?php echo $data['address']; ?></td>
                                        <td><?php echo $data['date_of_birth']; ?></td>
                                        <td><a href="employee_edit.php?employee_id=<?php echo $data['employee_id']; ?>" type="button" class="btn btn-light">Edit</a></td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $data['employee_id']; ?>">Hapus</a>
                                        </td>

                                        <!-- Modal Hapus Pegawai -->
                                        <div class="modal fade" id="deleteModal<?php echo $data['employee_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pegawai</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus pegawai ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                        <a href="employee_delete.php?employee_id=<?php echo $data['employee_id']; ?>" class="btn btn-primary">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/employee_details.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>