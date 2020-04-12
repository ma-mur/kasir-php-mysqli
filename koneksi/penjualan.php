<?php
include "koneksi.php";

$data = array();
	$no_penjualan = $_POST['no_penjualan'];
	$nama = $_POST['nama'];
	$jumlah = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$total = $_POST['total'];
	$kode = $_POST['kode'];
	$bayar = $_POST['bayar'];
	$kembalian = $_POST['kembalian'];
	$tanggal = $_POST['tanggal'];
	$id_kasir = $_POST['id_kasir'];
	$nama_kasir = $_POST['nama_kasir'];
	$stoks = $_POST['stoks'];
	

for ($i=0; $i < count($kode); $i++) { 
	$sql = "insert into penjualan (no_penjualan,kode_produk,nama_produk,jumlah_beli,harga_produk,total,dibayar,kembalian,tanggal_penjualan,id_kasir,nama_kasir) values ('$no_penjualan','$kode[$i]','$nama[$i]','$jumlah[$i]','$harga[$i]','$total[$i]','$bayar','$kembalian','$tanggal','$id_kasir','$nama_kasir')";
	$result = $con->query($sql);

	$stok = $stoks[$i] - $jumlah[$i];
	$update = $con->query("UPDATE produk set stok='$stok' where kode_produk='$kode[$i]' ");
}
	
if ($result===true and $update === true){
	echo "<script>
	alert('Berhasil');
	document.location.href='../kasir/penjualan.php';
	</script>";
}else{
	echo "error :".$sql."<br/>".$con->error;
}

$con->close();

?>