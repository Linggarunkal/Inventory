<?php
require('connection.php');

$chck = "select divisi_name from divisi_tb";
$hasil = $conn->query($chck);

if($hasil->num_rows){
	while ($row = $hasil->fetch_assoc()) {
		echo "".$row['divisi_name']."";
	}
}


?>