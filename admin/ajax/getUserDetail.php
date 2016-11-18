<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 16/11/2016
 * Time: 15:44
 */
include('connection.php');

if(isset($_POST['id_user']) && isset($_POST['id_user']) != ""){
    $user_id = $_POST['id_user'];
    $query = "select fname, lname, username, password, email, id_divisi from user_tb where id_user = '$user_id'";
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