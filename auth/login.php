<?php
require_once "../config/config.php";
if (isset($_SESSION['user'])) {
  echo "<script>window.location='" . base_url() . "';</script>";
} else {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login | MAP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition login-page">

    <div class="login-box">
      <div class="login-logo">
        <b>MAHTI</b> Politeknik POS
      </div>

      <div class="login-box-body">
        <p class="login-box-msg">Login untuk masuk ke dalam aplikasi MAHTI</p>

        <!-- Proses Login -->
        <?php
        if (isset($_POST['login'])) {
          $user = trim(mysqli_real_escape_string($con, $_POST['user']));
          $pass = trim(mysqli_real_escape_string($con, $_POST['pass']));
          $pass = md5($pass);
          $sql_login = mysqli_query($con, "SELECT log.Username as Username, log.level as level, 
													log.unit as unit, log.alamat as alamat, 
													log.nama as namle, ut.nama_unit as nama 
												FROM login log, tb_unit ut 
												WHERE log.unit = ut.kd_unit
												AND log.Username = '$user' AND log.Password = '$pass'") or die(mysqli_error($con));
          $data = mysqli_fetch_array($sql_login);
          if (mysqli_num_rows($sql_login) > 0) {
            $_SESSION['user'] = $data['Username'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['kdunit'] = $data['unit'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['namle'] = $data['namle'];
            $_SESSION['nama'] = $data['nama'];
            if ($_SESSION['user'] == 'admin') {
              echo "<script>window.location='" . base_url() . "';</script>";
            } else {
              echo "<script>window.location='" . base_url() . "/user/index.php';</script>";
            }
          } else { ?>
            <div class="row">
              <div class="col-lg-10 col-lg-offset-1">
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <a href="login.php" class="close" data-dismiss="modal" aria-label="Close">&times;</a>
                  <center><span class="fa fa-times-circle-o" aria-hidden="true"></span>
                    <strong>Login Gagal</strong>
                  </center>
                  <center>Username / Password yang</center>
                  <center> anda masukan salah </center>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>

        <!-- Form Login -->
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input onfocusin="focusFunction(this)" onfocusout="blurFunction(this)" type="text" name="user" class="form-control" placeholder="Username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input onfocusin="focusFunction(this)" onfocusout="blurFunction(this)" type="password" name="pass" class="form-control" placeholder="Password" id="psss" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group" style="float: right;">
            <input type="checkbox" onclick="passFunction()"> Show Password
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- jQuery 3 -->
    <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!--- LOGIN STYLE JS -->
    <script>
      function focusFunction(x) {
        x.style.background = "orange";
      }

      function blurFunction(x) {
        x.style.background = "white";
      }

      function passFunction() {
        var x = document.getElementById("psss");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>


    <!-- Toggle Password 2 -->
    <script>
      const togglePassword2 = document.querySelector('#tglPassword2');
      const password2 = document.querySelector('#password2');

      togglePassword2.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
      });
    </script>


    <!-- Toggle Password 1 -->
    <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
      });
    </script>


  </body>

  </html>

<?php
}
?>