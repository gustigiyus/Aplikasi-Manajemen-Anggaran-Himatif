<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        KELOLA PERSETUJUAN PENYELESAIAN ANGGARAN 
        <small>Edit Persetujuan Penyelesaian Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">EDIT DATA PENYELESAIAN ANGGARAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Persetujuan Penyelesaian Anggaran</h3>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-flat">
                    <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>  
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                    <?php
                    $id = @$_GET['id'];
                    $sql_penyelesaian = mysqli_query($con, "SELECT * FROM tb_penyelesaian WHERE id_rencana_penye = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_penyelesaian);
                    ?>
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                            <input type="hidden" name="idrenca_penye" value="<?=$data['id_rencana_penye']?>">
                            <!-- Akhir dari Parameter -->
                            
                            <label> ID Rencana</label>
                            <select class="form-control select2" disabled="true" name="id_rencana">
                                <?php
                                    $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE id_rencana = '$id'") or die (mysqli_error($conn));
                                    while ($data_idrencana = mysqli_fetch_array($rencana)) { ?>
                                <option>
                                <?php
                                    echo $data_idrencana['id_rencana'];
                                    echo " - ";
                                    echo $data_idrencana['nama_aktivitas'];
                                } ?>
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Dana Pemasukan</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-line-chart"></i>
                                </div>
                                <input type="number" disabled="true" value="<?=$data['dana_pemasukan']?>" name="dana_pemasukan" id="msk" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total Dana Pengeluaran</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calculator"></i>
                                </div>
                                <input type="number" disabled="true" value="<?=$data['dana_pengeluaran']?>" name="dana_pengeluaran" id="klr" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Selisih</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span style=" 
                                        background: url('../gambar/icons/IDR.png');
                                        height: 16px;
                                        width: 16px;
                                        display: block;">
                                    </span>
                                </div>
                                <input type="number" disabled="true" value="<?=$data['selisih']?>" name="selisih" id="hsl" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="keterangan">Keterangan</label>
                            <textarea class="form-control" disabled="true" rows="5" name="keterangan" id="keterangan" required><?=$data['keterangan']?></textarea>
                        </div>


                        <label class="control-label" style="display: block; height:50px; line-height:50px; text-align:center; font-size:20px;">BUKTI NOTA</label>
                        <div class="row">
                            <div class="col" style="float:left;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <img width="100%;" src="../gambar/<?=$data['nota_1']?>" onerror="this.onerror=null;this.src='../gambar/icons/noimage.jpg';" alt="nota 1">
                                </div>
                            </div>
                            <div class="col" style="float:right;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <img width="100%;" src="../gambar/<?=$data['nota_2']?>" onerror="this.onerror=null;this.src='../gambar/icons/noimage.jpg';" alt="nota 2">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="float:left;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <img width="100%;" src="../gambar/<?=$data['nota_3']?>" onerror="this.onerror=null;this.src='../gambar/icons/noimage.jpg';" alt="nota 3">
                                </div>
                            </div>
                            <div class="col" style="float:right;">
                                <div class="form-group" style="width:250px; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <img width="100%;" src="../gambar/<?=$data['nota_4']?>" onerror="this.onerror=null;this.src='../gambar/icons/noimage.jpg';" alt="nota 4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group" style="width:100%; padding:20px; background: #fff; border: 2px dashed #555;">
                                    <img width="100%;" src="../gambar/<?=$data['nota_5']?>" onerror="this.onerror=null;this.src='../gambar/icons/noimage2.jpg';" alt="nota 5">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value=""><?=$data['status']?></option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php include_once('../footer.php'); 
?>