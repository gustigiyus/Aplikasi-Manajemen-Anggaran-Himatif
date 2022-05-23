<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        LAPORAN PENGAJUAN RENCANA
        <small>Kelola Laporan Pengajuan Rencana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Laporan Pengajuan Rencana</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Laporan Pengajuan Rencana</h3>
            </div>    

             <?php
                $sql = "SELECT * FROM tb_rencana WHERE status='Setuju'";
                $query = $sql;
                $queryjml = $sql;
                ?>
            <div class="box-body table-responsive">
                <table id="unit" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th><center>ID Rencana</center></th>
                          <th><center>Nama Aktivitas</center></th>
                          <th><center>Tahun Anggran</center></th>
                          <th><center>Uraian Aktivitas</center></th>
                          <th><center>Dana Anggaran</center></th>
                          <th><center>Pelaksanaan</center></th>
                          <th><center>Tempat</center></th>
                          <th><center>Status</center></th>
                          <th><center>Action</center></th>
                        </tr>
                    </thead>
<!-- Table Body --> 
                    <tbody>
                    <?php
                    $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                    if (mysqli_num_rows($sql_unit) > 0) {
                      while ($data = mysqli_fetch_array($sql_unit)) { ?>
                        <tr>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['id_rencana']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['nama_aktivitas']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['tahun_anggaran']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['uraian_aktivitas']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['jenis_anggaran']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['pelaksanaan']?></td>
                          <td style="text-align: center; vertical-align: middle;"><?=$data['tempat']; ?></td>
                          <?php if ($data['status'] == 'Setuju') { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-success"><?=$data['status']?></span></td>
                          <?php } ?>
                          <td style="text-align: center; vertical-align: middle;">
                            <a href="print_rencana.php?id=<?=$data['id_rencana']?>" class="btn btn-info btn-xl"><i class="glyphicon glyphicon-print"></i></a>
                          </td>
                        </tr>
                      <?php 
                        } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


<?php include_once('../footer.php'); 
?>