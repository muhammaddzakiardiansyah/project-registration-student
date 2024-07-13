<?php
session_start();
 
require './functions.php';

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

if (!empty($_POST)) {
    $_POST[] = ['nis' => rand(1, 100000)];
    $_POST[] = $_POST;
    $csrfTokenInSession = $_SESSION['csrf_token'] ?? '';
    $csrfTokenOnInput = $_POST['csrf_token'] ?? '';
    if ($csrfTokenInSession === $csrfTokenOnInput) {
        session_unset();
        session_destroy();
        $addStudent = addStudent($_POST);
        if ($addStudent === 1) {
            $nis = $_POST[0]['nis'];
            echo "<script>
                alert('Selamat anda berhasil mendaftar!'); 
                alert('Copy nis anda : $nis untuk login.'); 
                document.location.href = 'datapendaftar.php';  
             </script>";
        } else if ($addStudent === 200) {
            echo "<script>
                alert('Maaf NISN anda sudah digunakan untuk mendaftar.')
                document.location.href = 'datapendaftar.php';  
             </script>";
        } else {
            echo "<script>
                alert('Maaf anda gagal mendaftar.')
             </script>";
        }
    } else {
        echo "<script>
                alert('Maaf anda gagal mendaftar.')
             </script>";
    }
}

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
            <a class="navbar-brand text-white fw-bold" href="index.php">Form pendaftaran siswa baru</a>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- content -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="card p-5">
                    <h2 class="fw-bold mb-5">Form pendaftaran</h2>
                    <form action="" method="post">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Nama Lengkap" name="nama_siswa" class="form-control" id="nama_siswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                            <input type="number" placeholder="NISN" name="nisn" class="form-control" id="nisn" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" placeholder="Alamat Lengkap" id="alamat" class="form-control" rows="5" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="jenis_kelamin">Jenis kelamin <span class="text-danger">*</span></label>
                            <div class="d-flex gap-3 mx-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki laki">
                                    <label class="form-check-label" for="laki_laki">
                                        Laki laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                            <select class="form-select" id="agama" name="agama" aria-label="Default select example" required>
                                <option selected>Pilih agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="asal_sekolah" class="form-control" id="asal_sekolah" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                            <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example" required>
                                <option selected>Pilih Jurusan</option>
                                <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif (TKRO)</option>
                                <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor (TBSM)</option>
                                <option value="Pengembangan Perangkat Lunak & Gim">Pengembangan Perangkat Lunak & Gim (PPLG)</option>
                                <option value="Teknik Jaringan Komputer & Telekomunikasi">Teknik Jaringan Komputer & Telekomunikasi (TJKT)</option>
                                <option value="Busana Butik">Busana Butik (BB)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Daftar</button>
                        <a href="index.php" class="btn btn-primary mt-4">Kembali ke home</a>
                    </form>
                </div>
                <div class="mb-5"></div>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- source bootstrap js -->
    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>