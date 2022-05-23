<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        RENCANA ANGGARAN
        <small>Kelola Rencana Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Rencana Anggaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<style>

td.details-control {
    text-align: center;
    color: forestgreen;
    cursor: pointer;
}
tr.shown td.details-control {
  text-align: center;
    color: red;
}

</style>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tabel Rencana Anggaran</h3>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-xl"><i class="fa fa-refresh"></i></a>
                    <a href="add.php" class="btn btn-primary btn-flat">
                    <i class="fa fa-calendar-o"></i> Tambah Rencana
                    </a>
                </div>
            </div>    

             <?php
                $sql = "SELECT * FROM tb_rencana";
                $query = $sql;
                $queryjml = $sql;
                ?>
            <div class="box-body table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover" style="width:100%">
              <thead>
                  <tr>
                      <th>Rinican Dana</th>
                      <th>ID Rencana</th>
                      <th>Nama Aktivitas</th>
                      <th>Tahun Anggaran</th>
                      <th>Uraian Aktivitas</th>
                      <th>Jenis Anggaran</th>
                      <th>Pelaksanaan</th>
                      <th>Tempat</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th style="text-align: center; vertical-align: middle;">Rinican Dana</th>
                      <th style="text-align: center; vertical-align: middle;">ID Rencana</th>
                      <th style="text-align: center; vertical-align: middle;">Nama Aktivitas</th>
                      <th style="text-align: center; vertical-align: middle;">Tahun Anggaran</th>
                      <th style="text-align: center; vertical-align: middle;">Uraian Aktivitas</th>
                      <th style="text-align: center; vertical-align: middle;">Jenis Anggaran</th>
                      <th style="text-align: center; vertical-align: middle;">Pelaksanaan</th>
                      <th style="text-align: center; vertical-align: middle;">Tempat</th>
                      <th style="text-align: center; vertical-align: middle;">Status</th>
                      <th style="text-align: center; vertical-align: middle;">Action</th>
                  </tr>
              </tfoot>
            </table>
            </div>
        </div>


        <div class='container'>
    </section>


<?php include_once('../footer.php'); 
?>