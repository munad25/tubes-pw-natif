<?php
$query = "";
$q = "";
if(!empty($_GET['q'])){
	$q = $_GET['q'];
	$query = "SELECT * FROM perusahaan WHERE nama LIKE '%$q%' || lokasi LIKE '%$q%' || bentuk LIKE '%$q%' || bidang LIKE '%$q%' ORDER BY nama ASC";
}
else{
	$query = "SELECT * FROM perusahaan ORDER BY nama ASC";
}

$result = mysqli_query($koneksi, $query);

if(!$result){
	die("QUERY ERROR :".mysqli_error($koneksi));
}


?>


<main role="main" class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box">

				<div class="box-header">
					<nav class="navbar navbar-light">
						<strong class="navbar-brand">Data Perusahaan</strong>
						<form class="form-inline" action="<?=base_url('guest')?>/action/s.php" method="GET">
							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search . . . ">
								<div class="input-group-append">
									<button type="submit" name="search" value="perusahaan" class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</nav>
				</div>

				<div class="box-body">
					<table class="table table-striped table-hover w-100">
						<thead class="thead-dark">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Lokasi</th>
								<th>No Tlp</th>
								<th>Bentuk</th>
								<th>Bidang</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1;
								while($data = mysqli_fetch_assoc($result)){
							?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$data['nama']?></td>
								<td><?=$data['lokasi']?></td>
								<td><?=$data['tlp']?></td>
								<td><?=$data['bentuk']?></td>
								<td><?=$data['bidang']?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>

			</di>
		</div>
	</div>
</main>