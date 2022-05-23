<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        KELOLA RINCIAN DANA 
        <small>Tambah Data Rincian Dana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Tambah Data Rincian Dana</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Data Rincian Dana</h3>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-flat">
                    <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>  
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">

                    <td>
                        <select class="form-control select2" name="id_rencanaDana">
                            <?php
                                $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE status = 'Diajukan'") or die (mysqli_error($conn));
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

                        <label class="control-label" style="display: block; height:20px; line-height:40px; text-align:center; font-size:18px;">RINCIAN DANA</label>
                        <br>
                        <div style="border: black solid 2px; padding: 5px;">
                            <div class="form-group">
                                <label class="control-label" for="ur_pub">#1. Uraian Publikasi & Dokumentasi</label>
                                <textarea class="form-control" rows="5" name="ur_pub" id="ur_pub" placeholder=
"1. Uraian Pengeluaran,
2. Uraian Pengeluaran,
3. Uraian Pengeluaran,
4. Uraian Pengeluaran,
Dst..."></textarea>
                            </div>
                            <div>
                            <label class="control-label">Total Dana Publikasi & Dokumentasi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span style=" 
                                            background: url('../../gambar/icons/IDR.png');
                                            height: 16px;
                                            width: 16px;
                                            display: block;">
                                        </span>
                                    </div>
                                    <input type="number" id="num1" value="0" name="ttl_pub" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="border: black solid 2px; padding: 5px;">
                            <div class="form-group">
                                <label class="control-label" for="ur_tran">#2. Uraian Transportasi</label>
                                <textarea class="form-control" rows="5" name="ur_tran" id="ur_tran" placeholder=
"1. Uraian Pengeluaran,
2. Uraian Pengeluaran,
3. Uraian Pengeluaran,
4. Uraian Pengeluaran,
Dst..."></textarea>
                            </div>
                            <div>
                            <label class="control-label">Total Dana Transportasi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span style=" 
                                            background: url('../../gambar/icons/IDR.png');
                                            height: 16px;
                                            width: 16px;
                                            display: block;">
                                        </span>
                                    </div>
                                    <input type="number" id="num2" value="0" name="ttl_tran" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="border: black solid 2px; padding: 5px;">
                            <div class="form-group">
                                <label class="control-label" for="ur_kons">#3. Uraian Konsumsi</label>
                                <textarea class="form-control" rows="5" name="ur_kons" id="ur_kons" placeholder=
"1. Uraian Pengeluaran,
2. Uraian Pengeluaran,
3. Uraian Pengeluaran,
4. Uraian Pengeluaran,
Dst..."></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Total Dana Konsumsi</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span style=" 
                                            background: url('../../gambar/icons/IDR.png');
                                            height: 16px;
                                            width: 16px;
                                            display: block;">
                                        </span>
                                    </div>
                                    <input type="number" id="num3" value="0" name="ttl_kons" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="border: black solid 2px; padding: 5px;">
                            <div class="form-group">
                                <label class="control-label" for="ur_med">#4. Uraian Medik</label>
                                <textarea class="form-control" rows="5" value="0" name="ur_med" id="ur_med" placeholder=
"1. Uraian Pengeluaran,
2. Uraian Pengeluaran,
3. Uraian Pengeluaran,
4. Uraian Pengeluaran,
Dst..."></textarea>
                            </div>
                            <div>
                            <label class="control-label">Total Dana Medik</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span style=" 
                                            background: url('../../gambar/icons/IDR.png');
                                            height: 16px;
                                            width: 16px;
                                            display: block;">
                                        </span>
                                    </div>
                                    <input type="number" id="num4" value="0"  name="ttl_med" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div style="border: black solid 2px; padding: 5px;">
                            <div class="form-group">
                                <label class="control-label" for="ur_dll">#5. Uraian Lainnya</label>
                                <textarea class="form-control" rows="5" name="ur_dll" id="ur_dll" placeholder=
"1. Uraian Pengeluaran,
2. Uraian Pengeluaran,
3. Uraian Pengeluaran,
4. Uraian Pengeluaran,
Dst..."></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Total Dana Uraian Lainnya</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span style=" 
                                            background: url('../../gambar/icons/IDR.png');
                                            height: 16px;
                                            width: 16px;
                                            display: block;">
                                        </span>
                                    </div>
                                    <input type="number" id="num5" value="0" name="ttl_dll" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <label class="control-label" style="text-transform: uppercase;">Total Seluruh Dana</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span style=" 
                                        background: url('../../gambar/icons/IDR.png');
                                        height: 16px;
                                        width: 16px;
                                        display: block;">
                                    </span>
                                </div>
                                <input type="number" id="numttl" name="ttl_all" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add2" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php include_once('../footer.php'); 
?>