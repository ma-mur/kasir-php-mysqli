<?php
include 'cek_session.php';

$id = $_GET['id'];
$sql = "SELECT *  FROM penjualan where no_penjualan='$id' ";
$result = $con->query($sql);

$html = '
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
	<h1 align="center">Struk Penjualan</h1>
	<hr style="width: 100px;align-items: center;margin-bottom: 20px;background-color: #000">
<table style="width: 100%" class="table table-bordered table-striped">
	<tr align="center">
		<th>No</th>
	    <th>Tanggal</th>
	    <th>Nama Produk</th>
	    <th>Jumlah Beli</th>
	    <th>Harga</th>
	    <th>Total</th>
	</tr>';

$no = 1;
while($row = $result->fetch_assoc()){

$html .='
	<tr align="center">
		<td>'.$no++.'</td>
		<td>'.$row['tanggal_penjualan'].'</td>
		<td>'.$row['nama_produk'].'</td>
		<td>'.$row['jumlah_beli'].'</td>
		<td>'.$row['harga_produk'].'</td>
		<td>'.$row['total'].'</td>
	</tr>';
}

$html .='	
</table>
</body>
</html>';



require_once '../assets/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4','potrait');
$dompdf->render();
$dompdf->stream('laporan_penjualan');

?>