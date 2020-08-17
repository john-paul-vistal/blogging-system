<?php
include 'include/dataBase.php';
include 'include/user-query.php';
include 'include/user-action.php';
$user = new UserAction();

$data = $user->viewAllUser();
?>
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
        <div class="page-content">
        <div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-upload"></i>
        <span class="count-numbers">0</span>
        <span class="count-name">Published</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-clock-o"></i>
        <span class="count-numbers">0</span>
        <span class="count-name">Pending</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-book"></i>
        <span class="count-numbers">0</span>
        <span class="count-name">Blogs</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers"><?php echo count($data)?></span>
        <span class="count-name">Admins</span>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
</body>
</html>