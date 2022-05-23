<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        KELOLA PENYELESAIAN ANGGARAN 
        <small>Tambah Data Penyelesaian Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">TAMBAH DATA PENYELESAIAN ANGGARAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Data Penyelesaian Anggaran</h3>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-flat">
                    <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>  
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        
                        <?php
                        $id = $_GET['id_rencana'];
                        $sql_penyelesaian = mysqli_query($con, "SELECT * FROM tb_pemasukan WHERE id_rencana_pem = '$id'") or die (mysqli_error($con));
                        $data = mysqli_fetch_array($sql_penyelesaian);
                        ?>
                        <div class="form-group" hidden>
                            <?php
                            $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE id_rencana = '$id'") or die (mysqli_error($con));
                            $nmaktiv = mysqli_fetch_array($rencana) ?>
                            <label class="control-label">Nama Aktivitas</label>
                            <input type="hidden" name="id_rencana" class="form-control" value="<?=$nmaktiv['id_rencana']?>">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <input type="input" name="nama_aktivitas" class="form-control" value="<?=$nmaktiv['nama_aktivitas']?>" required> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Aktivitas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <input disabled type="input" name="nama_aktivitas_fake" class="form-control" value="<?=$nmaktiv['nama_aktivitas']?>">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <?php
                            $rencana = mysqli_query($con, "SELECT SUM(total) AS ttl FROM tb_pemasukan WHERE id_rencana_pem = '$id'") or die (mysqli_error($con));
                            $data_ttlmasuk = mysqli_fetch_array($rencana) ?>
                            <label class="control-label">Total Dana Pemasukan</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                                <input type="number" name="dana_pemasukan" id="msk" class="form-control" value="<?=$data_ttlmasuk['ttl']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $pem = mysqli_query($con, "SELECT SUM(total) AS ttl FROM tb_pemasukan WHERE id_rencana_pem = '$id'") or die (mysqli_error($con));
                            $dt_ttlpem = mysqli_fetch_array($pem) ?>
                            <label class="control-label">Total Dana Pemasukan</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                                <input disabled type="number" name="dana_pemasukan_false" id="msk" class="form-control" value="<?=$dt_ttlpem['ttl']?>">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <?php
                            $rencana = mysqli_query($con, "SELECT SUM(total_kel) AS ttl FROM tb_pengeluaran WHERE id_rencana_kel = '$id'") or die (mysqli_error($con));
                            $data_ttlpenge = mysqli_fetch_array($rencana) ?>
                            <label class="control-label">Total Dana Pengeluaran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                                <input type="number" name="dana_pengeluaran" id="klr" class="form-control" value="<?=$data_ttlpenge['ttl']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $kel = mysqli_query($con, "SELECT SUM(total_kel) AS ttl FROM tb_pengeluaran WHERE id_rencana_kel = '$id'") or die (mysqli_error($con));
                            $dt_kel = mysqli_fetch_array($kel) ?>
                            <label class="control-label">Total Dana Pengeluaran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                                <input disabled type="number" name="dana_pengeluaran_false" id="klr" class="form-control" value="<?=$dt_kel['ttl']?>">
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="control-label">Selisih</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span style=" 
                                        background: url('../../gambar/icons/IDR.png');
                                        height: 16px;
                                        width: 16px;
                                        display: block;">
                                    </span>
                                </div>
                                <input type="number" name="selisih" value="<?=$data_ttlmasuk['ttl']-$data_ttlpenge['ttl']?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Selisih</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span style=" 
                                        background: url('../../gambar/icons/IDR.png');
                                        height: 16px;
                                        width: 16px;
                                        display: block;">
                                    </span>
                                </div>
                                <input disabled type="number" name="selisih_fake" value="<?=$data_ttlmasuk['ttl']-$data_ttlpenge['ttl']?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="keterangan">Keterangan</label>
                            <textarea class="form-control" rows="5" name="keterangan" id="keterangan" placeholder="*Boleh Diisi atau Tidak tergantung situasi"></textarea>
                        </div>

                        <!--UPLOAD GAMBAR -->
                        <label class="control-label" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;">UPLOAD GAMBAR</label>
                        <div class="row">
                            <div class="col-lg" style="float:left;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-1"><i class="glyphicon glyphicon-cloud-upload"></i> Nota 1</label>
                                    <div class="input-group">
                                        <input style="display: none;" type="file" name="nota1" id="file-ip-1" class="form-control" accept="image/*" onchange="showPreview(event);">
                                        <div class="preview">
                                            <img style="width:100%; display:none;" id="file-ip-1-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg" style="float:right;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-2"><i class="glyphicon glyphicon-cloud-upload"></i> Nota 2</label>
                                    <div class="input-group">
                                        <input style="display: none;" type="file" name="nota2" id="file-ip-2" class="form-control" accept="image/*" onchange="showPreview2(event);">
                                        <div class="preview">
                                            <img style="width:100%; display:none;" id="file-ip-2-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg" style="float:left;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-3"><i class="glyphicon glyphicon-cloud-upload"></i> Nota 3</label>
                                    <div class="input-group">
                                        <input style="display: none;" type="file" name="nota3" id="file-ip-3" class="form-control" accept="image/*" onchange="showPreview3(event);">
                                        <div class="preview">
                                            <img style="width:100%; display:none;" id="file-ip-3-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg" style="float:right;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-4"><i class="glyphicon glyphicon-cloud-upload"></i> Nota 4</label>
                                    <div class="input-group">
                                        <input style="display: none;" type="file" name="nota4" id="file-ip-4" class="form-control" accept="image/*" onchange="showPreview4(event);">
                                        <div class="preview">
                                            <img style="width:100%; display:none;" id="file-ip-4-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group" style="width:100%; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <label style="display: block; height:50px; line-height:50px; text-align:center; background:#333; color:#fff; font-size:15px; text-transform: Uppercase; font-weight:600; border-radius:10px; cursor:pointer" class="control-label" for="file-ip-5"><i class="glyphicon glyphicon-cloud-upload"></i> Nota 5</label>
                                    <div class="input-group">
                                        <input style="display: none;" type="file" name="nota5" id="file-ip-5" class="form-control" accept="image/*" onchange="showPreview5(event);">
                                        <div class="preview">
                                            <img style="width:100%; display:none;" id="file-ip-5-preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="control-label">Status</label>
                            <select name="status" class="form-control select2" required>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php include_once('../footer.php'); 
?>