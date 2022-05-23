<?php 
include_once('../header.php'); 
?>

<div class="row">
      <div class="col-lg-12">
        <center><h1>Setting Data User </h1></center>
        <br>
          <ol class="breadcrumb">
            <li><a href="../dashboard/index.php" style="letter-spacing: 1px;"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="settinguser.php" style="letter-spacing: 1px;"><i class="fa fa-cog"></i> Setting User</a></li>
            <li><a href="edit.php" style="letter-spacing: 1px;"><i class="fa fa-users"></i> Edit Data User</a></li>
         </ol>
    </div>
</div>
<br>

          <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Edit data akun</h3>
              </div>

<!-- Form edit -->
              <div class="panel-body">

                  <?php
                    $id = @$_GET['id'];
                    $sql_unit = mysqli_query($con, "SELECT * FROM login WHERE Username = '$id'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_unit);
                  ?>
                <form role="form" method="post" action="prosesuser.php">
<!-- Username Form -->

                  <input type="hidden" name="id" value="<?=$data['Username']?>">
                  <label class="control-label" for="username">Username</label>
                  <div class="form-group input-group">
                    <span class="input-group-addon" class="btn btn-success">
                      <g class="text-success"> <i class="fa fa-user"></i> </g>
                    </span>
                    <input type="text" name="user" class="form-control" id="username" placeholder="Masukan Username Baru">
                  </div>
<!-- Password Form -->
                  <label class="control-label" for="password">Password</label>
                  <div class="form-group input-group">
                    <span class="input-group-addon" class="btn btn-success">
                      <g class="text-danger"> <i class="fa fa-key"> </i> </g>
                    </span>
                    <input type="text" name="pass" class="form-control" id="password" placeholder="Masukan Password Baru">
                  </div>

                  <div class="form-group input-group">
                    <span class="input-group-addon" class="btn btn-success">
                      <g class="text-danger"> <i class="fa fa-key"> </i> </g>
                    </span>
                    <input type="text" name="pass" class="form-control" placeholder="Masukan Password Baru sekali lagi">
                  </div>
<!-- Button Simpan -->
                  <div class="pull-right">
                    <button type="submit" name="simpan" class="btn btn-success" value="Simpan">Simpan</button>
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