<?php
include 'cek_session.php';

$sql = "SELECT * FROM supplier";
$result = $con->query($sql);

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql= "DELETE from supplier where id='$id'";
    if ($con->query($sql)===true) {
        echo '<script>alert("berhasil dihapus");
        document.location.href="data_supplier.php";
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
				  		<h2 class="card-title">Data Supplier</h2>
				  		<div class="row">
                            <div class="col-md-12">
                                 <a href="#" class="btn btn-success" data-target="#tambahdata" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
				  			<div class="col-md-12 ">
				  				<table id="datatabel" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        							<thead>
        								<tr>
        									<th>No</th>
	        								<th>Nama Lengkap</th>
	        								<th>No Telp</th>
	        								<th>Alamat</th>
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
        									<td><?php echo $row['nama_lengkap']?></td>
        									<td><?php echo $row['no_telp']?></td>
        									<td><?php echo $row['alamat']?></td>
        									<td>
                                                <a href="admin/data_supplier.php?id=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('Apakah ingin menghapusnya?');"><i class="fas fa-trash"></i></a>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="post" action="koneksi/supplier.php">
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </form>

            </div>
        </div>
    </div>
</div>


<?php include'footer.php';?>