<?php
include 'include/dataBase.php';
include 'include/user-query.php';
include 'include/user-action.php';
$user = new UserAction();

if(isset($_POST['save_user'])){
    if($_POST['imageUpload']==""){
        $_POST['imageUpload']="default1.jpg";
    }
    $user->addUser($_POST);
    header('Location:manage-user.php');
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
    <div class="d-flex justify-content-between mx-4">
        <h4>CREATE NEW ADMIN</h4>
        <a href="manage-user.php"> <button class="btn btn-lg rounded-circle w3-blue p-3"><i class="fa fa-arrow-left"></i></button></a>
    </div>
    <div class="container mt-4">
        <div class="d-flex justify-content-center">
            <div class="card shadow rounded" style="width:90rem;">
                <div class="card-header bg-purple text-white">
                    <h4>Information Sheet</h4>
                </div>
            <div class="card-body w3-deep-purple">
                    <div class="container">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div id="imageHolder" class="bg-white mt-4" style="width:320px;height:320px;">
                                            <img id="avatar" class="p-1 rounded" src="src/img/default1.jpg" style="width:320px;height:320px;">
                                            <label class="w3-white rounded-bottom btn-block py-3 w3-hover-aqua text-center" for="imagePicker">Choose Image</label>
                                            <input name="imageUpload"  id="imagePicker" class="file-upload" style="visibility:hidden" type="file" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class=" box mt-5 text-white">
                                                    <div class="inputBox mx-5">
                                                        <input type="text" name="username" required value="">
                                                        <div class="line"></div>
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="text" name="password" required value="">
                                                        <div class="line"></div>
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="text" name="fullname" required value="">
                                                        <div class="line"></div>
                                                        <label>Full Name</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="email" name="email" required value="">
                                                        <div class="line"></div>
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <select class="w3-text-white" name="adminlevel" id="" required>
                                                            <option>Choose Admin Level ......</option>
                                                            <option value="1">Super Admin</option>
                                                            <option value="2">Admin</option>
                                                            <option value="3">User</option>
                                                            <option value="4">Guest</option>
                                                        </select>
                                                        <div class="line"></div>
                                                    </div>
                                                    <div class=" d-flex justify-content-end">
                                                        <button type="submit" name="save_user" class="btn btn-primary px-5 py-3 mx-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
             </div>
        </div>
</div>
</div>
</html>