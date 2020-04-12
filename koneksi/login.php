<?php

include 'koneksi.php';

$error = '';

if (isset($_POST['submit'])) {
	
	$user = $_POST['username'];
	$pass = md5($_POST['password']);

	$sql = $con->query("SELECT * FROM user where username='$user' and password='$pass' ");
	if($sql->num_rows == 0){
		$error = 'Username atau Password Salah';
	}else{
		$row = $sql->fetch_assoc();
		$_SESSION['id_kasir'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['nama_lengkap'] = $row['nama_lengkap'];
		$_SESSION['level'] = $row['level'];

		if ($row['level'] == 'admin') {
			header('Location: admin/dashboard.php');
		}elseif ($row['level'] == 'kasir') {
			header('Localtion: kasir/dashboard');
		}else{
			$error = 'Gagal Login';
		}
	}

}
