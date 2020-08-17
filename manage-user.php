<?php
include 'include/dataBase.php';
include 'include/user-query.php';
include 'include/user-action.php';
$user = new UserAction();
$userData = $user->viewAllUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="src/img/logo.png">
<link rel="stylesheet" href="src/css/dash-card.css">
</head>
<div id="wrapper">
    <?php include 'template/header.php'?>
    <?php include 'template/side-nav.php'?>
    <!-- Page content -->
        <div id="page-content-wrapper">
    <div class="container ">
        <div class="d-flex justify-content-between">
        <h3>ADMINS</h3>
        <div class="d-flex d-inline">
        <div class="searchbar mr-3 mt-2">
            <input id="searchAdmin" class="search_input" type="text" name="" placeholder="Search...">
            <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
        </div>
        <a data-placement="top" data-toggle="tooltip" title="Create New Admin" href="add-user.php"><button style="width:50px;height:50px" class="btn btn-lg rounded-circle w3-blue"><i class="fa fa-plus"></i></button></a>
        </div>
        </div>
        <div  id="adminRecords" class="row mt-2">
            <?php
                if($userData == null):
                    echo '<p>No Admins Yet</p>';
                else:
                    foreach($userData as $data):
            ?>
            <div class="col-md-4">
                <div class="card-counter user-info w3-deep-purple admins" style="width:310px;height:385px">
                    <img style="height:170px" class="card-img-top rounded-top" src="src/img/cover1.jpg" alt="Card image cap">
                    <img class="rounded-circle ml-2 shadow bg-white p-1" style="width:120px;height:120px;position:relative;top:-60px;margin-bottom:0" src="src/img/profile/<?php echo $data['img']?>" alt="profile">
                    <div class="mr-1 mt-1" style="float:right">
                        <p class="p-2 btn-danger rounded-circle fa fa-google w3-large"></p>
                        <p class="p-2 btn-primary rounded-circle fa fa-instagram w3-large"></p>
                        <p class="p-2 btn-success rounded-circle fa fa-linkedin w3-large"></p>
                        <p class="p-2 btn-info rounded-circle fa fa-twitter w3-large"></p>
                    </div>
                    <div style="margin-top:-70px" class="card-body text-left">
                        <h4 class="name"><b><?php echo strtoupper($data['fullName'])?></b></h4>
                        <p style="line-height:8px"><?php echo $data['email']?></p>
                        <p style="line-height:8px">
                            <?php
                                switch ($data['adminLevel']) {
                                    case 1:
                                    echo "Super Admin";
                                    break;
                                    case 2:
                                    echo "Admin";
                                    break;
                                    case 3:
                                    echo "User";
                                    break;
                                    default:
                                    echo "Guest";
                                }
                            ?>
                        </p>
                    </div>
                    <div style="margin-top:-8px" class="card-footer text-right">
                        <a href="user-info.php?id=<?php echo $data['id']?>">MORE INFO</a>
                    </div>
                </div>
            </div>

            <?php endforeach; endif ?>
         </div>
                    
                </div>
            </div>
    </div>
</html>