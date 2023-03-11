<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <input type="text" placeholder="Search for friends">
        </div>
    </header>
    <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require 'config.php';
        $sql = mysqli_query($conn, "SELECT * FROM `list` WHERE too = '".$_SESSION['name']."'");
        if(isset($_GET['search'])){
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM user WHERE CONCAT(id,name,email) LIKE '%$filtervalues%'";
            $query_run = mysqli_query($conn,$query);
            if(mysqli_num_rows($query_run)>0){
                foreach($query_run as $items){
                    ?>
                            <tr>
                        <td><?php echo $row['fromm']; ?></td>
                        <td><?php if($row['status']==1){    
                            echo '<a href="accept.php?id='.$row['from'].'" class="btn btn-primary btn-sm">Accept</a>';
                            }else{
                            echo '<a href="decline.php?id='.$row['from'].'" class="btn btn-danger btn-sm">decline</a>';    
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        while($row = $sql->fetch_assoc()){
        ?>  <tr>
                <td><?php echo $row['fromm']; ?></td>
                <td><?php if($row['status']==1){    
                    echo '<a href="accept.php?id='.$row['from'].'" class="btn btn-primary btn-sm">Accept</a>';
                    }else{
                    echo '<a href="decline.php?id='.$row['from'].'" class="btn btn-danger btn-sm">decline</a>';    
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
    </table>
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