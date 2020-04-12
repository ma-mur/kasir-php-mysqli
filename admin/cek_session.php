<?php
session_start();

include '../koneksi/koneksi.php';

if (!isset($_SESSION['username'])) {
	 echo '<script>alert("Anda Belum Login");
        document.location.href="../index.php";
        </script>';
}

if ($_SESSION['level']!='admin') {
	 echo '<script>alert("Anda Bukan Admin");
        document.location.href="../index.php";
        </script>';
}



?>