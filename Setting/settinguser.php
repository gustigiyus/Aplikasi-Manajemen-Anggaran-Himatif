<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        DATA AKUN USER
        <small>Kelola Data Akun User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Akun User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tabel Data Akun User</h3>
            </div>    
 
              <?php
                $sql = "SELECT * FROM tb_unit";
                $query = $sql;
                $queryjml = $sql;
                ?>
            <div class="box-body table-responsive">
                <table id="unit" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>Username</center></th>
                            <th><center>Password</center></th>
                            <th><center>Level</center></th>
                            <th><center>Email</center></th>
                            <th><center>Unit</center></th>
                            <th><center>Status</center></th>
                            <th><center><i class="fa fa-cog"></i> Opsi</center></th>
                        </tr>
                    </thead>
<!-- Table Body --> 
                    <tbody>
                  <?php  
                  $sql = "SELECT * FROM login Where level = 'user' ";
                  $query = $sql;   
                  $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                  if (mysqli_num_rows($sql_unit) > 0) {
                  while ($data = mysqli_fetch_array($sql_unit)) { ?>
                    <tr>
                      <td align="center" width="10%"><?=$data['Username']?></td>  
                      <td align="center"><?=$data['Password']?></td>
                      <td align="center"><?=$data['level']?></td>
                      <td align="center"><?=$data['email']?></td>
                      <td align="center"><?=$data['unit']?></td>
                      <td align="center"><?=$data['status']?></td>
                      <td align="center" style="vertical-align: middle;">
                          <a  href="reset.php?id=<?=$data['unit']?>" onclick="return confirm('Apakah Anda Yakin Ingin reset Password')" class="btn btn-warning btn-xs"><i class="fa fa-refresh"> Reset Password</i></a>  
                          <a  href="deluser.php?id=<?=$data['unit']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data User')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> Hapus User</i></a>
                      </td>
                    </tr>
                    <?php  } }?>
                    </tbody>
                </table>
            </div> 
        </div>
    </section>



<?php include_once('../footer.php'); 
?>