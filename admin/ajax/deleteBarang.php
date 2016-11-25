<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 25/11/2016
 * Time: 09:58
 */
/*include('connection.php');
$data_barang = $_REQUEST['data_barang'];

$data_id_array = explode(",", $data_barang);
if(!empty($data_id_array)){
    foreach($data_id_array as $id_barang){
        $sql = "DELETE FROM barang_tb";
        $sql .="WHERE id_barang = '".$id_barang."'";
        $query = mysqli_query($conn, $sql) or die("Barang Delete: Delete Barang");
    }
}*/

include('connection.php');

$data_barang = $_REQUEST['data_barang'];

$data_id_array = explode(",", $data_barang);
if(!empty($data_id_array)) {
    foreach ($data_id_array as $id_barang) {
        $sql = "DELETE FROM barang_tb ";
        $sql .= " WHERE id_barang = '" . $id_barang . "'";
        $query = mysqli_query($conn, $sql) or die("barang delete: delete delete");
    }
}
/*include('connection.php');

$data_model = $_REQUEST['data_model'];

$data_id_array = explode(",", $data_model);
if(!empty($data_id_array)) {
    foreach($data_id_array as $id_model) {
        $sql = "DELETE FROM model_tb ";
        $sql.=" WHERE id_model = '".$id_model."'";
        $query=mysqli_query($conn, $sql) or die("divisi_delete: delete divisi");
    }
}*/