<?php

$connect = new PDO("mysql:host=localhost;dbname=db_proyek", "root", "");

$column = array('id_rencana_kel', 'jenis_pengeluaran', 'keterangan_kel',  'jumlah_unit', 'harga_satuan', 'total_kel', 'status_kel');

$query = 'SELECT * FROM tb_pengeluaran
WHERE id_rencana_kel LIKE "%'.$_POST["search"]["value"].'%" 
OR jenis_pengeluaran LIKE "%'.$_POST["search"]["value"].'%" 
OR keterangan_kel LIKE "%'.$_POST["search"]["value"].'%" 
OR jumlah_unit LIKE "%'.$_POST["search"]["value"].'%" 
OR harga_satuan LIKE "%'.$_POST["search"]["value"].'%"  
OR total_kel LIKE "%'.$_POST["search"]["value"].'%"  
OR status_kel LIKE "%'.$_POST["search"]["value"].'%"  
';

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id_pengeluaran DESC';
}

$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_pengeluaran = 0;

foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row["id_rencana_kel"];
    $sub_array[] = $row["jenis_pengeluaran"];
    $sub_array[] = $row["keterangan_kel"];
    $sub_array[] = $row["jumlah_unit"];
    $sub_array[] = array(('Rp ').number_format($row["harga_satuan"]));
    $sub_array[] = array(('Rp ').number_format($row["total_kel"]));
    $sub_array[] = $row["status_kel"];

    $total_pengeluaran = $total_pengeluaran + floatval($row["total_kel"]);
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tb_pengeluaran";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'              =>  intval($_POST["draw"]),
    'recordsTotal'      =>  count_all_data($connect),
    'recordsFiltered'   =>  $number_filter_row,
    'data'              =>  $data,
    'total'             =>  array(('Rp ').number_format($total_pengeluaran))
);

echo json_encode($output);

?>