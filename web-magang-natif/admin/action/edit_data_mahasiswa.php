<?php
include '../../config/config.php';
include '../../lib/mylib.php';

$id = "";
if(!empty($_GET['id'])){
	$id = $_GET['id'];
}

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$tlp = $_POST['tlp'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

// var_dump($id);
// var_dump($nama);
// var_dump($nim);
// var_dump($tlp);
// var_dump($alamat);
// var_dump($kelas);
// var_dump($jurusan);

$query = "UPDATE mahasiswa SET nama = '$nama' , nim = '$nim', tlp = '$tlp', alamat = '$alamat', kelas= '$kelas' , jurusan = '$jurusan' WHERE id='$id'";

$result = mysqli_query($koneksi, $query);

if (!$result) {
  die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
}
else{
	$row = mysqli_num_rows($result);
	$nh = urlencode("Sucess");
	$nb = urlencode($row." Telah dirubah");
	$url = base_url('admin', 'mahasiswa').'&nh='.$nh.'&nb='.$nb;

	header("location:$url");
}


?>