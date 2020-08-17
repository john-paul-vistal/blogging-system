<?php
include 'include/dataBase.php';
include 'include/user-query.php';
include 'include/user-action.php';
$user = new UserAction();

if(isset($_GET['id'])){
    $datas = $user->viewAUser($_GET['id']);
    if($datas == null){
        $error = "NO USER EXIST!";
    }
}else{
    $error = "USER ID NOT SET!";
}

if(isset($_POST['deleteUser'])){
    $user->deleteUser($_POST['id']);
    header('Location:manage-user.php');
}

if(isset($_POST['updateUser'])){
    if($_POST['imageUpdate']==""){
        $_POST['imageUpdate']= $_POST['oldImage'];
    }
    $user->updateUser($_POST,$_POST['id']);
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
        <h4>ADMIN DETAILS</h4>
        <a data-placement="top" data-toggle="tooltip" title="Back" href="manage-user.php"> <button class="btn btn-lg rounded-circle w3-blue p-3"><i class="fa fa-arrow-left"></i></button></a>
    </div>
    <div class="container mt-4">
    <form action="user-info.php" method="POST">
        <div class="d-flex justify-content-center">
            <div class="card shadow rounded" style="width:90rem;">
            <div class="d-flex justify-content-between card-header bg-purple text-white">
                    <h4>Information Sheet</h4>
                    <button type="submit" name="deleteUser" class="btn btn-danger px-3 w3-large"><i class="fa fa-trash"></i></button>
                </div>
            <div class="card-body w3-deep-purple">
                    <div class="container">
                        <?php if($datas == null):
                            echo "<p class='text-danger'>ADMIN NOT EXISTED!</p>";
                        else:
                        foreach($datas as $data):
                        ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div id="imageHolder" class="bg-white mt-4" style="width:320px;height:320px;">
                                            <input name="oldImage" type="hidden" value="<?php echo $data['img']?>">
                                            <img id="avatar" class="p-1 rounded" src="src/img/profile/<?php echo $data['img']?>" style="width:320px;height:320px;">
                                            <label class="w3-white rounded-bottom btn-block py-3 w3-hover-aqua text-center" for="imagePicker">Update Image</label>
                                            <input name="imageUpdate" id="imagePicker" class="file-upload" style="visibility:hidden" type="file" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class=" box mt-5 text-white">
                                                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                                                    <div class="inputBox mx-5">
                                                        <input type="text" name="username" required value="<?php echo $data['userName']?>">
                                                        <div class="line"></div>
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="password" name="password" required value="<?php echo $data['password']?>">
                                                        <div class="line"></div>
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="text" name="fullname" required value="<?php echo $data['fullName']?>">
                                                        <div class="line"></div>
                                                        <label>Full Name</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <input type="email" name="email" required value="<?php echo $data['email']?>">
                                                        <div class="line"></div>
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="inputBox mx-5">
                                                        <select class="w3-text-white" name="adminlevel" id="" required>
                                                            <option>Choose Admin Level ......</option>
                                                            <option value="1" <?php if($data['adminLevel']==1){echo 'selected="selected"';}?> >Super Admin</option>
                                                            <option value="2" <?php if($data['adminLevel']==2){echo 'selected="selected"';}?> >Admin</option>
                                                            <option value="3" <?php if($data['adminLevel']==3){echo 'selected="selected"';}?> >User</option>
                                                            <option value="4" <?php if($data['adminLevel']==4){echo 'selected="selected"';}?> >Guest</option>
                                                        </select>
                                                        <div class="line"></div>
                                                    </div>
                                                    <div class=" d-flex justify-content-end">
                                                        <button type="submit" name="updateUser" class="btn btn-warning px-5 py-3 mx-2">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                        <?php endforeach;endif?>
                                </div>
                            </div>
                    </div>
             </div>
             </form>
        </div>
</div>
</div>
</html>