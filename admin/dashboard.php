<?php
include 'cek_session.php';

$produk     = $con->query( "SELECT COUNT(id) as total_produk FROM produk");
$supplier   = $con->query( "SELECT COUNT(id) as total_supplier FROM supplier");
$user       = $con->query( "SELECT COUNT(id) as total_user FROM user");


include'header.php';
 ?>

	   <div class="content">
        <main>
          	<div class="container-fluid">          		
				<div class="row">
				    <div class="col-md-4">
				  	     <div class="card" style="background-color: #34495e;color: #fff">
                            <div class="card-body">
                            <h5 class="card-title">Jumlah Produk (seluruh)</h5>
                            <?php while($row1 = $produk->fetch_assoc()){
                                echo '<h1 class="gaya1">'.$row1['total_produk'].'</h1>';
                            }?>
                                
				  			</div>
				  		</div>
				  	</div>
                     <div class="col-md-4">
                         <div class="card"  style="background-color: #34495e;color: #fff">
                            <div class="card-body">
                            <h5 class="card-title">Jumlah Supplier</h5>
                                  <?php while($row2 = $supplier->fetch_assoc()){
                                echo '<h1 class="gaya1">'.$row2['total_supplier'].'</h1>';
                            }?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="card"  style="background-color: #34495e;color: #fff">
                            <div class="card-body">
                            <h5 class="card-title">Jumlah Pengguna</h5>
                                   <?php while($row3 = $user->fetch_assoc()){
                                echo '<h1 class="gaya1">'.$row3['total_user'].'</h1>';
                            }?>
                            </div>
                        </div>
                    </div>

				</div>
          	</div>
        </main>
      </div>   
</div>

<?php include'footer.php';?>