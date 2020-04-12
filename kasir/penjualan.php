<?php
include 'cek_session.php';

$result = $con->query("SELECT no_penjualan from penjualan order by no_penjualan DESC limit 1");

include'header.php';
 ?>
	   <div class="content">
        <main>
          	<div class="container-fluid">
          		<div class="card">
				  	<div class="card-body">
				  		<h2 class="card-title">Transaksi Penjualan</h2>
						<form method="post" action="koneksi/penjualan.php" id="form_penjualan">
							<div class="row">
				  				<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="tanggal" class="form-control" value="<?php echo date('d M Y h:i:s')?>">
									</div>
								</div>
								<div class="col-md-12">
									<input type="hidden" name="id_kasir" class="form-control" readonly value="<?php echo $_SESSION['id_kasir']?>">
									<input type="hidden" name="nama_kasir" class="form-control" readonly value="  <?php echo $_SESSION['nama_lengkap']?>">
									<?php foreach ($result as $row);
										if (empty($row['no_penjualan'])) {
											$r = 1;
										}else{
											$r = $row['no_penjualan']+1;
										}
									
										?>
									<input type="hidden" name="no_penjualan" class="form-control" readonly value="<?php echo $r?>">
									
								<table class="table" id="tambah_form">
						  			<tr>
						  				<td>Kode Produk/Nama Produk</td>
						  				<td>Nama Produk</td>
						  				<td>Harga Produk</td>
						  				<td>Stok Produk</td>
						  				<td>Jumlah Pembelian</td>
						  				<td>Total</td>
						  				<td></td>
						  			</tr>
						  			<tr>
						  				<td><input type="text" name="kode[]" id="kode0" placeholder="Cari kode Produk / Nama Produk" class="form-control" onchange="get_produk('0')"></td>
						  				<td><input type="text" name="nama[]" class="form-control" readonly id="nama0" required></td>
						  				<td><input type="text" name="harga[]" class="form-control" readonly id="harga0" required></td>
						  				<td>
						  					<input type="text" name="stok" class="form-control" readonly id="stok0" required>
						  					<input type="hidden" name="stoks[]" class="form-control" readonly id="stoks0" required>
						  				</td>
						  				<td><input type="number" name="jumlah[]" class="form-control" id="jumlah0"  min="0" required onchange="hitung('0')"></td>
						  				<td><input type="text" name="total[]" class="form-control" id="total0" readonly required></td>
						  				<td><span class="btn btn-success" id="kurang" onclick="tambah()"><i class="fas fa-plus"></i></span></td>
						  			</tr>
						  		</table>
				  				</div>

				  				<div class="col-md-4">
									<div class="form-group">
										<label>Total keseluruhan</label>
										<input type="text" name="total_seluruh" id="total_keseluruhan" class="form-control" required readonly>
									</div>
								</div>		
								<div class="col-md-4">
									<div class="form-group">
										<label>Bayar</label>
										<input type="text" name="bayar" class="form-control" id="bayar" required onchange="pembayaran()">
									</div>
								</div>		
								<div class="col-md-4">
									<div class="form-group">
										<label>Kembalian</label>
										<input type="text" name="kembalian" class="form-control" id="kembalian" readonly required>
									</div>
								</div>

				  			</div>
				  			<input type="submit" class="btn btn-primary" value="Simpan">
				  		</form>

				  		

				  	</div>
				</div>
				
          	</div>
        </main>
      </div>   
</div>

<script type="text/javascript">
	var i = 0;
	function tambah(){
        i++;
        var addForm = `
			<td><input type="text" name="kode[]" id="kode${i}" placeholder="Cari kode Produk / Nama Produk" class="form-control" onchange="get_produk('${i}')"></td>
	 		<td><input type="text" name="nama[]" class="form-control" readonly id="nama${i}" required></td>
			<td><input type="text" name="harga[]" class="form-control" readonly id="harga${i}" required></td>
			<td>
				<input type="text" name="stok" class="form-control" readonly id="stok${i}" required>
				<input type="hidden" name="stoks[]" class="form-control" readonly id="stoks${i}" required>
			</td>
			<td><input type="number" name="jumlah[]" class="form-control" id="jumlah${i}"  min="0" required onchange="hitung('${i}')"></td>
			<td><input type="text" name="total[]" class="form-control" id="total${i}" readonly required></td>
			<td><span class="btn btn-danger" id="kurang" onclick="kurang()"><i class="fas fa-minus"></i></span></td>
					`;
        $("#tambah_form").append("<tr class='"+i+"'>"+addForm+"</tr>")
    };

    function kurang() {
        if(i>0){
          $("#tambah_form tr").remove("."+i);
          i--;
        } else {
          i = 1;
        }
    };


    function get_produk(type) {
		var kode = $(`#kode${type}`).val();
		$.ajax({
			url: "koneksi/get_produk.php",
			type: "GET",
			data:{kode:kode},
			dataType: 'JSON',
			success: function(data) {
				$(`#nama${type}`).val(data.nama_produk);
				$(`#harga${type}`).val(data.harga_produk);
				$(`#stok${type}`).val(data.stok);				
				$(`#stoks${type}`).val(data.stok);				
			}
		});
	}

	function hitung(type){
		var harga = document.getElementById(`harga${type}`).value;
		var jumlah = document.getElementById(`jumlah${type}`).value;
		var stok = document.getElementById(`stoks${type}`).value;
		
		var total = harga*jumlah;
		var stoks = stok-jumlah;
		document.getElementById(`total${type}`).value = total;
		document.getElementById(`stok${type}`).value = stoks;

        
	    var arr = document.getElementsByName('total[]');
    	var tot=0;
    	for(var i=0;i<arr.length;i++){
        	if(parseInt(arr[i].value))
            	tot += parseInt(arr[i].value);
    	}

		document.getElementById(`total_keseluruhan`).value = tot;
	}

	function pembayaran(){

		var get_total = document.getElementById(`total_keseluruhan`).value;
		var bayar =  document.getElementById(`bayar`).value;
		var hasil = 0;

		if (parseInt(bayar)<parseInt(get_total)) {
			alert("uang kurang");
		}else if(parseInt(bayar)>parseInt(get_total)){
			hasil = parseInt(get_total)-parseInt(bayar);
		}
		document.getElementById(`kembalian`).value = hasil;
	}

</script>


<?php include'footer.php';?>