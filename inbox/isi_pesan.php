<?php 
include_once('../header.php'); 
?>

    <section class="content-header">
      <h1>
        Baca Pesan
        <small>
          <?php
            $nama = $_SESSION['namle'];
            $kotak_masuk = mysqli_query($con, "SELECT * FROM pesan WHERE nama_penerima = '$nama'") or die (mysqli_error($con));
          ?>
        <?= mysqli_num_rows($kotak_masuk); ?> 
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Baca Pesan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="tulis_pesan.php" class="btn btn-primary btn-block margin-bottom">Tulis Pesan</a>

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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-weight: bold;">Baca Pesan</h3>
            </div>

            <?php
              $id = @$_GET['id'];
              $sql_pesan = mysqli_query($con, "SELECT * FROM pesan WHERE id = '$id'") or die (mysqli_error($con));
              $data = mysqli_fetch_array($sql_pesan);
            ?>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h5>Dari : <?=$data['nama_pengirim']?>
                  <span class="mailbox-read-time pull-right">
                  <?php
                    date_default_timezone_set('Asia/Jakarta'); 
                    echo facebook_time_ago(date($data['waktu_kirim']));
                  ?>
                  </span>
                </h5>
                <h3 style="text-align: center;"><b><?=$data['subjek_pesan']?></b></h3>
              </div>
              <div class="mailbox-read-message">
                <h5><?=$data['isi_pesan']?></h5>
              </div>
              
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php include_once('../footer.php'); 
?>