<?php
	
	// connection String to database
	include('connection.php');

	if(isset($_POST)){
		$id_divisi = $_POST['id_divisi'];
		$divisi_name = $_POST['divisi_name'];

		$query = "update divisi_tb set divisi_name = '$divisi_name' where id_divisi = '$id_divisi'";

		$result = $conn->query($query);
		if(!$result){
			die("Connection Timeout". $conn->mysqli_error);
		}
	}

?>