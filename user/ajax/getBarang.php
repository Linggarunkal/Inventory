<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 21:38
 */
if(isset($_POST['dataTosave']) && isset($_POST['title']) && isset($_POST['title']) && isset($_POST['reqDate']) && isset($_POST['dueDate']) && isset($_POST['note'])){
    include('connection.php');

    $json = $_POST['dataTosave'];
    $title = $_POST['title'];
    $reqDate = $_POST['reqDate'];
    $dueDate = $_POST['dueDate'];
    $note = $_POST['note'];

    echo $title;
    echo $reqDate;
    echo $dueDate;
    echo $note;

    $sizeArray = sizeof($json);
    for($i=0; $i<$sizeArray;$i++){
        echo $json[$i]['ProductName'];
        echo $json[$i]['Qty'];
    }




}