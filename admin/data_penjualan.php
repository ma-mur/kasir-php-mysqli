<?php
include 'cek_session.php';

$sql = "SELECT * FROM penjualan";
$result = $con->query($sql);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE from penjualan where id='$id'";
    if ($con->query($sql)===true) {
        echo '<script>alert("berhasil dihapus");
        document.location.href="data_penjualan.php";
        </script>';
    }else{
        echo  'salah';
    }
}


include'header.php';
 ?>

	   <div class="content">
        <main>
          	<div class="container-fluid">
          		<div class="card">
				  	<div class="card-body">
				  		<h2 class="card-title">Data Penjualan</h2>
                        <div class="row">
				  		    <div class="col-md-12">
                                <a href="admin/laporan_penjualan.php" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                            </div>
				  			<div class="col-md-12 ">
				  				<table id="datatabel" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        							<thead>
        								<tr>
        									<th>no</th>
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
        									<td><?php echo $row['tanggal_penjualan']?></td>
        									<td><?php echo $row['nama_produk']?></td>
        									<td><?php echo $row['jumlah_beli']?></td>
        									<td><?php echo $row['harga_produk']?></td>
        									<td><?php echo $row['total']?></td>
        									<td>
                                                <button onclick="tampil('<?php echo $row['id']?>')" class="btn btn-info" name="" id="modal" ><i class="fas fa-eye" ></i></button>
                                                <a href="admin/data_penjualan.php?id=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapusnya?');"><i class="fas fa-trash"></i></a>
                                            </td>
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

<div id="lihatdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <!--  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Data Penjualan</h4>
            </div>

            <div class="modal-body">
            </div>
        </div>
    </div> -->
</div>

<script type="text/javascript">
   function tampil(p){
      var id = p;
           $.ajax({
                   url: "admin/detail_penjualan.php",
                   type: "GET",
                   data : {id: id},
                   success: function (ajaxData){
                   $("#lihatdata").html(ajaxData);
                   $("#lihatdata").modal('show',{backdrop: 'true'});
               }
               });
        }
</script>
<?php include'footer.php';?>