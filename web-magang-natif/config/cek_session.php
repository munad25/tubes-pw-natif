<?php
	session_start();
	if(empty($_SESSION['username'])){
		$url = base_url('admin', 'login');
		header("location:$url");
	}
?>