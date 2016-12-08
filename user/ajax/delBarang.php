<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 08/12/2016
 * Time: 11:18
 */
include('connection.php');

$data_barang = $_REQUEST['data_barang'];

$data_id_array = explode(",", $data_barang);
if(!empty($data_id_array)) {
    foreach ($data_id_array as $id_temp) {
        $sql = "DELETE FROM temp_detbarang ";
        $sql .= " WHERE id_temp = '" . $id_temp . "'";
        $query = mysqli_query($conn, $sql) or die("barang delete: delete delete");
    }
}