<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 16/11/2016
 * Time: 09:24
 */
include('connection.php');

$data_user = $_REQUEST['data_user'];

$data_id_array = explode(",", $data_user);
if(!empty($data_id_array)) {
    foreach($data_id_array as $id_user) {
        $sql = "DELETE FROM user_tb ";
        $sql.=" WHERE id_user = '".$id_user."'";
        $query=mysqli_query($conn, $sql) or die("divisi_delete: delete divisi");
    }
}