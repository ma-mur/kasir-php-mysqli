<?php
include 'cek_session.php';

$sql = "SELECT * FROM penjualan";
$result = $con->query($sql);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE from penjualan where id='$id'";
    if ($con->query($sql)===true) {
        echo '<script>alert("berhasil dihapus");
        document.location.href="dashboard.php";
        </script>';
    }else{
        echo '<script>alert("gagal dihapus");
        document.location.href="dashboard.php";
        </script>';
    }
}


include'header.php';
 ?>

	   <div class="content">
        <main>
          	<div class="container-fluid">
          		<div class="card">
				  	<div class="card-body">
				  		<h2 class="card-title">Riwayat Penjualan <a href="kasir/penjualan.php" class="btn btn-info"><i class="fas fa-cart-plus"></i> Transaksi</a></h2>
				  		<div class="row">
				  			<div class="col-md-12 ">
				  				<table id="datatabel" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        							<thead>
        								<tr>
        									<th>No</th>
	        								<th>No Penjualan</th>
	        								<th>Tanggal</th>
	        								<th>Nama Produk</th>
	        								<th>Jumlah Beli</th>
	        								<th>Harga</th>
	        								<th>Total</th>
	        								<th>Aksi</th>
        								</tr>
        							</thead>
        							<tbody>
<?php
$no = 1;
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
?>
        								<tr>
        									<td><?php echo $no++?></td>
        									<td><?php echo $row['no_penjualan']?></td>
        									<td><?php echo $row['tanggal_penjualan']?></td>
        									<td><?php echo $row['nama_produk']?></td>
        									<td><?php echo $row['jumlah_beli']?></td>
        									<td><?php echo $row['harga_produk']?></td>
        									<td><?php echo $row['total']?></td>
        									<td><a href="kasir/dashboard.php?id=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapusnya?')">Hapus</a></td>
        								</tr>
<?php
	}
}
?>
        							</tbody>
        						</table>
				  			</div>
				  		</div>
				  	</div>
				</div>
				
          	</div>
        </main>
      </div>   
</div>

<?php include'footer.php';?>