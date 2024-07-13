<?php

declare(strict_types=1);

$connection = mysqli_connect('localhost', 'root', '', 'students_collection');

if (mysqli_connect_error()) {
    die('Database dont connected');
}

function getAllStudents(): array
{
    global $connection;
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);
    $allData = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $allData[] = $data;
    }
    return $allData ?? [];
}

function getStudentByStudentName(string $studentName): array
{
    global $connection;
    $query = "SELECT * FROM students WHERE nama_siswa = '$studentName' LIMIT 1";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($result) ?? [];
}

function getDetailStudent(string $id): array
{
    global $connection;
    $query = "SELECT * FROM students WHERE id = $id LIMIT 1";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($result) ?? [];
}


function addStudent(array $dataStudent): int
{
    global $connection;

    $nama_siswa = htmlspecialchars($dataStudent['nama_siswa']);
    $nisn = htmlspecialchars($dataStudent['nisn']);
    $nis = $dataStudent[0]['nis'];
    $alamat = htmlspecialchars($dataStudent['alamat']);
    $jenis_kelamin = htmlspecialchars($dataStudent['jenis_kelamin']);
    $agama = htmlspecialchars($dataStudent['agama']);
    $asal_sekolah = htmlspecialchars($dataStudent['asal_sekolah']);
    $jurusan = $dataStudent['jurusan'];

    $hash = password_hash("$nis", PASSWORD_ARGON2I);

    // condition nisn exist 
    $querySelect = "SELECT * FROM students WHERE nisn = $nisn LIMIT 1";
    $result = mysqli_query($connection, $querySelect);
    $countStudent = mysqli_fetch_assoc($result);
    if ($countStudent > 0) {
        return 200;
    } else {
        $queryInsert = "INSERT INTO students (nama_siswa, nisn, nis, alamat, jenis_kelamin, agama, asal_sekolah, jurusan, password) VALUES ('$nama_siswa', '$nisn', '$nis', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah', '$jurusan', '$hash')";

        mysqli_query($connection, $queryInsert);
        return mysqli_affected_rows($connection);
    }
}

function editStudent(array $dataStudent, string $id): int
{
    global $connection;

    $nama_siswa = htmlspecialchars($dataStudent['nama_siswa']);
    $nisn = htmlspecialchars($dataStudent['nisn']);
    $alamat = htmlspecialchars($dataStudent['alamat']);
    $jenis_kelamin = htmlspecialchars($dataStudent['jenis_kelamin']);
    $agama = htmlspecialchars($dataStudent['agama']);
    $asal_sekolah = htmlspecialchars($dataStudent['asal_sekolah']);
    $jurusan = $dataStudent['jurusan'];

    // condition nisn exist 
    $querySelect = "SELECT * FROM students WHERE nama_siswa = '$nama_siswa' LIMIT 1";
    $result = mysqli_query($connection, $querySelect);
    $countStudent = mysqli_fetch_assoc($result);
    if ($countStudent > 0) {
        if ($countStudent['nama_siswa'] == $nama_siswa) {
            $queryUpdate = "UPDATE students SET nama_siswa='$nama_siswa', nisn='$nisn', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', asal_sekolah='$asal_sekolah', jurusan='$jurusan'";

            mysqli_query($connection, $queryUpdate);
            return mysqli_affected_rows($connection);
        }
        return 200;
    } else {
        $queryUpdate = "UPDATE students SET nama_siswa='$nama_siswa', nisn='$nisn', alamat='$alamat', jenis_kelamin='$jenis_kelamin', agama='$agama', asal_sekolah='$asal_sekolah', jurusan='$jurusan' WHERE id = $id";

        mysqli_query($connection, $queryUpdate);
        return mysqli_affected_rows($connection);
    }
}

function deleteStudent(string $id): int
{
    global $connection;

    $student = mysqli_query($connection, "SELECT * FROM students WHERE id = $id");
    $user = mysqli_fetch_assoc($student) ?? [];

    if (count($user) > 0) {
        $user_id = $user['id'];
        $query = "DELETE FROM students WHERE id = $user_id";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    } else {
        return 0;
    }
}
