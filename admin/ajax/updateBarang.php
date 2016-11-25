<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 25/11/2016
 * Time: 14:18
 */
include('connection.php');

if(isset($_POST)){
    $id_barang = $_POST['id_barang'];
    $id_model = $_POST['id_model'];
    $condition_barang = $_POST['condition_barang'];
    $status = $_POST['status'];
    $remarks = $_POST['remarks'];
    $qty = $_POST['qty'];

    $query = "UPDATE barang_tb set id_model = '$id_model', condition_barang = '$condition_barang', status = '$status', remarks = '$remarks', qty = '$qty' where id_barang = '$id_barang'";
    $result = $conn->query($query);

    if(!$result){
        die("Connection TimeOut".$conn->mysqli_error());
    }
}