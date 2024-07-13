<?php
session_start();

require './functions.php';

if (isset($_COOKIE['key']) && isset($_COOKIE['id'])) {
    $dataStudentExits = getDetailStudent($_COOKIE['id']);
    if ($_COOKIE['key'] === hash('sha256', $dataStudentExits['nama_siswa'])) {
        $_SESSION['userLogin'] = ['login' => true, 'username' => $dataStudentExits['nama_siswa'], 'nis' => $dataStudentExits['nis']];
    }
}
if (isset($_SESSION['userLogin'])) {
    header('Location: datapendaftar.php');
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}


if (!empty($_POST)) {
    $namaSiswa = $_POST['nama_siswa'];
    $nis = $_POST['nis'];
    $csrfTokenInSession = $_SESSION['csrf_token'] ?? '';
    $csrfTokenOnInput = $_POST['csrf_token'] ?? '';
    if ($csrfTokenInSession === $csrfTokenOnInput) {
        session_unset();
        session_destroy();
        $dataStudent = getStudentByStudentName($namaSiswa);
        if ($dataStudent === []) {
            $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
            echo "<script>
                    alert('Nama siswa tidak ditemukan.')
                  </script>";
        } else {
            $password = $dataStudent['password'] ?? '';
            if (password_verify($nis, $password)) {
                $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
                $_SESSION['userLogin'] = ['login' => true, 'username' => $dataStudent['nama_siswa'], 'nis' => $dataStudent['nis']];
                setcookie('id', $dataStudent['id'], time() + 86400);
                setcookie('key', hash('sha256', $dataStudent['nama_siswa']), time() + 86400);
                header('Location: datapendaftar.php');
            } else {
                $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
                echo "<script>
                        alert('Password Salah.')
                      </script>";
            }
        }
    } else {
        echo "<script>
                    alert('Gagal login.')
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
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>">
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" placeholder="Masukan Nama Siswa" name="nama_siswa" class="form-control" id="nama_siswa" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS <span class="text-danger">*</span></label>
                            <input type="password" placeholder="Masukan NIS" name="nis" class="form-control" id="nis" autocomplete="off" required>
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