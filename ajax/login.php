<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 14:35
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

if(isset($_POST['username']) && isset($_POST['username']) != ""){
    $username = $_POST['username'];

    $query = "select user_tb.id_user, user_tb.username, user_tb.password, level_tb.role_level
              from user_tb
              INNER join level_tb
              on user_tb.id_level = level_tb.id_level where username = '$username'";
    $result = $conn->query($query);

    if(!$result){
        die("Error Get data User". $conn->mysql_error());
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
