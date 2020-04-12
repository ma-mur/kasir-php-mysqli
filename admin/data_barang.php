<?php
include 'cek_session.php';

$supplier = $con->query("SELECT * FROM supplier");
$result = $con->query("SELECT * FROM produk");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE from produk where kode_produk='$id'";
    if ($con->query($sql)===true) {
        echo '<script>alert("berhasil dihapus");
        document.location.href="data_barang.php";
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
				  		<h2 class="card-title">Data Barang</h2>
				  		<div class="row">
                            <div class="col-md-12">
                                <a href="#" class="btn btn-success" data-target="#tambahdata" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
				  			<div class="col-md-12 ">
				  				<table id="datatabel" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        							<thead>
        								<tr>
        									<th>No</th>
	        								<th>Kode Produk</th>
	        								<th>Nama Produk</th>
	        								<th>Harga Jual</th>
	        								<th>Harga Pokok</th>
	        								<th>Stok</th>
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
        									<td><?php echo $row['kode_produk']?></td>
        									<td><?php echo $row['nama_produk']?></td>
        									<td><?php echo $row['harga_jual']?></td>
        									<td><?php echo $row['harga_pokok']?></td>
        									<td><?php echo $row['stok']?></td>
        									<td>
                                                 <button onclick="tampil('<?php echo $row['kode_produk']?>')" class="btn btn-info" name="" id="modal" ><i class="fas fa-eye" ></i></button>
                                                 <button onclick="edit('<?php echo $row['kode_produk']?>')" class="btn btn-info" name="" id="modal" ><i class="fas fa-edit" ></i></button>
                                                <a href="admin/data_barang.php?id=<?php echo $row['kode_produk']?>" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapusnya?');"><i class="fas fa-trash"></i></a>
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

<div id="tambahdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Data Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="post" action="koneksi/barang.php">
                    <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" name="kode_produk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga Pokok</label>
                        <input type="text" name="harga_pokok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier" class="form-control" required="">
                        <?php while($row = $supplier->fetch_assoc()){
                            echo '<option value="'.$row['id'].'">'.$row['nama_lengkap'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </form>

            </div>
        </div>
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
                   url: "admin/detail_barang.php",
                   type: "GET",
                   data : {id: id},
                   success: function (ajaxData){
                   $("#lihatdata").html(ajaxData);
                   $("#lihatdata").modal('show',{backdrop: 'true'});
               }
               });
    }

    function edit(p){
      var id = p;
           $.ajax({
                   url: "admin/edit_barang.php",
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