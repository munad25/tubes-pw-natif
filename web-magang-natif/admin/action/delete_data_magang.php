<?php
include '../../config/config.php';
include '../../lib/mylib.php';

$id = "";
if (!empty($_GET['id'])) {
	$id = $_GET['id'];

	$query = "DELETE FROM data_magang WHERE id='$id'";
	$result = mysqli_query($koneksi, $query);

	if(!$result){
		die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
	}
	else{
		$url = base_url('admin', 'magang');
		header("location: $url");
	}
}
else{
	$url = base_url('admin', 'magang');
	header("location: $url");
}

?>