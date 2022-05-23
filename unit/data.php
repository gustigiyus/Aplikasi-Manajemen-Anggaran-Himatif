<?php 
include_once('../header.php'); 
?>

<section class="content-header">
      <h1>
        DATA Divisi
        <small>Kelola Data Divisi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../dashboard/index.php"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Divisi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tabel Data Divisi</h3>
                <div class="pull-right">
                  <a href="" class="btn btn-default btn-xl"><i class="fa fa-refresh"></i></a>
                    <a href="add.php" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                    </a>
                </div>
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
                          <th><center>Kode Unit</center></th>
                          <th><center>Nama Divisi</center></th>
                          <th><center>Action</center></th>
                        </tr>
                    </thead>
<!-- Table Body --> 
                    <tbody>
                <?php
                $sql_unit = mysqli_query($con, $query) or die (mysqli_error($con));
                if (mysqli_num_rows($sql_unit) > 0) {
                  while ($data = mysqli_fetch_array($sql_unit)) { ?>
                    <tr>
                      <td align="center"><?=$data['kd_unit']?></td>
                      <td align="center"><?=$data['nama_unit']?></td>
                      <td class="text-center">
                        <a href="edit.php?id=<?=$data['kd_unit']?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                        <a href="del.php?id=<?=$data['nama_unit']?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                    <?php 
                      } }?>
                    </tbody>
                </table>
            </div> 
        </div>
    </section>


<?php include_once('../footer.php'); 
?>