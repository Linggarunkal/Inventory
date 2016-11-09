<?php

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
*/

require('connection.php');
$requestData= $_REQUEST;


$columns = array( 

	0 => 'id_user', 
	1 => 'fname',
	2 => 'lname',
	3 => 'username',
	4 => 'password',
	5 => 'id_divisi',
	6 => 'id_level',
	7 => 'id_manager',
	8 => 'email'
);


$sql = "SELECT * ";
$sql.=" FROM user_tb";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;


$sql = "SELECT * ";
$sql.=" FROM user_tb WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
	$sql.=" AND ( id_user LIKE '".$requestData['search']['value']."%' ";    

	$sql.=" OR  fname LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR  lname LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR  username LIKE '".$requestData['search']['value']."%' ";    

	$sql.=" OR  password LIKE '".$requestData['search']['value']."%' ";    

	$sql.=" OR id_divisi LIKE '".$requestData['search']['value']."%' )";

	$sql.=" OR id_level LIKE '".$requestData['search']['value']."%' )";

	$sql.=" OR id_manager LIKE '".$requestData['search']['value']."%' )";

	$sql.=" OR email LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
$number = 1;
while( $row=mysqli_fetch_array($query) ) {  
	$nestedData=array(); 

	$nestedData[] = "<input type='checkbox'  class='deleteRow' value='".$row['id_divisi']."'  /> #".$number;
	$nestedData[] = $row["fname"];
	$nestedData[] = $row["lname"];
	$nestedData[] = $row["username"];
	$nestedData[] = $row["password"];
	$nestedData[] = $row["id_divisi"];
	$nestedData[] = $row["id_level"];
	$nestedData[] = $row["id_manager"];
	$nestedData[] = $row["email"];
	$nestedData[] = '<button type="button" class="btn btn-default btn-sm center-block" onClick="">Edit</button>';
	$data[] = $nestedData;
	$number++;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data   
			);

echo json_encode($json_data); 


/*
QUERY for display Datatables
select concat(user_tb.fname, " ", user_tb.lname) as name, user_tb.username, divisi_tb.divisi_name, level_tb.role_level, coalesce(d.fname, "-") as Manager, user_tb.email 
from user_tb
inner join divisi_tb
on user_tb.id_divisi = divisi_tb.id_divisi
inner join level_tb
on user_tb.id_level = level_tb.id_level
left join user_tb d
on user_tb.id_manager = d.id_user
;
*/

?>
