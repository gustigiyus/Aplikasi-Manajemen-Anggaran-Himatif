<?php
// Session Start
session_start();


// Koneksi
$con = mysqli_connect('localhost', 'root', '', 'db_proyek');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
} 

// Link Koneksi ke Halaman Utama Dahsboard
function base_url($url = null) {
	$base_url = "http://localhost/baru";
	if($url != null) {
		return $base_url."/".$url;	
	} else {
		return $base_url;
	}
}
?>