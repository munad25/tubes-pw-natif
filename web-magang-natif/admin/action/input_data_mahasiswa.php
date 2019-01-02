<?php 
include '../../config/config.php';
include '../../lib/mylib.php';


$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$no_tlp = $_POST['tlp'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$query = "SELECT nim FROM mahasiswa WHERE nim = '$nim'";
$result = mysqli_query($koneksi, $query);

if(mysqli_num_rows($result) == 0){
	$query = "INSERT INTO mahasiswa VALUES('', '$nim', '$nama', '$kelas', '$no_tlp', '$jurusan', '$alamat')";

	$result = mysqli_query($koneksi, $query);

	if(!$result){
		die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
	}
	else{
		$url = base_url('admin', 'mahasiswa');
		header("location:$url");
	}
}
else{
	$str = urlencode("GAGAL memasukan data!, NIM sudah terdaftar");
	$url = base_url('admin','mahasiswa&err=').$str;
	header("location: $url");
}


?>