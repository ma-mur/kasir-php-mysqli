<?php
include "koneksi.php";


$nama = $_POST['nama_lengkap'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO supplier (nama_lengkap,no_telp,alamat) values('$nama','$no_telp','$alamat')";

if ($con->query($sql)===true){
	echo "<script>
	alert('Berhasil');
	document.location.href='../admin/data_supplier.php';
	</script>";
}else{
	echo "error :".$sql."<br/>".$con->error;
}

$con->close();

?>