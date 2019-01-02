<?php
include '../../lib/mylib.php';

$q = "";
$page = "";

if(!empty($_GET['search']) && !empty($_GET['q'])){
	$page = $_GET['search'];
	$q = urlencode($_GET['q']);
	$url = base_url('admin', $page )."&q=".$q;
	header("location:$url");
}
else{
	$url = base_url();
	header('Location:$url');
}


?>