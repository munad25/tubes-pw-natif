<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Jekyll v3.8.5">
	<title>Top navbar example · Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">

	<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>
<!-- Custom styles for this template -->
<link href="navbar-top.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?=is_active('mahasiswa', $_GET['page'])?>">
					<a class="nav-link" href="<?=base_url('guest','mahasiswa')?>">Mahasiswa</a>
				</li>
				<li class="nav-item <?=is_active('perusahaan', $_GET['page'])?>">
					<a class="nav-link" href="<?=base_url('guest','perusahaan')?>">Perusahaan</a>
				</li>
				<li class="nav-item <?=is_active('magang', $_GET['page'])?>">
					<a class="nav-link" href="<?=base_url('guest','magang')?>">Data Magang</a>
				</li>
			</ul>
			<a class="btn btn-primary" href="<?=base_url('admin', 'login')?>">Sign In</a>
		</div>
	</nav>