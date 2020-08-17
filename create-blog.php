<?php
include 'include/dataBase.php';
include 'include/blog-query.php';
include 'include/blog-action.php';

$blog = new BlogAction();

if(isset($_GET['saveblog'])){
    $blog->addBlog($_GET);
    header('Location:create-blog.php');
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
        <div class=" mx-4">
            <h4>CREATE BLOG</h4>
        </div>
        <div class="container mt-4">
            <div class="d-flex justify-content-center">
                <div class="card shadow rounded" style="width:90rem;">
                    <div class="card-body w3-deep-purple">
                    <form action="" mehtod="GET">
                        <div class=" box mt-5 text-white">
                            <div class="row">
                                <div class="col-6 mt-5">
                                <input name="authorid" type="hidden" value="<?php echo $_SESSION['id'];?>" >
                                    <div class="inputBox ml-5">
                                        <input type="text" name="title" required value="">
                                        <div class="line"></div>
                                        <label>Title</label>
                                    </div> 
                                    <div class="inputBox ml-5">
                                        <input type="text" name="topic" required value="">
                                        <div class="line"></div>
                                        <label>Topic</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div id="imageHolder" class="bg-white" style="width:420px;height:200px;margin-top:-30px">
                                        <img id="featuredPhoto" class="p-1 rounded" src="src/img/featured-default.jpg" style="width:420px;height:200px;">
                                        <label class="w3-white rounded-bottom btn-block py-2 w3-hover-aqua text-center" for="blog_image">Choose Featured Image</label>
                                        <input name="featuredimage"  id="blog_image" class="file-upload" style="visibility:hidden" type="file" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mx-5">
                                <label for="exampleFormControlTextarea1">Content</label>
                                <textarea name="content" style="height:300px" class="form-control" id="blog_content" required></textarea>
                            </div>
                            <div class="d-flex justify-content-end mx-5">
                                <input type="submit" name="saveblog" class="btn btn-primary px-4 py-3" value="Save Blog">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>