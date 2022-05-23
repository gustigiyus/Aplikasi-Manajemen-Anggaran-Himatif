<?php 
$chk = @$_POST['checked'];
if(!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='action.php';</script>";
} else {
    include_once('../header.php'); 
?>

    <section class="content-header">
        <h1>
            EDIT PEMASUKAN ANGGARAN
            <small>Kelola Pemasukan Anggaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Pemasukan Anggaran</li>
        </ol>
    </section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-fax"></i> Edit Pemasukan Anggaran
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
                    <thead style="border-bottom: 3px solid orange;">
                        <tr>
                            <th style="background-color: #E6E6FA;">#</th>
                            <th style="background-color: #E6E6FA;"><center>ID Rencana</center></th>
                            <th style="background-color: #E6E6FA;"><center>Dana Anggaran</center></th>
                            <th style="background-color: #E6E6FA;"><center>Jumlah</center></th>
                            <th style="background-color: #E6E6FA;"><center>Biaya</center></th>
                            <th style="background-color: #E6E6FA;"><center>Total Biaya</center></th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $total = 0;
                    $tot_bayar = 0;           
                    foreach ($chk as $id) {
                        $sql_pemasukan = mysqli_query($con, "SELECT * FROM tb_pemasukan WHERE id_keterangan = '$id'") or die (mysqli_error($con));
                        while($data = mysqli_fetch_array($sql_pemasukan)) { 
                            $total += $data['total']; 
                            ?>
                    <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>. </td>
                            <input type="hidden" name="idket[]" value="<?=$data['id_keterangan']?>">
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
                                <select name="keterangan[]" class="form-control" required>
                                    <option value="<?=$data['keterangan']?>">
                                        <?=$data['keterangan']?>
                                    </option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Prodi D3 & D4">Prodi D3 & D4</option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="jml-<?=$no?>" name="jumlah[]" value="<?=$data['jumlah']?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="hrg-<?=$no?>" name="harga[]" value="<?=$data['harga']?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="ttl-<?=$no?>" name="total[]" value="<?=$data['total']?>" class="form-control" required>
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