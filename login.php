<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="login.php">LOGIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Login Container -->
    <div class="login-container">
        <!-- Pesan Login -->
        <p class="text-center">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger'>Login gagal! Username dan Password salah!</div>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-success'>Anda telah berhasil logout</div>";
                }
            }
            ?>
        </p>
        <!-- Pesan Login -->

        <!-- Form Login -->
        <form action="check_status_login.php" method="POST" class="text-center">
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="username" required>
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="inputPassword" name="password" aria-describedby="passwordHelpBlock" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;" aria-describedby="passwordHelpBlock">
                        <i class="bx bxs-low-vision"></i>
                    </span>
                </div>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="mt-3 text-center">Belum punya akun? <a href="registrasi.php" style="text-decoration: none;">Registrasi disini</a></p>
        </form>
        <!-- Form Login -->
    </div>
    <!-- Login Container -->

    <script src="js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>