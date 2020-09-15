<?php
include 'include/dataBase.php';
include 'include/blog-query.php';
include 'include/blog-action.php';
include 'include/user-query.php';
include 'include/user-action.php';

$blogaction = new BlogAction();
$useraction = new UserAction();


if(isset($_POST['delete'])){
    $blogaction->deleteBlog($_POST['id']);
    unset($_POST['delete']);
    header('Location:manage-blog.php');
}

if(isset($_POST['publish'])){
    $date = date("Y-m-d");
    $blogaction->publish($date,$_POST['id']);
    unset($_POST['publish']);
    header('Location:manage-blog.php');
}


?>
<html>
<head>
<link rel="icon" href="src/img/logo.png">
<link rel="stylesheet" href="src/css/dash-card.css">
</head>
<div id="wrapper">
    <?php include 'template/header.php'?>
    <?php include 'template/side-nav.php'?>
    <?php
        if($_SESSION['adminLevel'] == "Admin"||$_SESSION['adminLevel'] == "Super Admin"){
            $blogs = $blogaction->viewAllBlogs(); 
        }else{
            $blogs = $blogaction->viewMyBlogs($_SESSION['id']);
        }
    ?>
    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="bg-white d-flex justify-content-between mx-3">
            <h4>MANAGE BLOGS</h4>
            <div class="d-flex d-inline">
                <div class="searchbar mr-3">
                    <input id="searchInput" class="search_input" type="text" name="" placeholder="Search...">
                    <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                </div>
                <a data-placement="top" data-toggle="tooltip" title="Create New Blog" href="create-blog.php"><button style="width:50px;height:50px" class="btn btn-lg rounded-circle w3-blue"><i class="fa fa-plus"></i></button></a>
            </div>
        </div>
        <div style="height: 100%;overflow: scroll;" class="container mt-2">
            <div class="d-flex justify-content-end">
                <div class="container">
                    <div id="blogRecords"  class="row mt-2">
                        <?php
                            if($blogs == null):
                            echo '<p>No Blogs Yet</p>';
                            else:
                            foreach($blogs as $blog):
                                if($blog['pub_stat'] != 1):
                                   
                        ?>
                        <div  class="col-md-4">
                            <div  class="card-counter user-info w3-deep-purple rounded blog" style="width:310px;height:400px">
                                <img style="height:170px" class="card-img-top rounded-top" src="src/img/blogs/<?php echo $blog['img']?>" alt="Card image cap">
                                <div class="mr-1 mt-1" style="float:right">
                                <form style="height:25px" action="" method="POST">
                                    <input name="id" type="hidden" value="<?php echo $blog['id']?>">
                                    <button name="delete" data-placement="top" data-toggle="tooltip" title="Delete" class="p-2 btn-danger rounded-circle fa fa-trash w3-large"></button>
                                    <a href="edit-blog.php?id=<?php echo $blog['id']?>" data-placement="top" data-toggle="tooltip" title="Edit" class="p-2 btn-warning rounded-circle fa fa-edit w3-large"></a>
                                    <a href="view.php?viewid=<?php echo $blog['id']?>" data-placement="top" data-toggle="tooltip" title="View" class="p-2 btn-success rounded-circle fa fa-eye w3-large"></a>
                                    <?php
                                     if($_SESSION['adminLevel'] == "Admin"||$_SESSION['adminLevel'] == "Super Admin"){
                                        echo '<button name="publish" data-placement="top" data-toggle="tooltip" title="Publish" class="p-2 btn-info rounded-circle fa fa-upload w3-large"></button>';
                                    }
                                    ?>
                                </form>
                                </div>
                                <div style="margin-top:65px" class="card-content">
                                    <h5 class="text-center title"><b>"<?php echo mb_strimwidth(strtoupper($blog['title']), 0, 20, "...")?>"</b></h5>
                                </div>
                                <div  class="card-footer">
                                    <h6 class="topic text-left ml-2"><i class="fa fa-star w3-xlarge mr-3"></i> <?php echo $blog['topic']?></h6>
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
                        
                    <?php endif;endforeach; endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>