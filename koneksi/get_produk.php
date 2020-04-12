<?php
include 'koneksi.php';
	$id = $_GET["kode"];
	$sql = "SELECT * FROM produk where kode_produk='$id' OR nama_produk='$id'";
	$result = $con->query($sql);
	while($row = $result->fetch_assoc()){
		if ($result->num_rows > 0){
			$data = array(
			 	'nama_produk' =>$row['nama_produk'],
			 	'harga_produk' =>$row['harga_jual'],
			 	'stok' => $row['stok']
			);
		}else{
			$data = array(
			 	'nama_produk' =>'',
			 	'harga_produk' => '',
			 	'stok' => ''
			);
		}

		echo json_encode($data);
	}

	