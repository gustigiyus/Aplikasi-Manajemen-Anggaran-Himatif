 <?php
 require_once "../config/config.php";

 mysqli_query($con, "DELETE FROM login WHERE unit = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='settinguser.php';</script>"; 	
 ?>