<?php 
$chk = @$_POST['checked'];
if(!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='action.php';</script>";
} else {
    include_once('../header.php'); 
?>

    <section class="content-header">
        <h1>
            EDIT PERSETUJUAN PENGELUARAN ANGGARAN
            <small>Kelola Persetujuan Pengeluaran Anggaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Persetujuan Pengeluaran Anggaran</li>
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
                <table class="table table-striped">
                    <thead style="border-bottom: 3px solid red;">
                        <tr>
                            <th style="background-color: #E6E6FA; text-align: center;">#</th>
                            <th style="background-color: #E6E6FA; text-align: center;">ID Rencana</th>
                            <th style="background-color: #E6E6FA; text-align: center;">Jenis Pengeluaran</th>
                            <th style="background-color: #E6E6FA; text-align: center;">Keterangan</th>
                            <th style="background-color: #E6E6FA; text-align: center;">Jumlah Unit/Satuan</th>
                            <th style="background-color: #E6E6FA; text-align: center;">Harga Satuan/Biaya</th>
                            <th style="background-color: #E6E6FA; text-align: center; width: 15%;">Total</th>
                            <th style="background-color: #E6E6FA; text-align: center;">Status</th>
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
                            <th style="text-align: center;"><?=$no++?>. </th>
                            <input type="hidden" name="idpeng[]" value="<?=$data['id_pengeluaran']?>">
                            <td align="center"><?=$data['id_rencana_kel']?></td>
                            <td align="center"><?=$data['jenis_pengeluaran']?></td>
                            <td align="center"><?=$data['keterangan_kel']?></td>
                            <td align="center"><?=$data['jumlah_unit']?></td>
                            <td align="center">Rp. <?php echo number_format($data['harga_satuan']); ?></td>
                            <td align="center">Rp. <?php echo number_format($data['total_kel']); ?></td>
                            <td>
                                <select name="status[]" class="form-control" required>
                                    <option value="<?=$data['status_kel']?>">
                                        <?=$data['status_kel']?>
                                    </option>
                                    <option value="Setuju">Setuju</option>
                                    <option value="Tidak Setuju">Tidak Setuju</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        } }
                    ?>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="background-color: #E6E6FA;"><center>SUBTOTAL : </center></th>
                            <th style="background-color: #E6E6FA;"><center>Rp. <?php echo number_format(@$total); ?></center></th>
                            <th style="background-color: #E6E6FA;"></th>
                        </tr>
                    </tfoot>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
                </div>
            </div>
            <!-- /.col -->
        </form>
    </div>
    <!-- /.row -->

</section>

<?php include_once('../footer.php'); 
}
?>