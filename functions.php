<?php

$connection = mysqli_connect('localhost', 'root', '', 'students_collection');

if (mysqli_connect_error()) {
    die('Database dont connected');
}

function getAllStudents()
{
    global $connection;
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);
    $allData = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $allData[] = $data;
    }
    return $allData;
}

// fungsi menambahkan pendaftaran data siswa
function addStudent(array $data)
{
    global $connection;

    $nama_siswa = htmlspecialchars($data['nama_siswa']);
    $alamat = htmlspecialchars($data['alamat']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $agama = htmlspecialchars($data['agama']);
    $asal_sekolah = htmlspecialchars($data['asal_sekolah']);

    $query = "INSERT INTO students (nama_siswa, alamat, jenis_kelamin, agama, asal_sekolah) VALUES ('$nama_siswa', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function deleteStudent(string $id)
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
