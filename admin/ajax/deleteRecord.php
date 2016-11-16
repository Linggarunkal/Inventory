<?php

include('connection.php');

$data_ids = $_REQUEST['data_ids'];

$data_id_array = explode(",", $data_ids); 
if(!empty($data_id_array)) {
	foreach($data_id_array as $id_divisi) {
		$sql = "DELETE FROM divisi_tb ";
		$sql.=" WHERE id_divisi = '".$id_divisi."'";
		$query=mysqli_query($conn, $sql) or die("divisi_delete: delete divisi");
	}
}
?>