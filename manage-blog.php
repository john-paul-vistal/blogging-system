<?php
include 'include/dataBase.php';
include 'include/blog-query.php';
include 'include/blog-action.php';
include 'include/user-query.php';
include 'include/user-action.php';

$blogaction = new BlogAction();
$useraction = new UserAction();


$blogs = $blogaction->viewAllBlogs();


?>
<html>
<head>
<link rel="icon" href="src/img/logo.png">
<link rel="stylesheet" href="src/css/dash-card.css">
</head>
<div id="wrapper">
    <?php include 'template/header.php'?>
    <?php include 'template/side-nav.php'?>
    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="d-flex justify-content-between mx-3">
            <h4>MANAGE BLOGS</h4>
            <div class="searchbar">
                <input id="searchInput" class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div style="height: 100%;overflow: scroll;direction: rtl;" class="container mt-2">
            <div class="d-flex justify-content-center">
                <div class="container">
                    <div class="row mt-2">
                        <?php
                            if($blogs == null):
                            echo '<p>No Admins Yet</p>';
                            else:
                            foreach($blogs as $blog):
                        ?>
                        <div class="col-md-4">
                            <div id="blogRecords" class="card-counter user-info w3-deep-purple rounded" style="width:310px;height:400px">
                                <img style="height:170px" class="card-img-top rounded-top" src="src/img/blogs/<?php echo $blog['img']?>" alt="Card image cap">
                                <div class="mr-1 mt-1" style="float:right">
                                    <p class="p-2 btn-danger rounded-circle fa fa-trash w3-large"></p>
                                    <p class="p-2 btn-warning rounded-circle fa fa-edit w3-large"></p>
                                    <p class="p-2 btn-success rounded-circle fa fa-eye w3-large"></p>
                                    <p class="p-2 btn-info rounded-circle fa fa-upload w3-large"></p>
                                </div>
                                <div style="margin-top:65px" class="card-content">
                                    <h5 class="text-center"><b>"<?php echo mb_strimwidth(strtoupper($blog['title']), 0, 20, "...")?>"</b></h5>
                                </div>
                                <div  class="card-footer">
                                    <h6 class="text-left ml-2"><i class="fa fa-comment w3-xlarge mr-3"></i><?php echo $blog['topic']?></h6>
                                    <?php
                                    $datas = $useraction->viewAUser($blog['author_id']);
                                    foreach($datas as $data){
                                        $author = $data['fullName'];
                                    }
                                    ?>
                                    <h6 class="text-left ml-2"><i class="fa fa-user w3-xlarge mr-4"></i><?php echo $author?></h6>
                                    <h6 class="text-left ml-2"><i class="fa fa-calendar w3-large mr-4"></i><?php echo $blog['created_date']?></h6>
                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach; endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>