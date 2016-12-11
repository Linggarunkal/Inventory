<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 21:38
 */
if(isset($_POST['dataTosave']) && isset($_POST['dataTosave']) != ""){
    $json = $_POST['dataTosave'];
    echo $_POST['dataTosave'][1]['ProductName'];
    //var_dump($json);


}