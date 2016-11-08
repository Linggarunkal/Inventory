<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


$requestData= $_REQUEST;


$columns = array( 

	0 => 'id_divisi', 
	1 => 'divisi_name'
);


$sql = "SELECT id_divisi, divisi_name ";
$sql.=" FROM divisi_tb";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;


$sql = "SELECT id_divisi, divisi_name ";
$sql.=" FROM divisi_tb WHERE 1=1";
if( !empty($requestData['search']['value']) ) {
	$sql.=" AND ( id_divisi LIKE '".$requestData['search']['value']."%' ";    

	$sql.=" OR divisi_name LIKE '".$requestData['search']['value']."%' )";
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
	$nestedData[] = $row["divisi_name"];
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
