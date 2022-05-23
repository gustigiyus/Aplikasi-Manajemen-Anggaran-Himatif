<?php
require_once "../config/config.php";

mysqli_query($con, "DELETE FROM pesan WHERE id = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='pesan_terkirim.php';</script>"; 	

 ?>