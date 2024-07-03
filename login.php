<?php 

require './functions.php';

if(!empty($_POST)) {
    if(addStudent($_POST) > 0) {
        echo "<script>
                alert('Selamat anda berhasil mendaftar!'); 
                document.location.href = 'datapendaftar.php';  
             </script>";
    } else {
        echo "<script>
                alert('Maaf anda gagal mendaftar!')
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
            <a class="navbar-brand text-white fw-bold" href="index.php">SMK Syafi'i Akrom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- content -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 mx-auto">
                <div class="card p-5">
                    <h2 class="fw-bold mb-5">Login</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Nama Lengkap" name="nama_siswa" class="form-control" id="nama_siswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">NIS <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Masukan NIS" name="asal_sekolah" class="form-control" id="asal_sekolah" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Login</button>
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