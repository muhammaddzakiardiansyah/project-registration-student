<?php

require './functions.php';


if (isset($_GET['id'])) {
    if (deleteStudent($_GET['id']) > 0) {
        echo "<script>
                alert('Berhasil menghapus data!'); 
                document.location.href = 'datapendaftar.php';
             </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!'); 
                document.location.href = 'datapendaftar.php';
             </script>";
    }
}
