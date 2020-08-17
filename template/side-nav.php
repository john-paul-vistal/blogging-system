<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PN BLOGING SYSTEM</title>
    <link rel="icon" href="src/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src = "src/js/script.js"></script>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/w3css.css">
    <link rel="stylesheet" href="src/css/input.css">
</head>
<body>
<div id="sidebar-wrapper">
    <nav class = "sidebar-nav">
        <div class = "py-4" style = "border-bottom:1px solid gray;">
            <img src="src/img/profile/<?php echo $_SESSION['img']??"default1.jpg"?>" class="rounded-circle shadow-sm mx-auto d-block bg-white p-1" alt="Profile" style = "width:155px;height:155px">
        <h3 class = "text-white text-center"><?php  echo $_SESSION['fullname']??"UNKWON"?></h3>
        <p style="line-height:5px" class = "text-white text-center"><?php  echo $_SESSION['adminLevel']??"Guest"?></p>
        </div>
        <div class="w3-bar-block m-2 text-white">
           <a style = "text-decoration:none" href="dashboard.php"><button class="w3-bar-item w3-button w3-hover-aqua py-3 rounded"><i class="fa fa-dashboard w3-margin-right"></i>Dashboard</button></a>
            <button class="collapse w3-bar-item w3-button w3-hover-aqua py-3 rounded" data-toggle="collapse" data-target="#blogs"><i class="fa fa-book w3-margin-right"></i>Blogs</i><i style = "float:right" class = "fa fa-angle-down"></i></button>
                <ul class="sub-menu collapse text-white" id="blogs" style = "padding-left:15px">
                  <a style = "text-decoration:none" href="create-blog.php" class="w3-bar-item w3-hover-aqua py-2 rounded"><i class="fa fa-angle-right fa-fw"></i>Create</a>
                  <a style = "text-decoration:none" href="manage-blog.php" class="w3-bar-item w3-hover-aqua py-2 rounded"><i class="fa fa-angle-right fa-fw"></i>Manage</a>
                </ul>
                <?php
                    if($_SESSION['adminLevel'] == "Admin"||$_SESSION['adminLevel'] == "Super Admin"){
                    echo '<a style = "text-decoration:none" href="manage-user.php"><button class="w3-bar-item w3-button w3-hover-aqua py-3 rounded"><i class="fa fa-user w3-margin-right"></i>Admin</button></a>';
                }
                ?>
        </div>
        <div class="sidebar-footer card-footer">
            <span class="text-white w3-small">&copy; Copyright 2020, John Paul Vistal</span>
        </div>
    </nav>
</div>
</html>
