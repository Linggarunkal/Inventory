<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


$requestData= $_REQUEST;


$columns = array( 

	0 => 'name', 
	1 => 'username',
	2 => 'email',
	3 => 'divisi_name',
	4 => 'role_level',
	5 => 'manager'
);


$sql = "SELECT name, username, email, divisi_name, role_level, manager ";
$sql.=" FROM v_user";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;


$sql = "SELECT name, username, email, divisi_name, role_level, manager ";
$sql.=" FROM v_user WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
	$sql.=" AND ( name LIKE '".$requestData['search']['value']."%' ";    

	$sql.=" OR username LIKE '".$requestData['search']['value']."%' )";
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
	$nestedData[] = $row["name"];
	$nestedData[] = $row["username"];
	$nestedData[] = $row["email"];
	$nestedData[] = $row["divisi_name"];
	$nestedData[] = $row["role_level"];
	$nestedData[] = $row["manager"];
	$nestedData[] = '<button type="button" class="btn btn-default btn-sm center-block" onClick="getDetailDivisi(\''.$row['id_divisi'].'\')">Edit</button>';
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

?>