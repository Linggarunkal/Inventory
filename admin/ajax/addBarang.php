<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 24/11/2016
 * Time: 13:58
 */
if(isset($_POST['product_name']) && isset($_POST['condition_barang']) && isset($_POST['status']) && isset($_POST['qty']) && isset($_POST['remarks'])){
    include('connection.php');

    $product_name = $_POST['product_name'];
    $condition_barang = $_POST['condition_barang'];
    $status = $_POST['status'];
    $qty = $_POST['qty'];
    $remarks = $_POST['remarks'];

    $query = "INSERT INTO barang_tb (id_model, condition_barang, status, qty, remarks) VALUES ('$product_name', '$condition_barang', '$status', '$qty', now(), '$remarks')";

    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Failed Record Added";
    }
}