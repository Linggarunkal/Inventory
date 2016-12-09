<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 08/12/2016
 * Time: 09:21
 */

if(isset($_POST['id_barang']) && isset($_POST['qty'])){
    include('connection.php');

    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];


    $query = "insert into temp_detbarang (id_barang, qty) VALUES ('$id_barang','$qty')";
    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Error New Record Added".$conn->error;
    }
}