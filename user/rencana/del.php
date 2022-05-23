 <?php
 require_once "../config/config.php";

 mysqli_query($con, "DELETE a.*, b.* FROM tb_rencana a JOIN tb_rincian_dana b ON a.id_rencana = b.id_rencanaDana WHERE a.id_rencana = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='data.php';</script>"; 	
 ?>

