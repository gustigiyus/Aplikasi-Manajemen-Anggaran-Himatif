<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        PENGELUARAN ANGGARAN
        <small>Pengeluaran Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengeluaran Anggaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel Pengeluaran Anggaran</h3>
                <div class="pull-right">
                    <a href="action.php" class="btn bg-purple">
                      <i class="fa fa-cog"></i> Kelola Persetujuan Pengeluaran Anggaran
                    </a>
                </div>
            </div>    
            <form method="post" name="proses">
              <div class="box-body table-responsive">
                  <table id="data_pengeluaran" class="table table-bordered table-striped table-hover table-order-column" style="width:100%">
                      <thead>
                          <tr>
                            <th><center>ID Rencana</center></th>
                            <th><center>Jenis Pengeluaran</center></th>
                            <th><center>Keterangan</center></th>
                            <th><center>Jumlah Satuan/Unit</center></th>
                            <th><center>Harga Satuan/Biaya</center></th>
                            <th style="width: 80px;"><center>Total</center></th>
                            <th><center>Status</center></th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                        <tr>
                          <th><center>Subtotal</center></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th id="total_pengeluaran"></th>
                          <th></th>
                        </tr>
                      </tfoot>
                  </table>
              </div>
            </form>
        </div>
    </section>

<?php include_once('../footer.php'); ?>