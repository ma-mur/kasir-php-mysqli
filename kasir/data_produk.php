<?php
include 'cek_session.php';

$sql = "SELECT * FROM produk";
$result = $con->query($sql);


include'header.php';
 ?>

	   <div class="content">
        <main>
          	<div class="container-fluid">
          		<div class="card">
				  	<div class="card-body">
				  		<h2 class="card-title">Data Produk</h2>
				  		<div class="row">
				  			<div class="col-md-12 ">
				  				<table id="datatabel" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        							<thead>
        								<tr>
        									<th>No</th>
	        								<th>Kode produk</th>
	        								<th>Nama Produk</th>
	        								<th>Harga Jual</th>
	        								<th>Harga Pokok</th>
	        								<th>Stok</th>
	        								<!-- <th>Aksi</th> -->
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
        									<td><?php echo $row['kode_produk']?></td>
        									<td><?php echo $row['nama_produk']?></td>
        									<td><?php echo $row['harga_jual']?></td>
        									<td><?php echo $row['harga_pokok']?></td>
        									<td><?php echo $row['stok']?></td>
        									<!-- <td><button class="btn btn-info"><i class="fas fa-cart-plus"></i> Beli</button></td> -->
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