<?php

session_start();
if ($_SESSION) {
	if ($_SESSION['level'] == 'admin') {
		header('Location: admin/dashboard.php');
	}elseif ($_SESSION['level'] == 'kasir') {
		header('Location: kasir/dashboard.php');
	}
}

include 'koneksi/login.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="#DiRumahAja Jaga Kesehatan">
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"> -->
	
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>

<div class="container">
	<div class="card">
		<h2 >login</h2>
		<form method="post">
			<input type="text" name="username" placeholder="username" required autocomplete="off">
			<input type="password" name="password" placeholder="password" required autocomplete="off">
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</div>

</body>
</html>