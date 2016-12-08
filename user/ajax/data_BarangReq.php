<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 07/12/2016
 * Time: 17:08
 */
require('connection.php');
$requestData= $_REQUEST;


$columns = array(

    0 => 'product_name',
    1 => 'qty'

);


$sql = "SELECT id_temp, product_name, qty ";
$sql.=" FROM v_temp_detbarang";
$query=mysqli_query($conn, $sql) or die("error Get data");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

/*$sql = "SELECT product_name, qty ";
$sql.=" FROM v_temp_detbarang WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
    $sql.=" AND ( product_name LIKE '".$requestData['search']['value']."%' ";

    $sql.=" OR qty LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("data_user: get data user");
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$query=mysqli_query($conn, $sql) or die("Error Get data");*/

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {
    $nestedData=array();

    $nestedData[] = $i ;
    $nestedData[] = $row["product_name"];
    $nestedData[] = $row["qty"];
    $nestedData[] = "<input type='checkbox'  class='deleteRow' value='".$row['id_temp']."'  />";

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

?>
