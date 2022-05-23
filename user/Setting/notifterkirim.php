<?php 
include_once('../header.php'); 
?>

<section class="content-header">
  
      <h1>
        Setting User
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Setting User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Data Akun</h3>
            </div>
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../gambar/icons/himatif.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION['namle'] ?></h3>

              <p class="text-muted text-center">Bagian Bendahara</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Pemasukan</b> 
                  <a class="pull-right">
                    <?php 
                      $users = mysqli_query($con, "SELECT SUM(total) AS ttl 
                      FROM `tb_pemasukan`") or die (mysqli_error($con));
                      if (mysqli_num_rows($users) > 0) {
                        while ($data = mysqli_fetch_array($users)) { 
                        echo "Rp ".number_format($data['ttl']);
                      } }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Total pengeluaran</b> 
                  <a class="pull-right">
                    <?php 
                      $users = mysqli_query($con, "SELECT SUM(total) AS ttl 
                      FROM `tb_pengeluaran`") or die (mysqli_error($con));
                      if (mysqli_num_rows($users) > 0) {
                        while ($data = mysqli_fetch_array($users)) { 
                        echo "Rp ".number_format($data['ttl']);
                      } }
                    ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Total Pengajuan Rencana</b> 
                  <a class="pull-right">
                    <?php 
                      $users = mysqli_query($con, "SELECT * FROM tb_rencana") or die (mysqli_error($con));
                      echo mysqli_num_rows($users); 
                    ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#setting" data-toggle="tab">Settings</a></li>
              <li><a href="#setinguser" data-toggle="tab">Setting Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="setting">
                <form class="form-horizontal"  method="get">
                <?php  
                    $sql = "SELECT * FROM login Where Username = '$_SESSION[user]'";
                    $query = $sql;   
                    $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                    if (mysqli_num_rows($sql_unit) > 0) {
                      while ($data = mysqli_fetch_array($sql_unit)) { ?>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama lengkap</label>
                    <div class="col-sm-10">
                      <input disabled type="text" class="form-control" value="<?=$data['nama']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input disabled type="text" class="form-control" value="<?=$data['Username']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input disabled type="text" class="form-control" value="<?=$data['Password']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                      <textarea disabled class="form-control"><?=$data['alamat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input disabled type="email" class="form-control" value="<?=$data['email']?>">
                    </div>
                  </div>
                  <?php  } }?>
                </form>        
              </div>
              <!-- /.tab-pane -->

              
              <div class="tab-pane" id="setinguser">
              <?php
                    $sql_unit = mysqli_query($con, "SELECT * FROM login WHERE Username = '$_SESSION[user]'") or die (mysqli_error($con));
                    $data = mysqli_fetch_array($sql_unit);
                  ?>
                <form class="form-horizontal" action="prosesedit.php" method="post">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-offset-1 col-sm-9 input-group">
                      <input type="password" id="password" name="pass" class="form-control" placeholder="Masukan password Baru" required>
                      <div class="input-group-addon">
                        <i style="cursor: pointer;" class="fa fa-eye" id="togglePassword"></i>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Pass Confirm</label>
                    <div class="col-sm-offset-1 col-sm-9 input-group">
                      <input type="password" id="password2" name="pass" class="form-control" placeholder="Masukan password Baru" required>
                      <div class="input-group-addon">
                        <i style="cursor: pointer;" class="fa fa-eye" id="tglPassword2"></i>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-offset-2 col-sm-9">
                      <button style="margin-left: -15px;" type="submit" name="simpan" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Simpan</button>
                    </div>
                  </div>
                </form>        
              </div>
              <!-- /.tab-pane -->



            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

          <div class="row">
              <div class="col-lg-12 col-lg-offset-0"> 
                <div class="alert alert-success alert-dismissable" role="alert">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>   
                  <center><span class="fa fa-key" aria-hidden="true"></span>
                  <strong>Password Anda Telah berhasil diubah</strong> 
                </div>
              </div>
            </div><br>


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
</section>



<?php include_once('../footer.php'); 
?>