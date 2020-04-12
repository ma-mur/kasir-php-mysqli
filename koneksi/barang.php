<?php
include "koneksi.php";


$kode = $_POST['kode_produk'];
$nama = $_POST['nama_produk'];
$harga_jual = $_POST['harga_jual'];
$harga_pokok = $_POST['harga_pokok'];
$stok = $_POST['stok'];
$supplier = $_POST['supplier'];

$sql = "INSERT INTO produk (kode_produk,nama_produk,harga_jual,harga_pokok,stok,id_supplier) values('$kode','$nama','$harga_jual','$harga_pokok','$stok','$supplier')";

if ($con->query($sql)===true){
	echo "<script>
	alert('Berhasil');
	document.location.href='../admin/data_barang.php';
	</script>";
}else{
	echo "error :".$sql."<br/>".$con->error;
}

$con->close();

?>