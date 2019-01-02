<?php 
include '../../config/config.php';
include '../../lib/mylib.php';

$id_mahasiswa = $_POST['id_mahasiswa'];
$id_perusahaan = $_POST['id_perusahaan'];

if(empty($id_perusahaan)){
		$nh = urlencode("Gagal memasukan data!");
		$nb	= urlencode("Form nama perusahaan masih kosong");
		$url = base_url('admin', 'mahasiswa')."&"."nh=".$nh."&"."nb=".$nb;
		header("location: $url");		
}
else{

	// var_dump($id_mahasiswa);
	// var_dump($id_perusahaan);

	$query = "SELECT id_user FROM data_magang WHERE id_user = '$id_mahasiswa'";

	$query2 = "";

	$result = mysqli_query($koneksi, $query);

	if (mysqli_num_rows($result) == 0 ) {
		$query2 = "INSERT INTO data_magang VALUES('', '$id_mahasiswa', '$id_perusahaan')";
	}
	else{
		$query2 = "UPDATE data_magang SET id_perusahaan = '$id_perusahaan' WHERE id_user ='$id_mahasiswa' ";
	}


	$result2 = mysqli_query($koneksi, $query2);

	if(!$result2){
		die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
	}
	else{
		$url = base_url('admin', 'magang');
		header("location: $url");		
	}
}



?>