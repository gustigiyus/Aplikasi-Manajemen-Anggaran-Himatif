<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        PENGELUARAN ANGGARAN
        <small>Kelola Pengeluaran Anggaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengeluaran Anggaran</li>
      </ol>
</section>


    <!-- Main content -->
    <section class="content">

    <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tambah Pengeluaran Anggaran</h3>
                <div class="pull-right">
                    <a href="action.php" class="btn btn-warning btn-flat">
                    <i class="fa fa-reply"></i> Kembali
                    </a>
                </div>
            </div>  
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="add.php" method="post">
                        <div class="form-group">
            				<label class="control-label" for="count_add"> Banyak Record yang akan ditambah</label>
            				<input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required>
                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" name="generate" value="Generate" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </section>


<?php include_once('../footer.php'); 
?>