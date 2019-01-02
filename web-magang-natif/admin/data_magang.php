  
<?php
$query = "";
$notice = "";
$nh = "";
$nb = "";
$cari = "";

if(!empty($_GET['q'])){
  $cari = $_GET['q'];


  $query  ="SELECT * FROM view_data_magang WHERE nama_mahasiswa LIKE '%$cari%' || nama_perusahaan LIKE '%$cari%' ORDER BY nama_mahasiswa ASC";
}
else{
  $query  ="SELECT * FROM view_data_magang  ORDER BY nama_mahasiswa ASC"; 
}

if (!empty($_GET['nh']) && !empty($_GET['nb'])) {
  $nh = $_GET['nh'];
  $nb = $_GET['nb'];
}




$result = mysqli_query($koneksi, $query);
if (!$result) {
  die("Query Error: ".mysqli_errno($koneksi).'-'.mysqli_error($koneksi));
}
?>



  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Magang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin','dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Magang</li>
      </ol>
    </section>


    <section class="content container">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="box">

          <div class="box-header with-border">
            <div class="btn btn-info">
              Data Magang
            </div>

            <div class="box-tools pull-right">
              <div class="has-feedback">
                <form action="<?=base_url('admin')?>/action/s.php" id="formsearch" method="GET">
                  <input type="text" name="q" class="form-control input-sm" placeholder="Cari nama atau lokasi">
                  <button type="submit" class="glyphicon glyphicon-search form-control-feedback" name="search" value="magang"> </button>
                </form>
              </div>
            </div>


          </div>

          <div class="box-body">

          <?php
            if(!empty($nh) && !empty($nb)){

         echo
            '<div class="alert alert-danger alert-dismissible">'.
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.
                '<h4><i class="icon fa fa-ban"></i>'.$nh.'</h4>'.
                $nb.
            '</div>';
          }
          ?>


            <table class="table table-striped table-hover w-75">
              <thead class="thead-dark">
                <tr>   
                  <th>No</th>
                  <th>Nama Mahasiswa</th>
                  <th>Nama Perusahaan</th>
                  <th class="option">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                  while ($data = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                  <td><?=$i++?></td>
                  <td><?=$data['nama_mahasiswa']?></td>
                  <td><?=$data['nama_perusahaan']?></td>
                  <td><a href="<?=base_url('admin')?>/action/delete_data_magang.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>delete</a></td>           
                </tr>

                <?php   
                  }
                ?>
              </tbody>
            </table>

          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

   