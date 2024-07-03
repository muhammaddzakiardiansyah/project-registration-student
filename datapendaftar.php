<?php 

require './functions.php';

$students = getAllStudents();

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
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
    </nav>
    <!-- end navbar -->
    <!-- content -->
    <div class="container">
        <h2 class="mt-5 fw-bold">Data pendaftar di SMK Syafi'i Akrom</h2>
        <div class="table-responsiv">
            <table class="table table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($students as $student) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <th>214567</th>
                            <td><?php echo $student['nama_siswa'] ?></td>
                            <td><?php echo $student['jenis_kelamin'] ?></td>
                            <td><?php echo $student['asal_sekolah'] ?></td>
                            <td>
                                <a href="detailpendaftar.php" class="btn btn-sm btn-info">Detail</a> <a href="editdatasiswa.php" class="btn btn-sm btn-warning">Edit</a> <a onclick="return confirm('Yakin ingin menghapus?')" href="hapus.php?id=<?php echo $student['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="7" class="fw-bold text-center">Total pendaftar : <?php echo count($students) ?? 0 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="index.php" class="btn btn-primary mt-5">Kembali ke home</a>
    </div>
    <!-- end content -->
    <!-- source bootstrap js -->
    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>