<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="s.css">
    <title>NIT WARANGAL</title>
</head>
<body>
    <header>
        <a href="#" class="logo"><?php echo $_SESSION['name']; ?></a>
        <div class="group">
            <ul class="navigation">
                <li><a href="personal.php">Home</a></li>
                <li><a href="myposts.php">My Posts</a></li>
                <li><a href="post.php">Post</a></li>
                <li><a href="profile.php">Friends</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <div class="search">
                <span class="icon">
                    <ion-icon name="search-outline" class="searchbtn"></ion-icon>
                    <ion-icon name="close-outline" class="closebtn"></ion-icon>
                </span>
            </div>
            <ion-icon name="menu-outline" class="menutoggle" style="color:#fff"></ion-icon>
        </div>
        <div class="searchbox">
            <input type="text" name="search" placeholder="Search for posts">
        </div>
    </header>
    <div class="container" style="margin-top:80px;">
                <h1 style="color:#fff;"></h1>
                <?php
                require 'config.php';
                if(isset($_GET['search'])){
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM post WHERE CONCAT(id,name,ptitle,pdis,state,district,paddr) LIKE '%$filtervalues%' AND name=$name";
                    $query_run = mysqli_query($conn,$query);
                    if(mysqli_num_rows($query_run)>0){
                        foreach($query_run as $items){
                        ?>
                        <div class="card">
                        <h1><?php echo $items['ptitle']; ?></h1>
                        <h1 style="margin-top:70px;"><?php echo $items['pdis']; ?></h1>
                            <div class="info">
                                <?php if($items['type']=='VIDEO'){
                                    ?>
                            <video src="upload/<?=$items['video']?>"controls></video>
                            <?php
                            }
                            elseif($items['type'] == 'IMAGE'){
                            ?>
                                <img src="upload/<?php echo $items['image']; ?>" style="width:350px" alt="">
                            <?php } ?>
                            <p><?php echo $items['name']; ?><br><?php echo $items['state']; ?> state in <?php echo $items['district']; ?><br> (<?php echo $items['paddr']; ?>)</p>
                            </div>
                        </div>
                        <?php
                        }
                    }
                }else{
                $name=$_SESSION['name'];
                $sql = "SELECT * FROM post where name='$name'";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0){
                    while($video = mysqli_fetch_assoc($res)){
                        ?>
                        <div class="card">
                        <h1><?php echo $video['ptitle']; ?></h1>
                        <h1 style="margin-top:70px;"><?php echo $video['pdis']; ?></h1>
                            <div class="info">
                            <?php if($video['type']=='VIDEO'){
                                    ?>
                            <video src="upload/<?=$video['video']?>"controls></video>
                            <?php
                            }
                            elseif($video['type'] == 'IMAGE'){
                            ?>
                                <img src="upload/<?php echo $video['image']; ?>" style="width:350px" alt="">
                            <?php } ?>
                                <p><?php echo $video['name']; ?><br><?php echo $video['state']; ?> state in <?php echo $video['district']; ?><br> (<?php echo $video['paddr']; ?>)</p>
                            </div>
                        </div>
                        <?php
                    }
                }
                }
            ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
              
              <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="index.js"></script>
<script src="place.js"></script>
</body>
</html>