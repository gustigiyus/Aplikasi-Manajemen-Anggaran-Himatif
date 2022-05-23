<?php
$con = mysqli_connect("localhost", "root", "", "db_proyek");
if(!$con){
  echo "Koneksi Database error".mysqli_error($con);
}

$sql = "SELECT * From tb_penyelesaian";

$result = mysqli_query($con, $sql);

$fetchdata = array('data' =>array());

while ($row = mysqli_fetch_array($result)) {

     // Update Button
     $edit_penye = "<a href='edit.php?id=".$row['id_rencana_penye']."' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i> Edit</a>";

     // Delete Button
     $delete_penye = "<a href='del.php?id=".$row['id_penyelesaian']."' onclick='hapus()' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Hapus</a>";

     $action = $edit_penye." ".$delete_penye;


  $fetchdata ['data'][] = array(
    'ID_Penyelesaian' => $row['id_penyelesaian'],
    'idrenc' => $row['id_rencana_penye'],
    'NmAkt' => $row['nama_aktivitas'],
    'dn_pem' => array(('Rp ').number_format($row['dana_pemasukan'])),
    'dn_kel' => array(('Rp ').number_format($row['dana_pengeluaran'])),
    'slsh' => array(('Rp ').number_format($row['selisih'])),
    'nt1' => $row['nota_1'],
    'nt2' => $row['nota_2'],
    'nt3' => $row['nota_3'],
    'nt4' => $row['nota_4'],
    'nt5' => $row['nota_5'],
    'ket' => $row['keterangan'],
    'sts' => $row['status'],
    "actionedit" => $action,
  );
}

echo json_encode($fetchdata);

?>
