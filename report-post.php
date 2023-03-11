<?php
session_start();
    require 'config.php';
    if(isset($_POST['submit'])){
        $id = rand();
        $name = $_SESSION['name'];
        $ptitle = mysqli_real_escape_string($conn, $_POST['ptitle']);
        $pdis = mysqli_real_escape_string($conn, $_POST['pdis']);
        $paddr = mysqli_real_escape_string($conn, $_POST['paddr']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        if($type == 'VIDEO'){
            $video_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            if($error === 0){
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
            $video_ex_lc = strtolower($video_ex);
            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');
            if (in_array($video_ex_lc, $allowed_exs)) {
                $new_video_name = uniqid("video-", true). '.'.$video_ex_lc;
                $video_upload_path = 'upload/'.$new_video_name;
                move_uploaded_file($tmp_name, $video_upload_path);
                $query  = "INSERT INTO `post`(`id`,`name`,`ptitle`,`pdis`, `paddr`, `state`, `district`,`type`,`image`,`video`) VALUES ('$id','$name','$ptitle','$pdis','$paddr','$state','$district','$type','','$new_video_name')";
                $que = mysqli_query($conn, $query);
                       header("Location: personal.php");
                }else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
                }
               }
           }elseif($type == 'IMAGE'){
            $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
            $tmp_name =  $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            $local_image = "upload/";
            $query  = "INSERT INTO `post`(`id`,`ptitle`,`pdis`, `paddr`, `state`, `district`,`type`,`image`,`video`) VALUES ('$id','$ptitle','$pdis','$paddr','$state','$district','$type','$image','')";
            $query_run = mysqli_query($conn , $query);
            if($query_run){
                move_uploaded_file($tmp_name,$local_image.$image);
                header('Location: personal.php');
            }else{
                header('Location: report-post.php');
            }
        }else{
            header('Location: personal.php');
        }
    }
?>