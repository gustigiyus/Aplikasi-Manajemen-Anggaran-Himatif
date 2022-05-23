<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        Kotak Pesan
        <small>
          <?php 
          $nama = $_SESSION['namle'];
          $kotak_masuk = mysqli_query($con, "SELECT * FROM pesan WHERE nama_penerima = '$nama'") or die (mysqli_error($con));
        ?>
        <?= mysqli_num_rows($kotak_masuk); ?> 
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tulis Pesan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="kotak_masuk.php" class="btn btn-primary btn-block margin-bottom">kembali ke Kotak Pesan</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li>
                  <a href="kotak_masuk.php">
                    <i class="fa fa-inbox"></i> Kotak Masuk
                    <span class="label pull-right bg-red">
                      <?php 
                        $nama = $_SESSION['namle'];
                        $kotak_masuk = mysqli_query($con, "SELECT * FROM pesan WHERE nama_penerima = '$nama'") or die (mysqli_error($con));
                      ?>
                      <?= mysqli_num_rows($kotak_masuk); ?> 
                    </span>
                  </a>
                </li>
                <li>
                  <a href="pesan_terkirim.php">
                    <i class="fa fa-envelope-o"></i> Pesan Terikirm
                    <span class="label label-primary pull-right">
                      <?php 
                        $nama = $_SESSION['namle'];
                        $notif_terkirim = mysqli_query($con, "SELECT * FROM pesan WHERE nama_pengirim = '$nama'") or die (mysqli_error($con));
                      ?>
                      <?= mysqli_num_rows($notif_terkirim); ?> 
                    </span>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->



        <div class="col-md-9">
        <!-- /. Awal Form -->
          <form action="proses_kirim_pesan.php" method="post">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Menulis Pesan Baru</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="nama_pengirim" value="<?php echo $_SESSION['namle'];?>">
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                        To:
                    </div>
                    <select class="form-control select2" style="width: 100%;" name="nama_penerima" >
                        <?php
                            $unit = mysqli_query($con, "SELECT * FROM login") or die (mysqli_error($conn));
                            while ($data_kodeunit = mysqli_fetch_array($unit)) { ?>
                        <option>
                        <?php
                            echo $data_kodeunit['nama'];
                         } ?>
                        </option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subjek_pesan" placeholder="Subject:">
                </div>
                <div class="form-group">
                      <textarea name="isi_pesan" id="compose-textarea" class="form-control" style="height: 300px">
                      </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Sisipkan
                    <input disabled type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 1MB</p>
                </div>
                <div class="form-group">
                  <?php date_default_timezone_set('Asia/Jakarta'); ?>
                  <input type="hidden" class="form-control" name="waktu_kirim_pesan" value="<?php echo $tanggal = date("Y-m-d H:i:s");?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="submit" name="kirim_pesan" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Kirim</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /. box -->
          </form>
          <!-- /. Akhir Form -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php include_once('../footer.php'); 
?>