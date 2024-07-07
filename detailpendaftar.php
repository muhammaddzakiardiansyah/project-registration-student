<?php 

require './functions.php';

$id = $_GET['id'] ?? 0;
$student = getDetailStudent($id);

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
    <nav class="navbar navbar-expand-lg bg-sc-primary">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="index.php">Detail siswa pendaftar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- content -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card p-5">
                    <h2 class="fw-bold mb-5">Data Siswa</h2>
                    <table class="table">
                      <tr>
                        <td>Nama Siswa</td>
                        <td><?php echo $student['nama_siswa'] ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?php echo $student['alamat'] ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $student['jenis_kelamin'] ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td><?php echo $student['agama'] ?></td>
                      </tr>
                      <tr>
                        <td>Asal Sekolah</td>
                        <td><?php echo $student['asal_sekolah'] ?></td>
                      </tr>
                      <tr>
                        <td>Jurusan yang diambil</td>
                        <td><?php echo $student['jurusan'] ?></td>
                      </tr>
                    </table>
                </div>
                <a href="datapendaftar.php" class="btn btn-primary mt-5">Kembali ke tabel</a>
                <div class="mb-5"></div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- source bootstrap js -->
    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>