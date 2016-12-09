<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 09:24
 */
include('connection.php');
if(isset($_POST['transaksi']) && isset($_POST['transaksi'])){
    $transaksi = $_POST['transaksi'];

    if($transaksi != 0){
        $query = "TRUNCATE TABLE temp_detbarang";
        $result = $conn->query($query);
        if(!$result){
            die("Truncate table temp failed");
        }
    }
}