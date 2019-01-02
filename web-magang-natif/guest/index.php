<?php
include '../config/config.php';
include '../lib/mylib.php';

$page = "";
include 'header.php';

if(!empty($_GET['page'])){
	$page = $_GET['page'];

	if($page == "mahasiswa"){
		include 'data_mahasiswa.php';
	}
	else if($page == "perusahaan"){
		include 'data_perusahaan.php';
	}
	else if($page == "magang"){
		include 'data_magang.php';
	}
}
else{
	include 'data_mahasiswa.php';
}

include 'footer.php';

?>