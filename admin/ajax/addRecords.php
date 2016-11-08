<?php
if(isset($_POST['divisi_name'])){
	include("connection.php");

	$divisi_name = $_POST['divisi_name'];

	$query = "insert into divisi_tb (divisi_name) values ('$divisi_name')";

	if($conn->query($query) === TRUE){
		echo "New record added";
	}else{
		echo "Error".$query."<br> detail". $conn->error;
	}
}

?>