<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        PENYELESAIAN ANGGARAN
        <small>Kelola Penyelesaian Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Penyelesaian Anggaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<style>

td.lihat-detail {
    text-align: center;
    color: forestgreen;
    cursor: pointer;
}
tr.shown td.lihat-detail {
  text-align: center;
    color: red;
}

</style>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tabel Persetujuan Penyelesaian Anggaran</h3>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-xl"><i class="fa fa-refresh"></i></a>
                  <a href="Pilih_Rencana.php" class="btn btn-primary btn-flat">
                    <i class="fa fa-briefcase"></i> Tambah Penyelesaian Anggaran
                  </a>
                </div>
            </div>    

             <?php
                $sql = "SELECT * FROM tb_penyelesaian";
                $query = $sql;
                $queryjml = $sql;
                ?>
            <div class="box-body table-responsive">
            <table id="tbpenyelesaian" class="table table-bordered table-striped table-hover" style="width:100%">
              <thead>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;"><i class="glyphicon glyphicon-picture"></i> Bukti/Nota</th>
                    <th><center>ID Rencana</center></th>
                    <th><center>Nama Aktivitas</center></th>
                    <th><center>Dana Pemasukan</center></th>
                    <th><center>Dana Pengeluaran</center></th>
                    <th><center>Selisih</center></th>
                    <th><center>Keterangan</center></th>
                    <th><center>Status</center></th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th style="text-align: center; vertical-align: middle;"><i class="glyphicon glyphicon-picture"></i> Bukti/Nota</th>
                    <th><center>ID Rencana</center></th>
                    <th><center>Nama Aktivitas</center></th>
                    <th><center>Dana Pemasukan</center></th>
                    <th><center>Dana Pengeluaran</center></th>
                    <th><center>Selisih</center></th>
                    <th><center>Keterangan</center></th>
                    <th><center>Status</center></th>
                    <th>Action</th>
                  </tr>
              </tfoot>
            </table>
            </div>
        </div>


        <div class='container'>
    </section>


<?php include_once('../footer.php'); 
?>