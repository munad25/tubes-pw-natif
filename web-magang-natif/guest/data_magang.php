<?php
$query = "";
$q = "";
if(!empty($_GET['q'])){
	$q = $_GET['q'];
	$query = "SELECT * FROM view_data_magang WHERE nama_mahasiswa LIKE '%$q%' || nama_perusahaan LIKE '%$q%' ORDER BY nama_mahasiswa ASC";
}
else{
	$query = "SELECT * FROM view_data_magang ORDER BY nama_mahasiswa ASC";
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
						<strong class="navbar-brand">Data Magang</strong>
						<form class="form-inline" action="<?=base_url('guest')?>/action/s.php" method="GET">
							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search . . . ">
								<div class="input-group-append">
									<button type="submit" name="search" value="magang" class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</nav>
				</div>

				<div class="box-body">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th>No</th>
								<th>Nama Mahasiswa</th>
								<th>Perusahaan</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1;
								while($data = mysqli_fetch_assoc($result)){
							?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$data['nama_mahasiswa']?></td>
								<td><?=$data['nama_perusahaan']?></td>
							
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