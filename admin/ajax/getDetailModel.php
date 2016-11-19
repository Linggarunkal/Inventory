<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/19/2016
 * Time: 8:30 AM
 */
include('connection.php');

if(isset($_POST['id_model']) && isset($_POST['id_model']) != ""){
    $model_id = $_POST['id_model'];
    $query = "select product_name, type, brand, qty from model_tb where id_model = '$model_id'";
    $result = $conn->query($query);

    if(!$result){
        die("Error Get data Model". $conn->mysqli_error);
    }
    $response = array();
    if($result->num_rows > 0){
        while ($row=$result->fetch_assoc()){
            $response = $row;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = "data Not found";
    }
    echo json_encode($response);
}else{
    $response['status'] = 200;
    $response['message'] = "Invalid response";
}