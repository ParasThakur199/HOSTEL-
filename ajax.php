<?php
session_start();

include('includes/dbconnection.php');
    // $eid=$_Request['ID'];
    // print_r($eid);
    $id = $_GET['id'];
   
     $sql = mysqli_query($con,"SELECT * from tblvisitor where ID=$id");
     $res = mysqli_fetch_assoc($sql);   
     $status = 0;
     if($res['status'] == 1){
         $status = 0;
        }elseif($res['status'] == 0){
         $status = 1;
     }
    $updateStatus = mysqli_query($con,"UPDATE tblvisitor SET status = $status WHERE ID=$id");
     
  


?>
