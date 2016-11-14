<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 14/11/2016
 * Time: 17:30
 */

if(isset($_POST['txtNama']) && isset($_POST['divSelect']) && isset($_POST['txtEmail']) && isset($_POST['txtUserName']) && isset($_POST['txtPassword']) && isset($_POST['levSelect']) && isset($_POST['manSelect'])){
    include('connection.php');

    $txtNama = $_POST['txtNama'];
    $divSelect = $_POST['divSelect'];
    $txtEmail = $_POST['txtEmail'];
    $txtUserName = $_POST['txtUserName'];
    $txPassword = $_POST['txtPassword'];
    $levSelect = $_POST['levSelect'];
    $manSelect = $_POST['manSelect'];

    $query = "INSERT into user_tb (fname, lname, username, password, id_divisi, id_level, id_manager, email) VALUES ('$txtFname', '$txtLname','$divSelect','$txtEmail','$txtUserName','$txPassword','$levSelect','$manSelect')";
    if($conn->query($query) === TRUE){
        echo "New Record Added";
    }else{
        echo "Failed Record added";
    }
}