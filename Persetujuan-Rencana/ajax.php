<?php
$con = mysqli_connect("localhost", "root", "", "db_proyek");
if(!$con){
  echo "Koneksi Database error".mysqli_error($con);
}

$sql = "SELECT id_rencana,nama_aktivitas,tahun_anggaran,uraian_aktivitas,jenis_anggaran,pelaksanaan,tempat,status,uraian_pubdok,totda_pubdok,uraian_transportasi,totda_transportasi,uraian_konsumsi,totda_konsumsi,uraian_medik,totda_medik,uraian_lainnya,totda_lainnya,total_semuaBiaya FROM tb_rencana INNER JOIN tb_rincian_dana ON tb_rincian_dana.id_rencanaDana=tb_rencana.id_rencana";

$result = mysqli_query($con, $sql);

$fetchdata = array('data' =>array());

while ($row = mysqli_fetch_array($result)) {

     // Update Button
     $EditButton = "<a href='edit.php?id=".$row['id_rencana']."' class='btn btn-warning btn-xs'><i class='glyphicon glyphicon-pencil'></i> Edit</a>";

     $action = $EditButton;


  $fetchdata ['data'][] = array(
    'ID' => $row['id_rencana'],
    'NmAkt' => $row['nama_aktivitas'],
    'ThnAng' => $row['tahun_anggaran'],
    'UrnAkt' => $row['uraian_aktivitas'],
    'JnsAng' => $row['jenis_anggaran'],
    'Plks' => $row['pelaksanaan'],
    'Tmp' => $row['tempat'],
    'Sts' => $row['status'],
    "action" => $action,
    'UrPub' => $row['uraian_pubdok'],
    'TotPub' => $row['totda_pubdok'],
    'UrTran' => $row['uraian_transportasi'],
    'TotTran' => $row['totda_transportasi'],
    'UrKons' => $row['uraian_konsumsi'],
    'TotKons' => $row['totda_konsumsi'],
    'UrMed' => $row['uraian_medik'],
    'TotMed' => $row['totda_medik'],
    'UrDll' => $row['uraian_lainnya'],
    'TotDll' => $row['totda_lainnya'],
    'TotAll' => $row['total_semuaBiaya']
  );
}

echo json_encode($fetchdata);

?>
