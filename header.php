<!-- Konek Ke Database dan localhost (Login) -->
      <?php 
      require_once "config/config.php";
      if(!isset($_SESSION['user'])) {
        echo "<script>window.location='".base_url('auth/login.php')."';</script>";
      } ?>

<?php
function facebook_time_ago($timestamp){  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60);        // value 60 is seconds  
      $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
      $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
      $weeks        = round($seconds / 604800);     // 7*24*60*60;  
      $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
      $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60) {  
       return "Baru Saja";  
      } else if($minutes <=60) {  
       if($minutes==1){  
         return "Satu Menit Yang Lalu";  
       }else {  
         return "$minutes Menit Yang Lalu";  
       }  
      } else if($hours <=24) {  
       if($hours==1) {  
         return "1 Jam Yang Lalu";  
       } else {  
         return "$hours Jam Yang Lalu";  
       }  
      }else if($days <= 7) {  
       if($days==1) {  
         return "Kemarin";  
       }else {  
         return "$days Hari Yang Lalu";  
       }  
      }else if($weeks <= 4.3) {  //4.3 == 52/12
       if($weeks==1){  
         return "1 Minggu Yang Lalu";  
       }else {  
         return "$weeks Minggu Yang Lalu";  
       }  
      } else if($months <=12){  
       if($months==1){  
         return "1 Bulan Yang Lalu";  
       }else{  
         return "$months Bulan Yang Lalu";  
       }  
      }else {  
       if($years==1){  
         return "1 Tahun Yang Lalu";  
       }else {  
         return "$years Tahun Yang Lalu";  
       }  
      }  
 }  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MAHTI | Management Anggaran Teknik Informatika</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../assets/bower_components/buttons/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>MAH</b></span>
      <span class="logo-lg"><b>MAHTI</b></span>
    </a>
   
    <nav class="navbar navbar-static-top">
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


 <!-- NOTIFIKASI PENYELESAIAN ANGGARAN -->
 <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-briefcase"></i>
              <span class="label label-warning">
              <?php 
                $users = mysqli_query($con, "SELECT * FROM tb_penyelesaian WHERE status = 'Pending'") or die (mysqli_error($con));
                echo mysqli_num_rows($users); 
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="font-weight: bold;"><?php echo mysqli_num_rows($users);?> Penyelesaian yang belum di Setujui</li>            
              <li>
                <ul class="menu">
                <?php
                  $users = mysqli_query($con, "SELECT * FROM tb_penyelesaian WHERE status = 'Pending'") or die (mysqli_error($con)); 
                    if (mysqli_num_rows($users) > 0) {
                      while ($data = mysqli_fetch_array($users)) { ?>
                  <li>
                    <a href="../Persetujuan-Penyelesaian/edit.php?id=<?=$data['id_rencana_penye']?>">
                      <h3>
                          <?php
                            echo "<b>".$data['nama_aktivitas']."</b>";
                          ?>
                        <small class="pull-right">ID Penyelesaian <?=$data['id_penyelesaian']?></small>
                      </h3>
                      <h3>
                          <?php
                             echo "Pemasukan = Rp. ".number_format($data['dana_pemasukan']);
                          ?>
                      </h3>
                      <h3>
                          <?php
                             echo "Pengeluaran = Rp. ".number_format($data['dana_pengeluaran']);
                          ?>
                      </h3>
                    </a>
                  </li>
                <?php } } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Lihat Semua tasks</a>
              </li>
            </ul>
          </li>

          <!-- NOTIFIKASI PENGELUARAN ANGGARAN -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-fax"></i>
              <span class="label label-primary">
              <?php 
                $users = mysqli_query($con, "SELECT * FROM tb_pengeluaran WHERE status_kel = 'Diajukan'") or die (mysqli_error($con));
                echo mysqli_num_rows($users); 
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="font-weight: bold;"><?php echo mysqli_num_rows($users);?> Anggaran Pengeluaran belum di Setujui</li>
              <li>
                <ul class="menu">
                <?php
                  $users = mysqli_query($con, "SELECT nama_aktivitas, id_rencana, id_rencana_kel, status_kel, id_pengeluaran, jenis_pengeluaran, total_kel FROM tb_rencana INNER JOIN tb_pengeluaran ON tb_pengeluaran.id_rencana_kel=tb_rencana.id_rencana WHERE status_kel = 'Diajukan'") or die (mysqli_error($con)); 
                    if (mysqli_num_rows($users) > 0) {
                      while ($data = mysqli_fetch_array($users)) { ?>
                  <li>
                    <a href="../pengajuan_pengeluaran/action.php?id=<?=$data['id_rencana_kel']?>">
                      <h3>
                          <?php
                            echo "<b>Anggaran ".$data['jenis_pengeluaran']."</b>";
                          ?>
                      </h3>
                      <small class="pull-right">ID Rencana <?=$data['id_rencana_kel']?></small>
                      <h3>
                          <?php
                             echo "Rp. ".number_format($data['total_kel']);
                          ?>
                      </h3>
                    </a>
                  </li>
                <?php } } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Lihat Semua tasks</a>
              </li>
            </ul>
          </li>


          <!-- NOTIFIKASI PEMASUKAN ANGGARAN -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-line-chart"></i>
              <span class="label label-success">
              <?php 
                $users = mysqli_query($con, "SELECT * FROM tb_pemasukan WHERE status_pem = 'Diajukan'") or die (mysqli_error($con));
                echo mysqli_num_rows($users); 
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="font-weight: bold;"><?php echo mysqli_num_rows($users);?> Anggaran Pemasukan belum di Setujui</li>
              <li>
                <ul class="menu">
                <?php
                  $users = mysqli_query($con, "SELECT nama_aktivitas, id_rencana, id_rencana_pem, keterangan, status_pem, total FROM tb_rencana INNER JOIN tb_pemasukan ON tb_pemasukan.id_rencana_pem=tb_rencana.id_rencana WHERE status_pem = 'Diajukan'") or die (mysqli_error($con)); 
                    if (mysqli_num_rows($users) > 0) {
                      while ($data = mysqli_fetch_array($users)) { ?>
                  <li>
                    <a href="../pengajuan_pemasukan/action.php?id=<?=$data['id_rencana_pem']?>">
                      <h3>
                          <?php
                            echo "<b>Anggaran ".$data['keterangan']."</b>";
                          ?>
                      </h3>
                      <small class="pull-right">ID Rencana <?=$data['id_rencana_pem']?></small>
                      <h3>
                          <?php
                            echo "Rp. ".number_format($data['total']);
                          ?>
                      </h3>
                    </a>
                  </li>
                <?php } } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Lihat Semua tasks</a>
              </li>
            </ul>
          </li>


          <!-- NOTIFIKASI PENGAJUAN RENCANA -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-calendar-o"></i>
              <span class="label label-info">
              <?php 
                $users = mysqli_query($con, "SELECT * FROM tb_rencana WHERE status = 'Diajukan'") or die (mysqli_error($con));
                echo mysqli_num_rows($users); 
              ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" style="font-weight: bold;"><?php echo mysqli_num_rows($users);?> Rencana yang belum di Setujui</li>
              <li>
                <ul class="menu">
                <?php
                  $users = mysqli_query($con, "SELECT * FROM tb_rencana WHERE status = 'Diajukan'") or die (mysqli_error($con)); 
                    if (mysqli_num_rows($users) > 0) {
                      while ($data = mysqli_fetch_array($users)) { ?>
                  <li>
                    <a href="../Persetujuan-Rencana/edit.php?id=<?=$data['id_rencana']?>">
                      <h3>
                          <?php
                             echo "<b>".$data['nama_aktivitas']."</b>";
                          ?>
                      </h3>
                      <small class="pull-right">ID Rencana <?=$data['id_rencana']?></small>
                      <h3>
                          <?php
                            echo "Dana ".$data['jenis_anggaran'];
                          ?>
                      </h3>
                    </a>
                  </li>
                <?php } } ?>
                </ul>
              </li>
              <li class="footer">
                <a href="#">Lihat Semua tasks</a>
              </li>
            </ul>
          </li>


          <!-- User Account -->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../gambar/icons/admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../gambar/icons/admin.jpg" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['namle']; ?>
                  <small><?php echo $_SESSION['alamat']; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../Setting/settinguser.php" class="btn btn-default btn-flat">Setting User</a>
                </div>
                <div class="pull-right">
                  <a href="../auth/logout.php" class="btn btn-default bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../gambar/icons/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['namle']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Admin/Prodi</a>
        </div>
      </div>
      <br>
      <!-- sidebar menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?=base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
<!--
          <li>
          <a href="<?=base_url('unit/data.php')?>">
            <i class="fa fa-group"></i> <span>Divisi</span>
          </a>
        </li>
-->
        <li>
          <a href="<?=base_url('Persetujuan-Rencana/data.php')?>">
            <i class="fa fa-calendar-o"></i> <span>Persetujuan Rencana</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fax"></i> <span>Persetujuan Anggaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('pengajuan_pemasukan/data.php')?>"><i class="fa fa-hand-o-right"></i> Anggaran Pemasukan</a></li>
            <li><a href="<?=base_url('pengajuan_pengeluaran/data.php')?>"><i class="fa fa-hand-o-right"></i> Anggaran Pengeluaran</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=base_url('Persetujuan-Penyelesaian/data.php')?>">
            <i class="fa fa-briefcase"></i> <span>Persetujuan Penyelesaian</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('laporan/laporan_rencana.php')?>"><i class="fa fa-calendar-o"></i> Laporan Pengajuan Rencana</a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-fax"></i> <span>Laporan Anggaran</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url('laporan/laporan_pemasukan.php')?>"><i class="fa fa-circle-o"></i> Laporan Pemasukan</a></li>
                <li><a href="<?=base_url('laporan/laporan_pengeluaran.php')?>"><i class="fa fa-circle-o"></i> Laporan Pengeluaran</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?=base_url('inbox/kotak_masuk.php')?>">
            <i class="fa fa-wechat"></i> <span>Kotak Pesan</span>
            <small class="label pull-right bg-blue">
              <?php 
                $nama = $_SESSION['namle'];
                $notif_terkirim = mysqli_query($con, "SELECT * FROM pesan WHERE nama_pengirim = '$nama'") or die (mysqli_error($con));
              ?>
              <?= mysqli_num_rows($notif_terkirim); ?> 
            </small>
            <small class="label pull-right bg-red">
              <?php 
                $nama = $_SESSION['namle'];
                $kotak_masuk = mysqli_query($con, "SELECT * FROM pesan WHERE nama_penerima = '$nama'") or die (mysqli_error($con));
              ?>
              <?= mysqli_num_rows($kotak_masuk); ?> 
            </small>
          </a>
        </li>
          <li class="header">SETTINGS</li>
          <li> <a href="../Setting/settinguser.php"> <i class="fa fa-user"></i> <span>Akun</span> </a> </li>
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">

