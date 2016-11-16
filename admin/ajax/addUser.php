<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 14/11/2016
 * Time: 17:30
 */

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['id_divisi']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['id_level']) && isset($_POST['id_manager'])){
    include('connection.php');

    $txtNamaDepan = $_POST['fname'];
    $txtNamaBelakang = $_POST['lname'];
    $divSelect = $_POST['id_divisi'];
    $txtEmail = $_POST['email'];
    $txtUserName = $_POST['username'];
    $txtPassword = $_POST['password'];
    $levSelect = $_POST['id_level'];
    $manSelect = $_POST['id_manager'];

    $query = "INSERT INTO user_tb (fname, lname, id_divisi, email, username, password, id_level, id_manager) VALUES ('$txtNamaDepan','$txtNamaDepan', '$divSelect', '$txtEmail', '$txtUserName', '$txtPassword', '$levSelect', '$manSelect')";
    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Failed Record added";
    }
}

?>