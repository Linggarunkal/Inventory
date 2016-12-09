<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 16:06
 */

session_start();
if(isset($_POST['username']) && isset($_POST['username'])){
    $username = $_POST['username'];
    echo $username;
    $_SESSION[$username];
    echo $_SESSION['username'];
}