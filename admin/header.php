<?php
date_default_timezone_set('Asia/Jakarta');
$uri = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Murs</title>
	<base href="../">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="#DiRumahAja Jaga Kesehatan">
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"> -->
	

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- <script src="https://kit.fontawesome.com/5c97810e10.js" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.cs">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"> -->

	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<!-- nabvar -->
<nav class="navbar navbar-expand-lg navbar-dark navbr sticky-top">
	<button class="navbar-toggler sideMenuToggler" type="button">
		<span class="navbar-toggler-icon"></span>		
	</button>
  	<a class="navbar-brand" href="#">Admin</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['nama_lengkap']?>
        </a>
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="koneksi/logout.php">Logout</a>
        </div>
      </li>
  </div>
</nav>
<!-- navbar -->
<div class="wrapper d-flex">
    <div class="sideMenu">
    	<div class="sidebar">
        	<ul class="navbar-nav">
				<li class="nav-item">
					<a href="admin/dashboard.php" class="nav-link px-2 <?php echo $uri[3] == 'dashboard.php' ? 'active' : '' ?>">
						<span class="text"> Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="admin/data_penjualan.php" class="nav-link px-2  <?php echo $uri[3] == 'data_penjualan.php' ? 'active' : '' ?>">
						<span class="text"> Data Penjualan</span>
					</a>
				</li>	
				<li class="nav-item">
					<a href="admin/data_barang.php" class="nav-link px-2  <?php echo $uri[3] == 'data_barang.php' ? 'active' : '' ?>">
						<span class="text"> Data Barang</span>
					</a>
				</li>
				<li class="nav-item ">
					<a href="admin/data_supplier.php" class="nav-link px-2  <?php echo $uri[3] == 'data_supplier.php' ? 'active' : '' ?>">
						<span class="text"> Data Supplier</span>
					</a>
				</li>
				<li class="nav-item ">
					<a href="admin/data_pengguna.php" class="nav-link px-2  <?php echo $uri[3] == 'data_pengguna.php' ? 'active' : '' ?>">
						<span class="text"> Data Pengguna</span>
					</a>
				</li>
				
			</ul>
		</div>
	</div>