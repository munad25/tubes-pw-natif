<?php 
include '../../config/config.php';
include '../../lib/mylib.php';

$nama = $_POST['nama'];
$lokasi = $_POST['lokasi'];
$no_tlp = $_POST['tlp'];
$bentuk = $_POST['bentuk'];
$bidang = $_POST['bidang'];


$query = "INSERT INTO perusahaan VALUES('', '$nama', '$lokasi', '$no_tlp', '$bentuk', '$bidang')";

$result = mysqli_query($koneksi, $query);

if(!$result){
	die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
}
else{
	$url = base_url('admin', 'perusahaan');
	header("location: $url");
}



?>