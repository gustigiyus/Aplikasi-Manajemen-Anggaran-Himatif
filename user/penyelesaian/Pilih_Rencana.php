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
                    <form action="add.php" method="get" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> ID Rencana</label>
                            <select class="form-control select2" name="id_rencana" required>
                                <?php
                                    $rencana = mysqli_query($con, "SELECT * FROM tb_rencana WHERE tb_rencana.kd_unit=$_SESSION[kdunit] AND tb_rencana.status = 'Setuju'") or die (mysqli_error($conn));
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
                            <input type="submit" name="next" value="Selanjutnya" class="btn btn-success">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>

<?php include_once('../footer.php'); 
?>