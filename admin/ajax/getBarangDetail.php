<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 25/11/2016
 * Time: 13:58
 */
include('connection.php');

if(isset($_POST['id_barang']) && isset($_POST['id_barang']) !== ""){

    $id_barang = $_POST['id_barang'];
    $query = "SELECT id_model, condition_barang, status, remarks, qty FROM barang_tb WHERE id_barang = '$id_barang'";
    $result = $conn->query($query);

    if(!$result){
        die("Error Get data Barang". $conn->mysqli_error());
    }
    $response = array();
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $response = $row;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = "data not found";
    }
    echo json_encode($response);
}else{
    $response['status'] = 200;
    $response['message'] = "Invalid response";
}