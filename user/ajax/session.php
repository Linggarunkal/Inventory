<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 16:06
 */

session_start();
if(isset($_POST['username']) && isset($_POST['id_user']) != ""){
    $username = $_POST['username'];
    $id_user = $_POST['id_user'];

    $_SESSION['username'] = $username;
    $_SESSION['id_user'] = $id_user;
    //echo $_SESSION['username'];
    //echo $_SESSION['id_user'];

}
