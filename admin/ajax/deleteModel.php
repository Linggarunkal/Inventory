<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/18/2016
 * Time: 11:56 PM
 */
include('connection.php');

$data_model = $_REQUEST['data_model'];

$data_id_array = explode(",", $data_model);
if(!empty($data_id_array)) {
    foreach($data_id_array as $id_model) {
        $sql = "DELETE FROM model_tb ";
        $sql.=" WHERE id_model = '".$id_model."'";
        $query=mysqli_query($conn, $sql) or die("divisi_delete: delete divisi");
    }
}