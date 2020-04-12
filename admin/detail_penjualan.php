 <?php
include '../koneksi/koneksi.php';
$id = $_GET['id'];
$result = $con->query("SELECT * FROM penjualan where id='$id'");
while($row = $result->fetch_assoc()){
	

 ?>
 <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	 <h4 class="modal-title" id="myModalLabel">Detail Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	<table class="table table-bordered table-striped" style="width: 100%">
            		<tr>
            			<td colspan="2">Tanggal : <?php echo $row['tanggal_penjualan']?></td>
            		</tr>
            		<tr>
            			<td colspan="2">Kode Produk : <?php echo $row['kode_produk']?></td>
            			
            		</tr>
            		<tr>
            			<td colspan="2">Nama Produk : <?php echo $row['nama_produk']?></td>
            		</tr>
            		<tr>
            			<td>Harga : <?php echo $row['harga_produk']?></td>
            			<td>Jumlah : <?php echo $row['jumlah_beli']?></td>
            		</tr>
            		<tr>
            			<td colspan="2">Total : <?php echo $row['total']?></td>
            		</tr>
            		<tr>
            			<td>Dibayar : <?php echo $row['dibayar']?></td>
            			<td>Kembalian : <?php echo $row['kembalian']?></td>
            		</tr>
            		<tr>
            			<td colspan="2">ID Kasir : <?php echo $row['id_kasir']?></td>
            		</tr>
            		<tr>
            			<td colspan="2">Nama Kasir : <?php echo $row['nama_kasir']?></td>
            		</tr>
            	</table>
            </div>
        </div>
    </div>
<?php }  ?>