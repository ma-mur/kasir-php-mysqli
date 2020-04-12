<?php
session_start();

include '../koneksi/koneksi.php';

if (!isset($_SESSION['username'])) {
	 echo '<script>alert("Anda Belum Login");
        document.location.href="../index.php";
        </script>';
}

if ($_SESSION['level']!='kasir') {
	 echo '<script>alert("Anda Bukan Kasir");
        document.location.href="../index.php";
        </script>';
}



?>