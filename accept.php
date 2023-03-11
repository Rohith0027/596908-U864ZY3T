<?php 
    session_start();
    require 'config.php';
    $id=$_GET['id'];
    $update = "UPDATE `list` SET status = 0 WHERE from = '$id'";
    mysqli_query($conn,$update);
    printf("Accepted");
?>