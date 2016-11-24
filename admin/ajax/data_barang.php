<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 24/11/2016
 * Time: 09:59
 */

require('connection.php');
$requestData= $_REQUEST;


$columns = array(

    0 => 'product_name',
    1 => 'condition_barang',
    2 => 'status',
    3 => 'qty',
    4 => 'create_on',
    5 => 'remarks'

);


$sql = "SELECT id_barang ";
$sql.=" FROM v_barang";
$query=mysqli_query($conn, $sql) or die("data_barang: get data barang");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT id_barang, product_name, condition_barang, status, qty, create_on, remarks";
$sql.=" FROM v_barang WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
    $sql.=" AND ( product_name LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR condition_barang LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR status LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR qty LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR create_on LIKE '".$requestData['search']['value']."%' ";

    $sql.=" OR remarks LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("data_barang: get data barang");
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$query=mysqli_query($conn, $sql) or die("data_barang: get data barang");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {
    $nestedData=array();

    $nestedData[] = "<input type='checkbox'  class='deleteRow' value='".$row['id_barang']."'  /> #".$i ;
    $nestedData[] = $row["product_name"];
    $nestedData[] = $row["condition_barang"];
    $nestedData[] = $row["status"];
    $nestedData[] = $row["qty"];
    $nestedData[] = $row["create_on"];
    $nestedData[] = $row["remarks"];
    $nestedData[] = '<button type="button" class="btn btn-default btn-sm center-block" onClick="">Edit</button>';

    $data[] = $nestedData;
    $i++;
}



$json_data = array(
    "draw"            => intval( $requestData['draw'] ),
    "recordsTotal"    => intval( $totalData ),
    "recordsFiltered" => intval( $totalFiltered ),
    "data"            => $data
);

echo json_encode($json_data);