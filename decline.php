<?php 
    session_start();
    require 'config.php';
    $id=$_GET['id'];
    $update = "UPDATE `list` SET status = 1 WHERE fromm = '$id'";
    $u = "DELETE FROM `list` WHERE fromm = '$id'";
    mysqli_query($conn,$update);
    printf("Declined");
?>