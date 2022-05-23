<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        PEMASUKAN ANGGARAN
        <small>Kelola Pemasukan Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pemasukan Anggaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel Pemasukan Anggaran</h3>
                <div class="pull-right">
                    <a href="action.php" class="btn bg-purple">
                      <i class="fa fa-cog"></i> Kelola Pemasukan Anggaran
                    </a>
                </div>
            </div>    
            <form method="post" name="proses">
              <div class="box-body table-responsive">
                  <table id="data_pemasukan" class="table table-bordered table-striped table-hover" style="width:100%">
                      <thead>
                          <tr>
                            <th><center>ID Rencana</center></th>
                            <th><center>Dana Anggaran</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Biaya</center></th>
                            <th><center>Total Biaya</center></th>
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
                          <th id="total_order"></th>
                          <th></th>
                        </tr>
                      </tfoot>
                  </table>
              </div>
            </form>
        </div>
    </section>

<?php include_once('../footer.php'); ?>