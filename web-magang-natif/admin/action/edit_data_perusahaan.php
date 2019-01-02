<?php
include '../../config/config.php';
include '../../lib/mylib.php';

$id = "";
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}

$nama = $_POST['nama'];
$lokasi = $_POST['lokasi'];
$tlp = $_POST['tlp'];
$bentuk = $_POST['bentuk'];
$bidang = $_POST['bidang'];

// var_dump($id);
// var_dump($nama);
// var_dump($lokasi);
// var_dump($tlp);
// var_dump($bentuk);
// var_dump($bidang);

$query = "UPDATE perusahaan SET nama = '$nama' , lokasi = 'lokasi', tlp = '$tlp', bentuk = '$bentuk', bidang= '$bidang' WHERE id='$id'";

$result = mysqli_query($koneksi, $query);

if (!$result) {
  die("Query Error: ".mysqli_errno($koneksi).'-'.mysql_error($koneksi));
}
else{
	$row = mysqli_num_rows($result);
	$nh = urlencode("Sucess");
	$nb = urlencode($row." Telah dirubah");
	$url = base_url('admin', 'perusahaan').'&nh='.$nh.'&nb='.$nb;

	header("location:$url");
}


?>