<?php
// DATABASE CONECTION
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'web_magang';

$koneksi = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$koneksi){
	die("Koneski Error:".mysqli_connect_error().'-'.mysqli_connect_errno());
};

?>