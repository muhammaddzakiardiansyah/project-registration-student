<?php
session_start();

require './functions.php';

if (isset($_COOKIE['key']) && isset($_COOKIE['id'])) {
    $dataStudentExits = getDetailStudent($_COOKIE['id']);
    if ($_COOKIE['key'] === hash('sha256', $dataStudentExits['nama_siswa'])) {
        $_SESSION['userLogin'] = ['login' => true, 'username' => $dataStudentExits['nama_siswa'], 'nis' => $dataStudentExits['nis']];
    }
}

$username = $_SESSION['userLogin']['username'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Syafi'i Akrom</title>
    <!-- link bootstrap css -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- link sc css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- link favicon -->
    <link rel="shortcut icon" href="./assets/img/logo-smk.png" type="image/x-icon">
</head>

<body class="font-primary">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-sc-primary fixed-top">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">SMK Syafi'i Akrom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="pendaftaran.php">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="jurusan.php">Jurusan</a>
                    </li>
                </ul>
            </div>
            <?php if ($username) : ?>
                <!-- Example split danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary"><?php echo $username ?></button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <a href="login.php" class="btn btn-primary">Login</a>
            <?php endif ?>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- content -->
    <div class="container">
        <div class="row section">
            <div class="col-lg-8 section-text">
                <h3>Selamat datang di</h3>
                <h1 class="fw-bold fs-sc-large">SMK Syafi'i Akrom</h1>
                <p>Sekolah yang mengedepankan akhlak dan prestasi</p>
                <div class="mt-4">
                    <a href="pendaftaran.php" class="btn btn-primary">Daftar siswa baru</a>
                    <a href="datapendaftar.php" class="btn btn-primary">Lihat siswa pendaftar</a>
                </div>
            </div>
            <div class="col-lg-4 text-center section-img">
                <img src="./assets/img/logo-smk.png" class="img-fluid" alt="logo smk syafi'i akrom" width="400" height="400">
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- source bootstrap js -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>