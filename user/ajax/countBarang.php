<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 08/12/2016
 * Time: 13:36
 */
/*//header("Content-type: application/json");
if(isset($_POST['id_barang']) && isset($_POST['qty'])){
    include('connection.php');

    $id_barang = $_POST['id_barang'];
    $qty = $_POST['qty'];
    //$id_barang = "BRG015";

    $query = "select qty from barang_tb where id_barang='$id_barang'";
    $result = $conn->query($query);
    if(!$result){
        die("Data Not Found");
    }
    $output = array();
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $output=$row;
        }
    }
    echo json_encode($output);
}*/

include('connection.php');
if(isset($_POST['id_barang']) && isset($_POST['id_barang']) != ""){
    $barang_id = $_POST['id_barang'];
    $query = "Select qty from barang_tb where id_barang = '$barang_id'";
    $result = $conn->query($query);

    if(!$result){
        die("Error Get data User". $conn->mysql_error);
    }
    $response = array();
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            $response = $row;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = "data Not found";
    }
    echo json_encode($response);
}else{
    $response['status'] = 200;
    $response['message'] = "invalid response";
}
