<?php 
    include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        TAMBAH PENGELUARAN ANGGARAN
        <small>Kelola Pengeluaran Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tambah Pengeluaran Anggaran</li>
      </ol>
</section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-fax"></i> Tambah Pengeluaran Anggaran
            <div class="pull-right">
                <a href="data.php" class="btn btn-info btn-xs">Data</a>
                <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data Lagi</a>
            </div>
        </h2>
        </div>
        <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <form action="proses.php" method="post">
            <!-- PARAMETER $_POST['count_add'] -->  
            <input type="hidden" name="count" value="<?=@$_POST['count_add']?>">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead style="border-bottom: 3px solid orange;">
                        <tr>
                            <th style="background-color: #E6E6FA;">#</th>
                            <th style="background-color: #E6E6FA;"><center>ID Rencana</center></th>
                            <th style="background-color: #E6E6FA;"><center>Jenis Pengeluaran</center></th>
                            <th style="background-color: #E6E6FA;"><center>Keterangan</center></th>
                            <th style="background-color: #E6E6FA;"><center>Jumlah Unit/Satuan</center></th>
                            <th style="background-color: #E6E6FA;"><center>Harga Satuan/Biaya</center></th>
                            <th style="background-color: #E6E6FA;"><center>Total</center></th>
                        </tr>
                    </thead>
                    <?php for ($i=1; $i<=$_POST['count_add']; $i++) { ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$i?>. </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <select class="form-control select2" name="id_rencana-<?=$i?>">
                                    <?php
                                        $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE tb_rencana.status = 'Setuju'") or die (mysqli_error($conn));
                                        while ($data_idrencana = mysqli_fetch_array($rencana)) { ?>
                                    <option>
                                    <?php
                                        echo $data_idrencana['id_rencana'];
                                        echo " -- ";
                                        echo $data_idrencana['nama_aktivitas'];
                                    } ?>
                                    </option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <select name="jenis_pengeluaran-<?=$i?>" class="form-control" required>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Konsumsi">Konsumsi</option>
                                    <option value="Pubdok">Pubdok</option>
                                    <option value="Medik">Medik</option>
                                    <option value="Pengeluaran Lainnya">Pengeluaran Lainnya</option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <textarea class="form-control" rows="4" cols="50" name="keterangan-<?=$i?>" required>
                                </textarea>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="jmlunt-<?=$i?>" name="jumlahunit-<?=$i?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="hrgsat-<?=$i?>" name="hargasatuan-<?=$i?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="ttlpeng-<?=$i?>" name="total-<?=$i?>" class="form-control" required>
                            </td>
                            <input type="hidden" name="status-<?=$i?>" class="form-control" value="Diajukan" required>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
                </div>
                <a href="action.php" style="float: right; margin-right: 10px;" class="btn btn-warning">
                    <i class="fa fa-reply"></i> Kembali
                </a> 
            </div>
            <!-- /.col -->
        </form>
    </div>
    <!-- /.row -->

</section>

<?php include_once('../footer.php'); 
?>