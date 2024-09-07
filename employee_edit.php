<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/employee_add.css">
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
                    <b>EDIT PEGAWAI</b>
                </h4>
                <hr>

                <?php
                include 'connection.php';
                $employee_id = $_GET['employee_id'];

                $query = mysqli_query($connect, "SELECT * FROM employees WHERE employee_id='$employee_id'");
                $data = mysqli_fetch_array($query);
                ?>

                <form action="process_edit.php" method="POST">
                    <div class="row g-2">
                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="inputFirstName" name="first_name" value="<?php echo $data['first_name']; ?>" required>
                                <label for="inputFirstName">First Name</label>
                            </div>
                        </div>

                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="inputLastName" name="last_name" value="<?php echo $data['last_name']; ?>" required>
                                <label for="inputLastName" class="form-label">Last Name</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $data['email']; ?>" required>
                                <label for="inputEmail" class="form-label">Email</label>
                            </div>
                        </div>

                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="inputPhone" name="phone_number" value="<?php echo $data['phone_number']; ?>" required>
                                <label for="inputPhone" class="form-label">Phone Number</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="inputHire" name="hire_date" value="<?php echo $data['hire_date']; ?>" required>
                                <label for="inputHire" class="form-label">Hire Date</label>
                            </div>
                        </div>

                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="inputJob" name="job_title" value="<?php echo $data['job_title']; ?>" required>
                                <label for="inputJob" class="form-label">Job Title</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2 my-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="inputSalary" name="salary" value="<?php echo $data['salary']; ?>" required>
                                <label for="inputSalary" class="form-label">Salary</label>
                            </div>
                        </div>

                        <div class="col-md my-2">
                            <div class="form-floating">
                                <input type="date" class="form-control" id="inputBirthDay" name="date_of_birth" value="<?php echo $data['date_of_birth']; ?>" required>
                                <label for="inputBirthDay" class="form-label">Date of Birth</label>
                            </div>
                        </div>
                    </div>

                    <div class="row g2">
                        <div class="col-md my-2">
                            <label for="inputGender" class="form-label ml-3">Gender</label>
                            <?php 
                                include 'connection.php';

                                $employee_id = $_GET['employee_id'];
                                $query = mysqli_query($connect, "SELECT * FROM employees WHERE employee_id = '$employee_id'");
                                $data = mysqli_fetch_array($query);
                            ?>
                            <select name="gender" id="inputGender" class="py-3 px-5">
                                <option value="<?php echo $data['gender'] ?>" selected><?php echo $data['gender'] ?></option>
                            </select>
                        </div>

                        <div class="col-md my-2">
                            <label for="inputDepartemen" class="form-label ml-3">Departemen</label>
                            <?php 
                                include 'connection.php';

                                $employee_id = $_GET['employee_id'];
                                $query = mysqli_query($connect, "SELECT * FROM employees WHERE employee_id = '$employee_id'");
                                $data = mysqli_fetch_array($query);
                            ?>
                            <select name="department_name" id="inputDepartemen" class="py-3 px-5">
                                <option value="<?php echo $data['department_name'] ?>" selected><?php echo $data['department_name'] ?></option>
                            </select>
                        </div>

                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" id="inputAddress" rows="10" name="address"><?php echo $data['address']; ?></textarea>
                        <label for="inputAddress">Alamat Lengkap</label>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="inputFoto" name="foto" value="<?php echo $data['foto']; ?>">
                        <label for="inputFoto">Url Foto</label>
                    </div>

                    <div class="btn-group d-flex justify-content-center">
                        <button class="m-3 rounded-pill border border-0 px-5 py-2 fw-medium bg-warning" type="submit" name="edit_pegawai">Submit</button>
                        <a href="employee_details.php" class="text-white"></a><button class="m-3 rounded-pill border border-0 px-5 py-2 fw-medium bg-danger">Cancel</button></a>
                    </div>
                    <input type="hidden" name="employee_id" value="<?php echo $data['employee_id'] ?>"> <br>
                </form>
            </div>
        </div>

        <script src="js/employee_add.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>