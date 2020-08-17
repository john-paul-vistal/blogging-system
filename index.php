<?php
include "include/dataBase.php";
include "include/user-query.php";
include "include/user-action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP OOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/css/login.css">
</head>
<body>

<?php
$user = new UserAction();
if(isset($_POST['sign-in'])){
    $userId = $user->loginValidation($_POST['username'],$_POST['password']);
    if($userId != null){
        session_start();
        $data = $user->viewAUser($userId);
        foreach($data as $dat){
            $_SESSION['id'] = $dat['id'];
            $_SESSION['img'] = $dat['img'];
            $_SESSION['fullname'] = $dat['fullName'];
            switch ($dat['adminLevel']) {
                case 1:
                $_SESSION['adminLevel'] = "Super Admin";
                  break;
                case 2:
                $_SESSION['adminLevel'] = "Admin";
                  break;
                case 3:
                $_SESSION['adminLevel'] = "User";
                  break;
                default:
                $_SESSION['adminLevel'] = "Guest";
              }
        }
        header('Location:dashboard.php');
    }else{
        $error = "Invalid Username or Password";
    }
}
?>
<div class="container " style="min-width:500px;margin-top: 90px;">
    <div class="shadow-lg px-4  mx-auto my-5 w3-animate-opacity" style="width:450px;height:600px;border-radius: 1.5%;background:#ececec;">
        <div class=" box mt-5 text-white">
            <br>
            <hr>
            <div class="mb-5 text-center">
                <img src="src/img/logo.png" class="" alt="Profile" style="width:120px;">
            </div>
            <form method="POST" action="index.php">
                <div class="inputBox">
                    <input type="text" name="username" required value="">
                    <div class="line"></div>
                    <label><i class="fa fa-user"></i>&nbsp;Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required value="">
                    <div class="line"></div>
                    <label><i class="fa fa-lock "></i>&nbsp;Password</label>
                </div>
                    <input class="btn btn-block" type="submit" name="sign-in" value="Sign In">
                    <div class = "text-danger text-center mt-4"><?php echo $error??""?></div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>