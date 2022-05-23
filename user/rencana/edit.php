<?php 
include_once('../header.php'); 
?>

<section class="content-header">
    <h1>
    Edit Rencana Pengajuan Anggaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Rencana Pengajuan Anggaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#setting" data-toggle="tab">Edit Rencana pengajuan Anggaran</a></li>
                    <li><a href="#setinguser" data-toggle="tab">Edit Rencana Rincian Dana</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="setting">
                        <form class="form-horizontal" action="proses.php" method="post">
                            <?php
                                $id = @$_GET['id'];
                                $sql_rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE id_rencana = '$id'") or die (mysqli_error($con));
                                $data = mysqli_fetch_array($sql_rencana);
                            ?>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label" for="nama_aktivitas"> Nama Aktivitas</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                                    <input type="hidden" name="idrec" value="<?=$data['id_rencana']?>">
                                    <!-- Akhir dari Parameter -->

                                    <input type="text" name="nama_aktivitas" value="<?=$data['nama_aktivitas'];?>" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label" for="tahun_anggaran"> Tahun Anggaran</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <input type="text" name="tahun_anggaran" value="<?=$data['tahun_anggaran'];?>" class="form-control" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label" for="uraian_aktivitas">Uraian Aktivitas</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <textarea class="form-control" rows="5" name="uraian_aktivitas" id="uraian_aktivitas" required><?=$data['uraian_aktivitas'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label" for="jenis_anggaran">Dana Anggaran</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fax"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" name="jenis_anggaran" id="jenis_anggaran" required>
                                        <option value="<?=$data['jenis_anggaran'];?>"><?=$data['jenis_anggaran'];?></option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                        <option value="Prodi">Prodi</option>
                                        <option value="Mahasiswa & Prodi">Mahasiswa & Prodi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label> Pelaksanaan</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" value="<?=$data['pelaksanaan'];?>" id="reservation" name="pelaksanaan">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label> Tempat</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building-o"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" value="<?=$data['tempat'];?>" name="tempat">
                                </div>
                            </div>            
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10" style="text-align: right;">
                                    <button type="submit" name="edit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Simpan Rencana Pengajuan</button>
                                </div>
                            </div>
                            <input type="hidden" name="status" class="form-control" value="Diajukan" required>
                        </form>     
                    </div>
    
                    <div class="tab-pane" id="setinguser">
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
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="size:100px;"><center>Jenis Pengeluaran</center></th>
                                                <th><center>Uraian Pengeluaran</center></th>
                                                <th><center>Total Dana</center></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $no = 1;       
                                            $id = @$_GET['id'];
                                            $sql_rencana = mysqli_query($con, "SELECT * FROM tb_rincian_dana WHERE id_rencanaDana = '$id'") or die (mysqli_error($con));
                                            $data = mysqli_fetch_array($sql_rencana); 
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?=$no++?>.</td>
                                                <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                                                <input type="hidden" name="idrec2" value="<?=$data['id_rencanaDana']?>">
                                                <!-- Akhir dari Parameter -->
                                                <td style="text-align: center; vertical-align: middle;">
                                                    Pengeluaran Publikasi & Dokumentasi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_pub" rows="5" cols="70"><?=$data['uraian_pubdok']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="number" id="num1" name="ttl_pub" class="form-control" value="<?=$data['totda_pubdok'];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?=$no++?>.</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    Pengeluaran Transportasi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_tran" rows="5" cols="70"><?=$data['uraian_transportasi']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="number" id="num2" name="ttl_tran" class="form-control" value="<?=$data['totda_transportasi'];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?=$no++?>.</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    Pengeluaran Konsumsi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_kons" rows="5" cols="70"><?=$data['uraian_konsumsi']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="number" id="num3" name="ttl_kons" class="form-control" value="<?=$data['totda_konsumsi'];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?=$no++?>.</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    Pengeluaran Medik
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_med" rows="5" cols="70"><?=$data['uraian_medik']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="number" id="num4" name="ttl_med" class="form-control" value="<?=$data['totda_medik'];?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle;"><?=$no++?>.</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    Pengeluaran Lainnya
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_dll" rows="5" cols="70"><?=$data['uraian_lainnya']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="number" id="num5" name="ttl_dll" class="form-control" value="<?=$data['totda_lainnya'];?>">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th style="background-color: #E6E6FA;"></th>
                                                <th style="background-color: #E6E6FA;"></th>
                                                <th style="background-color: #E6E6FA; text-align: right;">SUBTOTAL : </th>
                                                <th style="background-color: #E6E6FA;">
                                                    <input type="number" id="numttl" name="ttl_all" class="form-control" value="<?=$data['total_semuaBiaya'];?>">
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="form-group pull-right">
                                        <button type="submit" name="edit2" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Simpan Uraian Rincian Dana</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</section>

<?php include_once('../footer.php'); 
?>
