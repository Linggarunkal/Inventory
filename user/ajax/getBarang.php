<?php
/**
 * Created by PhpStorm.
 * User: lkurniawan
 * Date: 09/12/2016
 * Time: 21:38
 */
if(isset($_POST['dataTosave']) && isset($_POST['title']) && isset($_POST['title']) && isset($_POST['reqDate']) && isset($_POST['dueDate']) && isset($_POST['note']) && isset($_POST['id_user'])){
    include('connection.php');

    $json = $_POST['dataTosave'];
    $id_user = $_POST['id_user'];
    $title = $_POST['title'];
    $reqDate = $_POST['reqDate'];
    $dueDate = $_POST['dueDate'];
    $note = $_POST['note'];

//    start transaction
    $start = "start transaction";
    $resStart = $conn->query($start);
    if(!$resStart){
        die("Connection Loss".$conn->error());
    }
    $tbl_master = "INSERT INTO peminjaman_tb (id_user, requestDate, requestDue, note) values ('$id_user',STR_TO_DATE('$reqDate','%m/%d/%Y %H:%i:%s'), STR_TO_DATE('$dueDate','%m/%d/%Y %H:%i:%s'), '$note')";
//    $tbl_master = "INSERT INTO peminjaman_tb (id_user, requestDate, requestDue, note) values ('$id_user','$reqDate', '$dueDate', '$note')";
    $resTbl_master = $conn->query($tbl_master);
    if($resTbl_master){
        $getLastID = "set @last_id = last_insert_id()";
        $resLastID = $conn->query($getLastID);
    }else{
        $lossMaster_trans = "rollback";
        $resLossMaster_trans = $conn->query($lossMaster_trans);
    }


    echo $id_user;
    echo $title;
    echo $reqDate;
    echo $dueDate;
    echo $note;

    $sizeArray = sizeof($json);
    for($i=0; $i<$sizeArray;$i++){
        /*echo $json[$i]['id_barang'];
        echo $json[$i]['ProductName'];
        echo $json[$i]['Qty'];*/
        $barang_id = $json[$i]['id_barang'];
        $productName = $json[$i]['ProductName'];
        $qty_barang = $json[$i]['Qty'];

        echo $barang_id;
        echo $qty_barang;
        $insert_detail = "INSERT INTO detailpinjam_barang (id_barang, id_pinjam, qty) values ('$barang_id',@last_id, '$qty_barang')";
        $resInsert_detail = $conn->query($insert_detail);
    }

    if($resInsert_detail){
        $valid = "commit";
        $resValid = $conn->query($valid);
        if(!$resValid){
            die("Query failed".$conn->error());
        }
    }elseif(!$resInsert_detail){
        $failed = "rollback";
        $resFailed = $conn->query($failed);
        if(!$resFailed){
            die("Query Failed".$conn->error());
        }
    }else{
        die("Transaction Failed".$conn->error());
    }


$conn->close();


}