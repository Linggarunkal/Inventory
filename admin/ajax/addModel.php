<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/19/2016
 * Time: 7:47 AM
 */

if(isset($_POST['product_name']) && isset($_POST['type']) && isset($_POST['brand']) && isset($_POST['qty'])){
    include('connection.php');

    $product_name = $_POST['product_name'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $qty = $_POST['qty'];

    $query = "INSERT INTO model_tb (product_name, type, brand, create_date, qty) VALUES ('$product_name', '$type', '$brand', now(), '$qty')";

    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Failed Added Record";
    }
}