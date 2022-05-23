<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Pengajuan Rencana</span>
              <span class="info-box-number">
              <?php 
                $users = mysqli_query($con, "SELECT * FROM tb_rencana") or die (mysqli_error($con));
                echo mysqli_num_rows($users); 
              ?>
              </span>
            </div>
          </div>
          <div class="small-box bg-aqua">
            <a href="../rencana/data.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-line-chart"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Total Pemasukan</span>
              <span class="info-box-number">
              <?php 
                $users = mysqli_query($con, "SELECT SUM(total) AS ttl 
                FROM `tb_pemasukan`") or die (mysqli_error($con));
                if (mysqli_num_rows($users) > 0) {
                  while ($data = mysqli_fetch_array($users)) { 
                  echo "Rp ".number_format($data['ttl']);
                } }
              ?>
              </span>
            </div>
          </div>
          <div class="small-box bg-red">
            <a href="../pengajuan_pemasukan/data.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-fax"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Total Pengeluaran</span>
              <span class="info-box-number">
                <?php 
                  $users = mysqli_query($con, "SELECT SUM(total_kel) AS ttl 
                  FROM `tb_pengeluaran`") or die (mysqli_error($con));
                  if (mysqli_num_rows($users) > 0) {
                    while ($data = mysqli_fetch_array($users)) { 
                    echo "Rp ".number_format($data['ttl']);
                  } }
                ?>
              </span>
            </div>
          </div>
          <div class="small-box bg-green">
            <a href="../pengajuan_pengeluaran/data.php" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-calendar"></i></span>
             <div class="info-box-content">
              <span class="info-box-text">Rencana disetujui</span>
              <span class="info-box-number">
                <?php 
                  $users = mysqli_query($con, "SELECT * FROM tb_rencana WHERE status = 'Setuju'") or die (mysqli_error($con));
                  echo mysqli_num_rows($users); 
                ?>
              </span>
            </div>
          </div>
          <div class="small-box bg-yellow">
            <a href="../laporan/laporan_rencana.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>


    </section>

<?php include_once('../footer.php'); 
?>