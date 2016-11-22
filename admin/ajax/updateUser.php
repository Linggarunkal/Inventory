<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 22/11/2016
 * Time: 10:01
 */
include('connection.php');

if(isset($_POST)){
    $id_user = $_POST['id_user'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_divisi = $_POST['id_divisi'];
    $id_level = $_POST['id_level'];
    $id_manager = $_POST['id_manager'];
    $email = $_POST['email'];

    $query = "UPDATE user_tb SET fname = '$fname', lname = '$lname', username = '$username', password = '$password', id_divisi = '$id_divisi',id_level = '$id_level', id_manager = '$id_manager', email = '$email' WHERE id_user = '$id_user'";

    $result = $conn->query($query);

    if(!$result){
        die("Connection Time Out". $conn->mysqli_error);
    }
}