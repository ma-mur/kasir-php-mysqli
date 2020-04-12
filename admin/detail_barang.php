 <?php

include '../koneksi/koneksi.php';
$id = $_GET['id'];
$result = $con->query("SELECT * FROM produk where kode_produk='$id'");
while($row = $result->fetch_assoc()){

$id_sup = $row['id_supplier'];
$supplier= $con->query("SELECT nama_lengkap from supplier where id='$id_sup' ");
 ?>
 <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	 <h4 class="modal-title" id="myModalLabel">Detail Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            	 <div class="form-group">
                        <label>Kode Produk</label>
                        <input type="text" name="kode_produk" class="form-control" readonly value="<?php echo $row['kode_produk']?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" readonly value="<?php echo $row['nama_produk']?>">
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" readonly value="<?php echo $row['harga_jual']?>">
                    </div>
                    <div class="form-group">
                        <label>Harga Pokok</label>
                        <input type="text" name="harga_pokok" class="form-control" readonly value="<?php echo $row['harga_pokok']?>">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" readonly value="<?php echo $row['stok']?>">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <?php while($row1 = $supplier->fetch_assoc()){
                            echo '<input type="text" class="form-control" readonly value="'.$row1['nama_lengkap'].'"';
                        }
                        ?>
                    </div>
            </div>
        </div>
    </div>
<?php }  ?>