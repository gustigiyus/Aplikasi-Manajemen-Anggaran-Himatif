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
            <li><a href="tambahuser.php" style="letter-spacing: 1px;"><i class="fa fa-users"></i> Tambah Data User</a></li>
         </ol>
    </div>
</div>
            
<!-- Kembali Button & Link -->    
    <div class="pull-right">
        <a href="settinguser.php" class="btn btn-warning btn-xl"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
    </div>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
            	<form role="form" method="post" action="prosesuser.php">

<!-- Username Form -->
                    <label class="control-label" for="user">Username</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <g class="text-success"> <i class="fa fa-user"></i> </g>
                        </span>
                        <input type="text" name="user" class="form-control" id="user" placeholder="Masukan Username" required autofocus>
                    </div>

<!-- Password Form -->
                    <label class="control-label" for="pass">Password</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <g class="text-danger"> <i class="fa fa-key"> </i> </g>
                        </span>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukan Password" required>
                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <g class="text-info"> <i class="fa fa-key"> </i> </g>
                        </span>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Masukan Password Sekali lagi" required>
                    </div>

<!-- Email Form -->
                    <label class="control-label" for="email">Email</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <g class="text-info"> <i class="fa fa-envelope"></i> </g>
                        </span>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" required>
                    </div>

<!-- Level Form -->
                    <label class="control-label" for="level">Level</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <i class="fa fa-users"></i> 
                        </span>
                        <select name="level" id="level" class="form-control" required="">
                            <option value="User">User</option>
                        </select>
                    </div>

<!-- Unit Form -->
                    <label class="control-label" for="unit">Unit</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <g class="text-info"> <i class="fa fa-pinterest"></i> </g>
                        </span>
                        <select class="form-control" name="unit" id="unit">
                                <?php
                                    $unit = mysqli_query($con, "SELECT * FROM tb_unit") or die (mysqli_error($conn));
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

<!-- Status Form -->
                    <label class="control-label" for="status">Status</label>
                    <div class="form-group input-group">
                        <span class="input-group-addon" class="btn btn-success">
                        <i class="fa fa-user-md"></i> 
                        </span>
                        <select name="status" id="status" class="form-control" required="">
                            <option value="A">Active</option>
                        </select>
                    </div>

<!-- Button Simpan -->
                    <div class="pull-right">
                        <button type="submit" name="add" class="btn btn-success" value="Tambah">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

<?php include_once('../footer.php'); 
?>