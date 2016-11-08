<?php

// Connection database
include("connection.php");

if(isset($_POST['id_divisi']) && isset($_POST['id_divisi']) != ""){

	$divisi_id = $_POST['id_divisi'];

	// get user id 
	$query = "select * from divisi_tb where id_divisi = '$divisi_id'";

	$result = $conn->query($query);

	if(!$result){
		die("connection timeout". $conn->mysqli_error);
	}
	$response = array();
	if($result->num_rows > 0){
		while ($row=$result->fetch_assoc()){
			$response = $row;
		}
	}else{
		$response['status'] = 200;
		$response['message'] = "data not found";
	}
	echo json_encode($response);
}else{
	$response['status'] = 200;
	$response['message'] = "invalid response";
}

?>