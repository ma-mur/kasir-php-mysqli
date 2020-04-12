<?php
include "koneksi.php";


$user = $_POST['user'];
$pass = md5($_POST['pass']);
$nama = $_POST['nama_lengkap'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];

$sql = "INSERT INTO user (username,password,nama_lengkap,no_telp,alamat,level) values('$user','$pass','$nama','$no_telp','$alamat','$level')";

if ($con->query($sql)===true){
	echo "<script>
	alert('Berhasil');
	document.location.href='../admin/data_pengguna.php';
	</script>";
}else{
	echo "error :".$sql."<br/>".$con->error;
}

$con->close();

?>