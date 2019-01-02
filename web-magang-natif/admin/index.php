<?php
include '../lib/mylib.php';
include '../config/config.php';


if(!empty($_GET['page'])){
	$page = $_GET['page'];

	if($page == "login"){
		include 'login.php';
	}
	else{
		include '../config/cek_session.php';

		include 'header.php';

		if($page == "mahasiswa"){
			include 'data_mahasiswa.php';
		}

		else if($page == "perusahaan"){
			include 'data_perusahaan.php';
		}

		else if($page == "magang"){
			include 'data_magang.php';
		}

		else if($page == "dashboard"){
			include 'dashboard.php';
		}

		else if($page == "login"){
			include 'file';
		}

		else{
			include 'not_found.php';
		}

		include 'footer.php';
	}
}

else {
	include '../config/cek_session.php';
	include 'header.php';
	include 'dashboard.php';
	include 'footer.php';
}






	


?>