<?php 
$chk = @$_POST['checked'];
if(!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='action.php';</script>";
} else {
    include_once('../header.php'); 
?>

    <section class="content-header">
        <h1>
            EDIT PENGELUARAN ANGGARAN
            <small>Kelola Pengeluaran Anggaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Pengeluaran Anggaran</li>
        </ol>
    </section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-fax"></i> Edit Pengeluaran Anggaran
            <small class="pull-right">
                Bandung, <?php date_default_timezone_set('Asia/Jakarta'); 
                echo date("Y-m-d h:i:s");?>
            </small>
        </h2>
        </div>
        <!-- /.col -->
    </div>

    <!-- Table row -->
    <div class="row">
        <form action="proses.php" method="post">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-hover">
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
                    <?php
                    $no = 1;
                    $total = 0;
                    $tot_bayar = 0;           
                    foreach ($chk as $id) {
                        $sql_pemasukan = mysqli_query($con, "SELECT * FROM tb_pengeluaran WHERE id_pengeluaran = '$id'") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_pemasukan)) { 
                            $total += $data['total_kel']; 
                            ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>. </td>
                            <input type="hidden" name="idpeng[]" value="<?=$data['id_pengeluaran']?>">
                            <td style="text-align: center; vertical-align: middle;">
                                <select class="form-control select2" name="id_rencana[]">
                                    <?php
                                        $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE status='Setuju'") or die (mysqli_error($con));
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
                                <select name="jenis_pengeluaran[]" class="form-control" required>
                                    <option value="<?=$data['jenis_pengeluaran']?>">
                                        <?=$data['jenis_pengeluaran']?>
                                    </option>
                                    <option value="Transportasi">Transportasi</option>
                                    <option value="Konsumsi">Konsumsi</option>
                                    <option value="Pubdok">Pubdok</option>
                                    <option value="Medik">Medik</option>
                                    <option value="Pengeluaran Lainnya">Pengeluaran Lainnya</option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <textarea class="form-control" rows="4" cols="50" name="keterangan[]" required>
                                <?=$data['keterangan_kel']?></textarea>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="jmlunt-<?=$no?>" name="jmlunt[]" value="<?=$data['jumlah_unit']?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="hrgsat-<?=$no?>" name="hrgsat[]" value="<?=$data['harga_satuan']?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="ttlpeng-<?=$no?>" name="ttlpeng[]" value="<?=$data['total_kel']?>" class="form-control" required>
                            </td>
                            <input type="hidden" name="status[]" class="form-control" value="Diajukan" required>
                        </tr>
                    </tbody>
                    <?php
                        } }
                    ?>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
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
}
?>