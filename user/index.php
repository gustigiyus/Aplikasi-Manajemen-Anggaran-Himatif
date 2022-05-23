<?php
require_once "config/config.php";
if(isset($_SESSION['user'])) {
  echo "<script>window.location='".base_url('user/dashboard')."';</script>";
} else {
  echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?> 