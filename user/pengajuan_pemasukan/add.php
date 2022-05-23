<?php 
    include_once('../header.php'); 
?>

    <section class="content-header">
        <h1>
            TAMBAH PEMASUKAN ANGGARAN
            <small>Kelola Pemasukan Anggaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tambah Pemasukan Anggaran</li>
        </ol>
    </section>


<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-fax"></i> Tambah Pemasukan Anggaran
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
            <div class="col-xs-12 table-responsive">
            <!-- PARAMETER $_POST['count_add'] -->  
            <input type="hidden" name="count" value="<?=@$_POST['count_add']?>">
                <table class="table table-striped table-hover">
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
                    <?php for ($i=1; $i<=$_POST['count_add']; $i++) { ?>
                    </tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$i?>. </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <select class="form-control select2" name="id_rencana-<?=$i?>" required>
                                    <?php
                                        $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE tb_rencana.kd_unit=$_SESSION[kdunit] AND tb_rencana.status = 'Setuju'") or die (mysqli_error($conn));
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
                                <select name="keterangan-<?=$i?>" class="form-control" required>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Prodi D3 & D4">Prodi D3 & D4</option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="jml-<?=$i?>" name="jumlah-<?=$i?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="hrg-<?=$i?>" name="harga-<?=$i?>" class="form-control" required>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <input type="number" id="ttl-<?=$i?>" name="total-<?=$i?>" class="form-control" required>
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