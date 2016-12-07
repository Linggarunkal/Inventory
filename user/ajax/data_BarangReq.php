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

    0 => '',
    1 => 'username',
    2 => 'email',
    3 => 'divisi_name',
    4 => 'role_level',
    5 => 'Manager'

);


$sql = "SELECT id_user ";
$sql.=" FROM v_user";
$query=mysqli_query($conn, $sql) or die("data_user: get data user");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "SELECT id_user, name , username, email, divisi_name, role_level, Manager ";
$sql.=" FROM v_user WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
    $sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR divisi_name LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR role_level LIKE '".$requestData['search']['value']."%' ";

    $sql.=" OR Manager LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("data_user: get data user");
$totalFiltered = mysqli_num_rows($query);
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$query=mysqli_query($conn, $sql) or die("data_user: get data user");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {
    $nestedData=array();

    $nestedData[] = "<input type='checkbox'  class='deleteRow' value='".$row['id_user']."'  /> #".$i ;
    $nestedData[] = $row["name"];
    $nestedData[] = $row["username"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["divisi_name"];
    $nestedData[] = $row["role_level"];
    $nestedData[] = $row["Manager"];
    $nestedData[] = '<button type="button" class="btn btn-default btn-sm center-block" onClick="getDetailUser(\''.$row['id_user'].'\')">Edit</button>';

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
