<?php
include '../../lib/mylib.php';
include '../../config/config.php';

if(!empty($_POST['username']) && !empty($_POST['password'])){
	$username = $_POST['username'];
	$password = sha1(md5(sha1($_POST['password'])));

	$query = "SELECT username, password FROM admin WHERE username ='$username' AND password ='$password' ";

	$result = mysqli_query($koneksi, $query);

	if(!$result){
		die("QUERY ERROR : ".mysqli_error($koneksi));
	}

	if(mysqli_num_rows($result) != 0){
		session_start();
		$_SESSION['username'] = $username;
		
		$url = base_url('admin', 'dashboard');
		header("location:$url");
	}
	else{
		$url = base_url('admin', 'login');
		header("location:$url");
	}
}
else{
	$url = base_url('admin', 'login');
	header("location:$url");
}


?>