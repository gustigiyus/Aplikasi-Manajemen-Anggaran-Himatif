<?php

$connect = new PDO("mysql:host=localhost;dbname=db_proyek", "root", "");

$column = array('id_rencana_pem', 'keterangan', 'jumlah',  'harga', 'total', 'status_pem');

$query = 'SELECT * FROM tb_pemasukan
WHERE id_rencana_pem LIKE "%'.$_POST["search"]["value"].'%" 
OR keterangan LIKE "%'.$_POST["search"]["value"].'%" 
OR jumlah LIKE "%'.$_POST["search"]["value"].'%" 
OR harga LIKE "%'.$_POST["search"]["value"].'%" 
OR total LIKE "%'.$_POST["search"]["value"].'%"  
OR status_pem LIKE "%'.$_POST["search"]["value"].'%"  
';

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id_keterangan DESC';
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

$total_order = 0;

foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row["id_rencana_pem"];
    $sub_array[] = $row["keterangan"];
    $sub_array[] = $row["jumlah"];
    $sub_array[] = array(('Rp ').number_format($row["harga"]));
    $sub_array[] = array(('Rp ').number_format($row["total"]));
    $sub_array[] = $row["status_pem"];
    $total_order = $total_order + floatval($row["total"]);
    
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tb_pemasukan";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'              =>  intval($_POST["draw"]),
    'recordsTotal'      =>  count_all_data($connect),
    'recordsFiltered'   =>  $number_filter_row,
    'data'              =>  $data,
    'total'             =>  array(('Rp ').number_format($total_order))
);

echo json_encode($output);

?>