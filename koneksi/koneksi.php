<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "app_kasir";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
	die("koneksi gagal".$con->connect_error);
}

?>