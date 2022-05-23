<?php
require_once "config/config.php";
if(isset($_SESSION['user'])) {
	if ($_SESSION['level'] == 'Admin') {
  		echo "<script>window.location='".base_url('dashboard')."';</script>";
	} elseif ($_SESSION['level'] == 'User') {
  		echo "<script>window.location='".base_url('user/dashboard')."';</script>";
	} 
} else {
  echo "<script>window.location='".base_url('auth/login.php')."';</script>";
}
?> 