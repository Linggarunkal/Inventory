<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 14/11/2016
 * Time: 17:30
 */

if(isset($_POST['txtNamaDepan']) && isset($_POST['txtNamaBelakang']) && isset($_POST['divSelect']) && isset($_POST['txtEmail']) && isset($_POST['txtUserName']) && isset($_POST['txtPassword']) && isset($_POST['levSelect']) && isset($_POST['manSelect'])){
    include('connection.php');

    $txtNamaDepan = $_POST['txtNamaDepan'];
    $txtNamaBelakang = $_POST['txtNamaBelakang'];
    $divSelect = $_POST['divSelect'];
    $txtEmail = $_POST['txtEmail'];
    $txtUserName = $_POST['txtUserName'];
    $txtPassword = $_POST['txtPassword'];
    $levSelect = $_POST['levSelect'];
    $manSelect = $_POST['manSelect'];

    $query = "INSERT INTO user_tb (fname, lname, id_divisi, email, username, password, id_level, id_manager) VALUES ('$txtNamaDepan','$txtNamaDepan', '$divSelect', '$txtEmail', '$txtUserName', '$txtPassword', '$levSelect', '$manSelect')";
    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Failed Record added";
    }
}

?>