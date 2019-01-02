  
<?php
$query = "";
$notice = "";
$nh = "";
$nb = "";
$cari = "";

if(!empty($_GET['q'])){
  $cari = $_GET['q'];
  $query = "SELECT * FROM perusahaan WHERE nama LIKE '%$cari%' || lokasi LIKE '%$cari%' || Bentuk LIKE '%$cari%' || bidang LIKE '%$cari%' ORDER BY nama ASC";
}
else{
  $query = "SELECT * FROM perusahaan ORDER BY nama ASC";
}

if (!empty($_GET['nh']) && !empty($_GET['nb'])) {
  $nh = $_GET['nh'];
  $nb = $_GET['nb'];
}




$result = mysqli_query($koneksi, $query);
if (!$result) {
  die("Query Error: ".mysqli_errno($koneksi).'-'.mysql_error($koneksi));
}
?>



  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Perusahaan
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('admin','dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Perusahaan</li>
      </ol>
    </section>


    <section class="content container">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

        <div class="box">

          <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addData">
             <i class="fa fa-user-plus"></i> Tambah Data
            </button>

            <div class="box-tools pull-right">
              <div class="has-feedback">
                <form action="<?=base_url('admin')?>/action/s.php" id="formsearch" method="GET">
                  <input type="text" name="q" class="form-control input-sm" placeholder="Cari nama atau lokasi">
                  <button type="submit" class="glyphicon glyphicon-search form-control-feedback" name="search" value="perusahaan"> </button>
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
                  <th>Nama Perusahaan</th>
                  <th>Lokasi</th>
                  <th>Bentuk Perusahaan</th>
                  <th>Bidang</th>
                  <th>Personal Kontak</th>
                  <th colspan="3" class="option">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                  while ($data = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                  <td><?=$i++?></td>
                  <td><?=$data['nama']?></td>
                  <td><?=$data['lokasi']?></td>
                  <td><?=$data['bentuk']?></td>
                  <td><?=$data['bidang']?></td>
                  <td><?=$data['tlp']?></td>
                  <td><button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#id<?=$data['id']?>"><i class="fa fa-edit"></i>edit</button></td> 
                  <td><a href="<?=base_url('admin')?>/action/delete_data_perusahaan.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>delete</a></td>           
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

    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">


            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><strong> Tambah Data Perusahaan </strong></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?=base_url('admin')?>/action/input_data_perusahaan.php" method="POST" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Perusahaan</label>

                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Perusahaan" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Lokasi</label>

                    <div class="col-sm-10">
                      <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-sm-2 control-label">No. HP</label>

                    <div class="col-sm-10">
                      <input type="number" name="tlp" class="form-control" id="tlp" placeholder="+628 xxx xxx xxx" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bentuk Perusahaan</label>

                    <div class="col-sm-6">
                      <select name="bentuk" class="form-control" required="required">
                        <option value="CV">CV</option>
                        <option value="PT">PT</option>
                        <option value="Software House">Software House</option>
                      </select>
                    </div>

                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bidang</label>

                    <div class="col-sm-6">
                      <select name="bidang" class="form-control" required="required">
                        <option value="IOT">IOT</option>
                        <option value="WEB Apps">Web Apps</option>
                        <option value="Mobile Apps">Mobile Apps</option>
                        <option value="Desktop Apps">Desktop Apps</option>
                        <option value="Network">Network</option>
                      </select>
                    </div>

                  </div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" name="simpan" value="simpan" class="btn btn-info pull-right">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- Main Footer -->


        </div>

      </div>
    </div>

   
    <?php
      $result2 = mysqli_query($koneksi, $query);

      while($value = mysqli_fetch_assoc($result2)){
    ?>
    <div class="modal fade" id="id<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">


            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><strong> Edit Data Perusahaan </strong></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?=base_url('admin')?>/action/edit_data_perusahaan.php?id=<?=$value['id']?>" method="POST" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Perusahaan</label>

                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Perusahaan" required="required" value="<?=$value['nama']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Lokasi</label>

                    <div class="col-sm-10">
                      <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Lokasi" required="required" value="<?=$value['lokasi']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-sm-2 control-label">No. HP</label>

                    <div class="col-sm-10">
                      <input type="number" name="tlp" class="form-control" id="tlp" placeholder="+628 xxx xxx xxx" required="required" value="<?=$value['tlp']?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bentuk Perusahaan</label>

                    <div class="col-sm-6">
                      <select name="bentuk" class="form-control" required="required">
                        <option value="CV">CV</option>
                        <option value="PT">PT</option>
                        <option value="Software House">Software House</option>
                      </select>
                    </div>

                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Bidang</label>

                    <div class="col-sm-6">
                      <select name="bidang" class="form-control" required="required">
                        <option value="IOT">IOT</option>
                        <option value="WEB Apps">Web Apps</option>
                        <option value="Mobile Apps">Mobile Apps</option>
                        <option value="Desktop Apps">Desktop Apps</option>
                        <option value="Network">Network</option>
                      </select>
                    </div>

                  </div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" name="simpan" value="simpan" class="btn btn-info pull-right">
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- Main Footer -->


        </div>

      </div>
    </div>

    <?php
      }
    ?>

    
  


