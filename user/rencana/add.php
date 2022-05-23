<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        KELOLA PENGAJUAN RENCANA 
        <small>Tambah Data Pengajuan Rencana</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">TAMBAH DATA PENGAJUAN RENCANA</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Data Pengajuan Rencana</h3>
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
                        <div class="form-group">
                            <label class="control-label" for="nama_aktivitas"> Nama Aktivitas</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <input type="text" name="nama_aktivitas" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label> Kode Unit</label>
                            <select class="form-control select2" style="width: 100%;" name="kd_unit" >
                                <?php
                                    $kdunit = $_SESSION['kdunit'];
                                    $unit = mysqli_query($con, "SELECT * FROM tb_unit WHERE kd_unit='$kdunit'") or die (mysqli_error($conn));
                                    while ($data_kodeunit = mysqli_fetch_array($unit)) { ?>
                                <option>
                                <?php
                                    echo $data_kodeunit['kd_unit'];
                                    echo " -- ";
                                    echo $data_kodeunit['nama_unit'];
                                 } ?>
                                 </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tahun_anggaran"> Tahun Anggaran</label>
                            <input type="text" name="tahun_anggaran" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="uraian_aktivitas">Uraian Aktivitas</label>
                            <textarea class="form-control" rows="5" name="uraian_aktivitas" id="uraian_aktivitas" required placeholder=
"Dengan hormat,
(ISI PESAN PEMBUKA ANDA) 
yang akan dilaksanakan pada :"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Pelaksanaan</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservation" name="pelaksanaan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tempat"> Tempat</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building-o"></i>
                                </div>
                                <input type="text" name="tempat" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label" for="jenis_anggaran">Dana Anggaran</label>
                             <select class="form-control select2" style="width: 100%;" name="jenis_anggaran" id="jenis_anggaran" required="">
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Prodi">Prodi</option>
                                <option value="Mahasiswa & Prodi">Mahasiswa & Prodi</option>
                            </select>
                       </div>
                        <div class="form-group">
                            <input type="submit" name="add" value="Simpan dan Lanjutkan" class="btn btn-success">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php include_once('../footer.php'); 
?>