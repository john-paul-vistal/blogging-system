<?php
include 'include/dataBase.php';
include 'include/blog-query.php';
include 'include/blog-action.php';

$blogAction = new BlogAction();

if(isset($_GET['id'])){
    $blog = $blogAction->viewABlog($_GET['id']);
}else{
    $error = '<h1 class="text-danger">BLOG DOES NOT EXIST!</h1>';
}

if(isset($_GET['updateBlog'])){
    if($_GET['imageUpdate']==""){
        $_GET['imageUpdate']= $_GET['oldImage'];
    }
    $blogAction->editBlog($_GET,$_GET['id']);
    header('Location:manage-blog.php');
}

?>
<html>
<head>
<link rel="icon" href="src/img/logo.png">
</head>
<div id="wrapper">
    <?php include 'template/header.php'?>
    <?php include 'template/side-nav.php'?>
    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="d-flex justify-content-between mx-3">
            <h4>MODIFY BLOG</h4>
            <a data-placement="top" data-toggle="tooltip" title="Back" href="manage-blog.php"><button style="width:50px;height:50px" class="btn btn-lg rounded-circle w3-blue"><i class="fa fa-arrow-left"></i></button></a>
        </div>
        <div class="container mt-4">
            <div class="d-flex justify-content-center">
                <div class="card shadow rounded" style="width:90rem;">
                    <div class="card-body w3-deep-purple">
                    <?php 
                    if($blog == null):
                        echo '<h1 class="text-danger">BLOG DOES NOT EXIST!</h1>';
                    else:
                        foreach($blog as $data):?>
                    <form action="" mehtod="GET">
                        <div class=" box mt-5 text-white">
                            <div class="row">
                                <div class="col-6 mt-5">
                                    <input name="id" type="hidden" value="<?php echo $data['id']?>" >
                                    <input name="authorid" type="hidden" value="<?php echo $_SESSION['id'];?>" >
                                    <div class="inputBox ml-5">
                                        <input type="text" name="title" required value="<?php echo $data['title']?>">
                                        <div class="line"></div>
                                        <label>Title</label>
                                    </div> 
                                    <div class="inputBox ml-5">
                                        <input type="text" name="topic" required value="<?php echo $data['topic']?>">
                                        <div class="line"></div>
                                        <label>Topic</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div id="imageHolder" class="bg-white" style="width:420px;height:200px;margin-top:-30px">
                                        <input name="oldImage" type="hidden" value="<?php echo $data['img']?>">
                                        <img id="featuredPhoto" class="p-1 rounded" src="src/img/blogs/<?php echo $data['img']?>" style="width:420px;height:200px;">
                                        <label class="w3-white rounded-bottom btn-block py-2 w3-hover-aqua text-center" for="blog_image">Choose Featured Image</label>
                                        <input name="imageUpdate"  id="blog_image" class="file-upload" style="visibility:hidden" type="file" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mx-5">
                                <label for="exampleFormControlTextarea1">Content</label>
                                <textarea name="content" style="height:300px" class="form-control" id="blog_content" required><?php echo $data['content']?></textarea>
                            </div>
                            <div class="d-flex justify-content-end mx-5">
                                <button type="submit" name="updateBlog" class="btn btn-warning px-4 py-3">Update Blog</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>