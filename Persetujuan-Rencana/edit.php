<?php 
include_once('../header.php'); 
?>

<section class="content-header">
    <h1>
    Edit Persetujuan Rencana Pengajuan Anggaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Persetujuan Rencana Pengajuan Anggaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#setting" data-toggle="tab">Data Rencana pengajuan Anggaran</a></li>
                    <li><a href="#setinguser" data-toggle="tab">Data Rencana Rincian Dana</a></li>
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
                                    <label class="control-label"> Nama Aktivitas</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bullhorn"></i>
                                    </div>
                                    <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                                    <input type="hidden" name="idrec" value="<?=$data['id_rencana']?>">
                                    <!-- Akhir dari Parameter -->

                                    <input type="text" value="<?=$data['nama_aktivitas'];?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label"> Tahun Anggaran</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <input type="text" value="<?=$data['tahun_anggaran'];?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label">Uraian Aktivitas</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <textarea class="form-control" rows="5" disabled><?=$data['uraian_aktivitas'];?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label">Dana Anggaran</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="fa fa-fax"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" disabled>
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
                                    <input type="text" class="form-control pull-right" value="<?=$data['pelaksanaan'];?>" disabled>
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
                                    <input type="text" class="form-control pull-right" value="<?=$data['tempat'];?>"  disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <label class="control-label">Status</label>
                                </div>
                                <div class="input-group col-sm-offset-1 col-sm-10">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-record"></i>
                                    </div>
                                    <select class="form-control select2" style="width: 100%;" name="stat">
                                        <option value="<?=$data['status']?>">
                                        <?=$data['status']?>
                                        </option>
                                        <option value="Setuju">Setuju</option>
                                        <option value="Tidak Setuju">Tidak Setuju</option>
                                    </select>
                                </div> 
                            </div>           
                            <div class="form-group">
                                <div class="input-group col-sm-offset-1 col-sm-10" style="text-align: right;">
                                    <button type="submit" name="edit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Simpan Status Persetujuan</button>
                                </div>
                            </div>
                        </form>     
                    </div>
    
                    <div class="tab-pane" id="setinguser">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-fax"></i> Data Rincian Dana
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
                                                <th style="background-color: #E6E6FA;">#</th>
                                                <th style="background-color: #E6E6FA;"><center>Jenis Pengeluaran</center></th>
                                                <th style="background-color: #E6E6FA;"><center>Uraian Pengeluaran</center></th>
                                                <th style="background-color: #E6E6FA;"><center>Total Dana</center></th>
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
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>.</td>
                                                <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                                                <input type="hidden" name="idrec2" value="<?=$data['id_rencanaDana']?>">
                                                <!-- Akhir dari Parameter -->
                                                <td style="vertical-align: middle;">
                                                    Pengeluaran Publikasi & Dokumentasi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_pub" rows="4" cols="50" disabled><?=$data['uraian_pubdok']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;">
                                                    Rp. <?php echo number_format($data['totda_pubdok']);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>.</td>
                                                <td style="vertical-align: middle;">
                                                    Pengeluaran Transportasi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_tran" rows="4" cols="50" disabled><?=$data['uraian_transportasi']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;">
                                                    Rp. <?php echo number_format($data['totda_transportasi']);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>.</td>
                                                <td style="vertical-align: middle;">
                                                    Pengeluaran Konsumsi
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_kons" rows="4" cols="50" disabled><?=$data['uraian_konsumsi']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;">
                                                    Rp. <?php echo number_format($data['totda_konsumsi']);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>.</td>
                                                <td style="vertical-align: middle;">
                                                    Pengeluaran Medik
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_med" rows="4" cols="50" disabled><?=$data['uraian_medik']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;">
                                                    Rp. <?php echo number_format($data['totda_medik']);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?=$no++?>.</td>
                                                <td style="vertical-align: middle;">
                                                    Pengeluaran Lainnya
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <textarea class="form-control" name="ur_dll" rows="4" cols="50" disabled><?=$data['uraian_lainnya']; ?></textarea>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle; font-weight: bold;">
                                                    Rp. <?php echo number_format($data['totda_lainnya']);?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot style="border-top: 3px solid black;">
                                            <tr>
                                                <th style="background-color: #E6E6FA;"></th>
                                                <th style="background-color: #E6E6FA;"></th>
                                                <th style="background-color: #E6E6FA; text-align: right;">SUBTOTAL : </th>
                                                <th style="text-align: center; vertical-align: middle; font-weight: bold; background-color: #E6E6FA;">
                                                    Rp. <?php echo number_format($data['total_semuaBiaya']);?> 
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
