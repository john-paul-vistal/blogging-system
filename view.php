<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PN BLOGS</title>
    <link rel="icon" href="src/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="src/js/script.js"></script>
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/w3css.css">
    <link rel="stylesheet" href="src/css/input.css">
</head>

<?php
include 'include/dataBase.php';
include 'include/blog-query.php';
include 'include/blog-action.php';
include 'include/user-query.php';
include 'include/user-action.php';

$blogaction = new BlogAction();
$useraction = new UserAction();

$blog = $blogaction->viewABlog($_GET['viewid']);
?>

<body class="w3-ligh-gray">
    <nav class="navbar navbar-expand-lg navbar-dark w3-indigo shadow">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
        <div class="justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex justify-content-end">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-3 py-2 active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link" href="#">Article</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item px-3 py-2">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <a style="float:right;margin-top:20px;margin-right:20px" data-placement="top" data-toggle="tooltip" title="Close" href="manage-blog.php"><button style="width:50px;height:50px" class="btn btn-lg rounded-circle w3-red"><i class="fa fa-close"></i></button></a>

    <div class="container mt-5 px-5">
    <?php foreach($blog as $data):?>
        <div class="rounded d-inline w3-deep-purple py-2 px-3 text-white">
            <?php 
            $author = $useraction->viewAUser($data['author_id']);
            foreach($author as $authorData):
            ?>
            <img class="rounded-circle bg-white p-1" style="width:50px;height: 50px;margin-top: -5px" src="src/img/profile/<?php echo $authorData['img']?>" alt="Profile">
            <p class="d-inline text-center"><?php echo $authorData['fullName']?></p>
            <p class="d-inline text-center mx-3">|</p>
            <p class="d-inline text-center" style="line-height:5px"><i class="fa fa-calendar mr-2"></i><?php echo $data['created_date']?></p>
            <?php endforeach?>
        </div>
        <img style="width:100%;height: 500px" src="src/img/blogs/<?php echo $data['img']?>" class="img-responsive img-centered w3-deep-purple p-1" alt="">
        <h2 class="mt-4 article_title"><b>"<?php echo $data['title']?>"</b></h2>
        <?php echo '<p class="mt-4 article_text">'.str_replace("\r\n\r\n", '<br><p class="mt-2 article_text">', $data['content']).'</p>'?>
        <hr>

        <?php endforeach;?>
    </div>
    <div class="mb-2 w3-deep-purple mx-3">
        <div class="w3-row mx-2">
            <!-- This is for the comment -->
        <!-- <div>
            <ul>
                <li>
                    <div class="card text-dark my-2 shadow">
                    <div class="card-header">
                        this is a header

                    </div>
                    <div class="card-body text-dark">
                        This is some text within a card body.
                    </div>
                    </div>
                </li>
            </ul>
        </div> -->
            <div class="w3-twothird">
                <h3>Leave a Comments</h3>
                <div class="container  mr-2">
                    <label for="">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control mx-2" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <label for="">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control mx-2" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <label for="">Comment</label>
                    <div class="input-group">
                        <textarea style="height:250px" class="form-control mx-2" aria-label="With textarea"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="n btn btn-primary py-3 px-4 my-2 mr-2">Send</button>
                    </div>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="container-fluid rounded mt-5 related  mb-5">
                    <div class="wrap">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="What are you looking for?">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div>
                        <div class="card-header w3-indigo mt-3">
                            Rekated Topics
                        </div>
                        <div class="card-body mb-2">
                            <ul>
                                <li class="py-1 w3-border-bottom"> <i class="fa fa-image w3-xxlarge"></i> Lorem ipsum dolor sit amet consectetur</li>
                            </ul>
                        </div>
                        <div class="card-header w3-indigo mt-2">
                            Popular Topics
                        </div>
                        <div class="card-body mb-2">
                            <ul>
                                <li class="py-1 w3-border-bottom"> <i class="fa fa-image w3-xxlarge"></i> Lorem ipsum dolor sit amet consectetur</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        
        </div>



  <button id="scroll-top" class="btn btn-primary px-4"><i class="fa fa-angle-up "></i></button>
    <footer class="container-fluid w3-center w3-indigo">
        <div class="row">
            <div class="col-md mt-2 mb-2 ">
                <!--Column1-->
                <div class="footer-pad ">
                    <img style="width:100px " class="rounded rounded-circle " src="src/img/logo.png " alt=" ">
                </div>
            </div>
            <div class="col-md">
                <!--Column1-->
                <div class="footer-pad ">
                    <h4>Site Map</h4>
                    <ul class="list-unstyled ">
                        <li><a href="#about">About</a></li>
                        <li><a href="#activity">Activity</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md ">
                <div class="w3-xlarge mt-3 mb-2 ">
                    <h4 class=" ">Follow Me</h4>
                    <ul class="social-network social-circle d-inline">
                        <li class="d-inline"><a href="# " class="icoFacebook " title="Facebook "><i class="fa fa-facebook "></i></a></li>
                        <li class="d-inline"><a href="# " class="icoLinkedin " title="Linkedin "><i class="fa fa-linkedin "></i></a></li>
                        <li class="d-inline"><a href="# " class="icoLinkedin " title="Github "><i class="fa fa-google "></i></a></li>
                        <li class="d-inline"><a href="# " class="icoLinkedin " title="Github "><i class="fa fa-phone "></i></a></li>
                        <li class="d-inline"><a href="# " class="icoLinkedin " title="Github "><i class="fa fa-github "></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 copy ">
                <p class="text-center ">&copy; Copyright 2020 - John Paul Vistal. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html