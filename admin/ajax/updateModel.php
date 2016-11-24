<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 21/11/2016
 * Time: 16:13
 */

include('connection.php');

if(isset($_POST)){
    $id_model = $_POST['id_model'];
    $product_name = $_POST['product_name'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
//    $qty = $_POST['qty'];

    $query = "UPDATE model_tb set product_name='$product_name', type='$type', brand= '$brand' where id_model='$id_model'  ";
    $result = $conn->query($query);
    if(!$result){
        die("Connection Time Out". $conn->mysqli_error);
    }
}