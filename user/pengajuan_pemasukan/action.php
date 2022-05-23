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
                    <a href="" class="btn btn-default btn-xl"><i class="fa fa-refresh"></i></a>
                    <a href="data.php" class="btn btn-success btn-flat">
                      <i class="fa fa-reply"></i> Kembali
                    </a> 
                    <a href="generate.php" class="btn btn-primary btn-flat">
                      <i class="fa fa-calculator"></i> Tambah Pemasukan Anggaran
                    </a>
                </div>
            </div>    

           <?php
              $sql = "SELECT * FROM tb_pemasukan";
              $query = $sql;
              $queryjml = $sql;
            ?>
            <form method="post" name="proses">
              <div class="box-body table-responsive">
                  <table id="unit" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th><center>ID Rencana</center></th>
                            <th><center>Dana Anggaran</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Biaya</center></th>
                            <th><center>Total Biaya</center></th>
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
                          <td align="center"><?=$data['id_rencana_pem']?></td>
                          <td align="center"><?=$data['keterangan']?></td>
                          <td align="center"><?=$data['jumlah']?></td>
                          <td align="center"><?php echo number_format($data['harga']); ?></td>
                          <td align="center"><?php echo number_format($data['total']); ?></td>
                          <?php if ($data['status_pem'] == 'Diajukan') { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-warning"><?=$data['status_pem']?></span></td> 
                            <?php } elseif ($data['status_pem'] == 'Setuju') { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-success"><?=$data['status_pem']?></span></td>
                          <?php } else { ?>
                            <td style="text-align: center; vertical-align: middle;"><span class="label label-danger"><?=$data['status_pem']?></span></td>
                            <?php } ?>
                          <td align="center">
                            <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_keterangan']?>">  
                          </td>
                        </tr>
                        <?php 
                          } } ?>
                      </tbody>
                      <tfoot>
                          <tr>
                            <th colspan="6">
                                <center>
                                    <i class="fa fa-cogs"></i> Action 
                                </center>
                            </th>
                            <th colspan="1">
                                <center>
                                    <button class="btn btn-warning btn-xs" onclick="edit()">
                                        <i class="fa fa-edit"></i> Edit
                                    </button> 
                                    <button class="btn btn-danger btn-xs" onclick="hapus()">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button> 
                                </center>
                            </th>
                          </tr>
                      </tfoot>
                  </table>
              </div>
            </form>
        </div>
    </section>

<?php include_once('../footer.php'); ?>