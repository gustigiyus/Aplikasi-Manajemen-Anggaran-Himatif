<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        PENGELUARAN ANGGARAN
        <small>Kelola Pengeluaran Anggaran</small>
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
                  <a href="" class="btn btn-default btn-xl"><i class="fa fa-refresh"></i></a>
                  <a href="data.php" class="btn btn-success btn-flat">
                    <i class="fa fa-reply"></i> Kembali
                  </a>  
                  <a href="generate.php" class="btn btn-primary btn-flat">
                    <i class="fa fa-calculator"></i> Tambah Pengeluaran Anggaran
                  </a>
                </div>
            </div>    

           <?php
              $sql = "SELECT * FROM tb_pengeluaran";
              $query = $sql;
              $queryjml = $sql;
            ?>
            <form method="post" name="proses">
              <div class="box-body table-responsive">
                  <table id="unit" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th style="text-align: center; vertical-align: middle;"><center>ID Rencana</center></th>
                            <th><center>Jenis Pengeluaran</center></th>
                            <th><center>Keterangan</center></th>
                            <th><center>Jumlah Satuan/Unit</center></th>
                            <th><center>Harga Satuan/Biaya</center></th>
                            <th style="width: 80px;"><center>Total</center></th>
                            <th><center>Status</center></th>
                            <th style="padding-right: 10px;">
                              <center>
                                <input type="checkbox" id="select_all" value=""> 
                              </center>
                            </th>
                          </tr>
                      </thead>
<!-- Table Body --> 
                      <tbody>
                      <?php
                      $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                      if (mysqli_num_rows($sql_unit) > 0) {
                        while ($data = mysqli_fetch_array($sql_unit)) { ?>
                        <tr>
                          <td align="center"><?=$data['id_rencana_kel']?></td>
                          <td align="center"><?=$data['jenis_pengeluaran']?></td>
                          <td align="center"><?=$data['keterangan_kel']?></td>
                          <td align="center"><?=$data['jumlah_unit']?></td>
                          <td align="center">Rp. <?php echo number_format($data['harga_satuan']); ?></td>
                          <td align="center">Rp. <?php echo number_format($data['total_kel']); ?></td>
                          <?php if ($data['status_kel'] == 'Diajukan') { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-warning"><?=$data['status_kel']?></span></td> 
                            <?php } elseif ($data['status_kel'] == 'Setuju') { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-success"><?=$data['status_kel']?></span></td>
                          <?php } else { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-danger"><?=$data['status_kel']?></span></td>
                            <?php } ?>
                          <td style="text-align: center; vertical-align: middle;">
                            <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_pengeluaran']?>">  
                          </td>
                        </tr>
                        <?php 
                          } } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th colspan="7" style="text-align: center; vertical-align: middle;">
                                <i class="fa fa-cogs"></i> Action 
                            </th>
                            <th colspan="1" style="text-align: center; vertical-align: middle;">
                                <button style="margin-bottom: 4px;" class="btn btn-warning btn-xs" onclick="edit()">
                                    <i class="fa fa-edit"></i> Edit
                                </button> 
                                <button class="btn btn-danger btn-xs" onclick="hapus()">
                                    <i class="fa fa-trash"></i> Hapus
                                </button> 
                            </th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
            </form>
        </div>
    </section>

<?php include_once('../footer.php'); ?>