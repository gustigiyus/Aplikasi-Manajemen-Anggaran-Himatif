<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        RESET PASSWORD USER
        <small>Kelola Data User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

<br>

          <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Reset password akun</h3>
              </div>

<!-- Form edit -->
              <div class="panel-body">
               
                  <?php
                    $id = $_GET['id'];
                    $sql_unit = mysqli_query($con, "SELECT * FROM login WHERE Username = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_unit); ?>

                <h4>Apakah anda yakin ingin mereset Password user dengan ID <?php echo $_GET['id'];?> ?</h4>
                <br>

                <form role="form" action="prosesuser.php?id=<?PHP echo $id;  ?>" method="post">

<!-- Input Password -->
                  <label class="control-label" for="pass"></label>
                  <input type="hidden" name="id" id="pass">
                  <input type="hidden" name="pass" id="pass">
                  <div class="pull-right">
                    <button type="submit" name="reset" class="btn btn-success" value="Simpan">Reset</button>
                  </div>
<!-- Kembali Button & Link -->    
                  <div class="pull-right">
                    <a href="settinguser.php" class="btn btn-warning btn-xl" style="margin-right: 4px;"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                  </div> 
                </form>
              </div>
<!-- akhir Form edit -->

            </div>
          </div> 

<?php include_once('../footer.php'); 
?>