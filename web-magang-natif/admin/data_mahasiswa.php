a  
<?php
$query = "";
$cari = "";
if(!empty($_GET['q'])){
  $cari = $_GET['q'];

  $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%' || kelas LIKE '%$cari%' ORDER BY nama ASC";
}
else{
  $query = "SELECT * FROM mahasiswa ORDER BY nama ASC";
}

$result = mysqli_query($koneksi, $query);
if (!$result) {
  die("Query Error: ".mysqli_errno($koneksi).'-'.mysql_error($koneksi));
}
?>



  <div class="content-wrapper">



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
                  <button type="submit" class="glyphicon glyphicon-search form-control-feedback" name="search" value="mahasiswa"> </button>
                </form>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>

          <div class="box-body">

            <table class="table table-striped table-hover w-75">
              <thead class="thead-dark">
                <tr>   
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>KELAS</th>
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
                  <td><?=$data['nim']?></td>
                  <td><?=$data['kelas']?></td>
                  <td><button class="btn btn-sm btn-success" data-toggle="modal" data-target="#id-magang<?=$data['id']?>"><i class="fa fa-plus-square"></i> Data Magang</button></td>
                  <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?=$data['id']?>"><i class="fa fa-edit"></i>edit</button></td> 
                  <td><a href="<?=base_url('admin')?>/action/delete_data_mahasiswa.php?id=<?=$data['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>delete</a></td>           
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
                <h3 class="box-title"><strong> Tambah Data Mahasiswa </strong></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?=base_url('admin')?>/action/input_data_mahasiswa.php?" method="POST" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="nim" class="col-sm-2 control-label">NIM</label>

                    <div class="col-sm-10">
                      <input type="text" name="nim" class="form-control" id="nim" placeholder="No induk mahasiswa" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="nama lengkap" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                    <div class="col-sm-10">
                      <input type="text" name="kelas" class="form-control" id="kelas" placeholder="kelas">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-sm-2 control-label">No. HP</label>

                    <div class="col-sm-10">
                      <input type="number" name="tlp" class="form-control" id="tlp" placeholder="+628 xxx xxx xxx" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jurusan</label>

                    <div class="col-sm-8">
                      <select name="jurusan" class="form-control" required="required">
                        <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                        <option value="D4 Rekayasa Perangkat Lunak">D4 Rekayasa Perangkat Lunak</option>
                        <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                        <option value="D4 Perancangan Manufaktur">D4 Perancangan Manufaktur</option>
                        <option value="D3 Teknik Pendingin dan Tata Udara">D3 Teknik Pendingin dan Tata Udara</option>
                      </select>
                    </div>

                  </div>

                  <section class="content">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box box-info">
                          <div class="box-header">
                            <h3 class="box-title">Alamat </h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body pad">
                            <textarea id="editor1" name="alamat" rows="10" cols="80" required="required"></textarea>
                          </div>
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col-->
                    </div>
                    <!-- ./row -->
                  </section>
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
                <h3 class="box-title"><strong> Edit Data Mahasiswa </strong></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?=base_url('admin')?>/action/edit_data_mahasiswa.php?id=<?=$value['id']?>" method="POST" class="form-horizontal">
                <div class="box-body">
                  <div class="form-group">
                    <label for="nim" class="col-sm-2 control-label">NIM</label>

                    <div class="col-sm-10">
                      <input type="text" name="nim" class="form-control" id="nim" placeholder="No induk mahasiswa" required="required" value="<?=$value['nim']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="nama lengkap" required="required" value="<?=$value['nama']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>

                    <div class="col-sm-10">
                      <input type="text" name="kelas" class="form-control" id="kelas" placeholder="kelas" value="<?=$value['kelas']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tlp" class="col-sm-2 control-label">No. HP</label>

                    <div class="col-sm-10">
                      <input type="number" name="tlp" class="form-control" id="tlp" placeholder="+628 xxx xxx xxx" required="required" value="<?=$value['tlp']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jurusan</label>

                    <div class="col-sm-8">
                      <select name="jurusan" class="form-control" required="required">
                        <option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
                        <option value="D4 Rekayasa Perangkat Lunak">D4 Rekayasa Perangkat Lunak</option>
                        <option value="D3 Teknik Mesin">D3 Teknik Mesin</option>
                        <option value="D4 Perancangan Manufaktur">D4 Perancangan Manufaktur</option>
                        <option value="D3 Teknik Pendingin dan Tata Udara">D3 Teknik Pendingin dan Tata Udara</option>
                      </select>
                    </div>

                  </div>

                  <section class="content">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box box-info">
                          <div class="box-header">
                            <h3 class="box-title">Alamat </h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body pad">
                            <textarea id="editor2" name="alamat" rows="10" cols="80" required="required"><?=$value['alamat']?></textarea>
                          </div>
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col-->
                    </div>
                    <!-- ./row -->
                  </section>
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
  </div>




  <div class="modal fade" id="id-magang<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">


            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><strong> Tambah Data Magang  <?=$value['nama']?> </strong></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?=base_url('admin')?>/action/input_data_magang.php?id=<?=$value['id']?>" method="POST" class="form-horizontal">
                <div class="box-body">
                  <input type="hidden" name="id_mahasiswa" value="<?=$value['id']?>">
                  <?php
                  $query3 = "SELECT id, nama FROM perusahaan ORDER BY nama ASC";
                  $result3 = mysqli_query($koneksi, $query3);
                  while ($perusahaan  = mysqli_fetch_assoc($result3)) {
                    ?>
                    <div class="form-group">
                      <input type="radio" name="id_perusahaan" class="col-sm-1" id="r<?=$perusahaan['id']?>" value="<?=$perusahaan['id']?>" >
                      <label for="r<?=$perusahaan['id']?>"><?=$perusahaan['nama']?></label>
                    </div>
                    <?php
                  }
                  ?>


                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" name="simpan" value="simpan" class="btn btn-info pull-right">
              </div>
            </form>
             
          </div>
          <!-- Main Footer -->


        </div>

      </div>
  </div>
  </div>



  <?php
      }
  ?>



