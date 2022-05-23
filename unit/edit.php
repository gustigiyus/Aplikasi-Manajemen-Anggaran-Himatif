<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        KELOLA UNIT 
        <small>Edit Data Unit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">EDIT DATA UNIT</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Edit Data Unit</h3>
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
                    $sql_unit = mysqli_query($con, "SELECT * FROM tb_unit WHERE kd_unit = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_unit);
                    ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label class="control-label" for="kode_unit"> Kode Unit</label>
                            <!-- PARAMMETER YANG DIGUNAKAN SEBAGAIN ACUAN EDIT DATA-->
                            <input type="hidden" name="id" value="<?=$data['kd_unit']?>">
                              <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-expeditedssl"></i>
                                </div>
                                <input type="number" name="kode_unit" class="form-control" id="kode_unit" value="<?=$data['kd_unit']?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nama_unit"> Nama Unit</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-group"></i>
                                </div>
                                <input type="text" name="nama_unit" id="nama_unit" class="form-control" value="<?=$data['nama_unit']?>" required autofocus>
                            </div>
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