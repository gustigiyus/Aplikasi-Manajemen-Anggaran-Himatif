<?php 
include_once('../header.php'); 
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kotak Pesan
        <small>
          <?php 
          $nama = $_SESSION['namle'];
          $kotak_masuk = mysqli_query($con, "SELECT * FROM pesan WHERE nama_pengirim != '$nama'") or die (mysqli_error($con));
        ?>
        <?= mysqli_num_rows($kotak_masuk); ?> 
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pesan Terkirim</li>
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
              <h3 class="box-title" style="font-weight: bold;">Pesan Terkirim</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <?php
                $nama = $_SESSION['namle'];
                $sql = "SELECT * FROM pesan WHERE nama_pengirim = '$nama'";
                $query = $sql;
              ?>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php
                    $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                    if (mysqli_num_rows($sql_unit) > 0) {
                      while ($data = mysqli_fetch_array($sql_unit)) { ?>
                    <tr>
                      <td>
                        <button style="border: none; background: none;">
                        <a href="del_pesan_terkirim.php?id=<?=$data['id']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></a>
                        </button>
                      </td>
                      <td class="mailbox-star"><a href="#">
                        <i class="fa fa-star text-yellow"></i></a>
                      </td>
                      <td class="mailbox-name">
                        <a href="isi_pesan.php"></a><?=$data['nama_penerima']?>
                      </td>
                      <td class="mailbox-subject">
                        <b><?=$data['subjek_pesan']?></b> - 
                        <?=substr($data['isi_pesan'], 0, 25);?> 
                      </td>
                      <td class="mailbox-attachment"></td>
                      <td class="mailbox-date">
                        <?php
                        date_default_timezone_set('Asia/Jakarta'); 
                        echo facebook_time_ago(date($data['waktu_kirim']));
                        ?>
                      </td>
                    </tr>
                  <?php 
                    } } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
              </div>
            </div>
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