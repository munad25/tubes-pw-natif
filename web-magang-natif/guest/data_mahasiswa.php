<?php
$query = "";
$q = "";
if(!empty($_GET['q'])){
	$q = $_GET['q'];
	$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$q%' || nim LIKE '%$q%' || kelas LIKE '%$q%' ORDER BY nama ASC";
}
else{
	$query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
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
						<strong class="navbar-brand">Data Mahasiswa</strong>
						<form class="form-inline" action="<?=base_url('guest')?>/action/s.php" method="GET">
							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search . . . ">
								<div class="input-group-append">
									<button type="submit" name="search" value="mahasiswa" class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></button>
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
								<th>NIM</th>
								<th>Kelas</th>
								<th class="option">Option</th>
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
								<td><?=$data['nim']?></td>
								<td><?=$data['kelas']?></td>
								<td>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#id-<?=$data['id']?>">
										<i class="fa fa-eye"></i> View
									</button>
								</td>
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

<?php
	$result1 = mysqli_query($koneksi, $query);
	while ($value = mysqli_fetch_assoc($result1)) {
?>

 <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="id-<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<strong>
            <?=$value['nama']?>
      	</strong>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      			<label class="col-md-3">Nama</label>
      			: <span><?=$value['nama']?></span>		
      	</div>
      	<div class="row">
      			<label class="col-md-3">NIM</label>
      			: <span><?=$value['nim']?></span>		
      	</div>
      	<div class="row">
      			<label class="col-md-3">Kelas</label>
      			: <span><?=$value['kelas']?></span>		
      	</div>
      	<div class="row">
      			<label class="col-md-3">Jurusan</label>
      			: <span><?=$value['jurusan']?></span>		
      	</div>
      	<div class="row">
      			<label class="col-md-3">Alamat</label>
      			: <span><?=$value['alamat']?></span>		
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
	}
?>