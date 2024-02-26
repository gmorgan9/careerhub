<?php

require_once "app/database/connection.php";
// require_once "app/database/functions.php";
require_once "path.php";
session_start();

// $files = glob("app/functions/*.php");
// foreach ($files as $file) {
//     require_once $file;
// }

// if (isLoggedIn()) {
// 	header('location: /');
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/pre.css?v=2.6">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Log In &lsaquo; JMS</title>
    

    <style>
        body {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="login-form">
        <h1 class="logo text-center">
            <img src="assets/images/main-logo.png" width="84px" height="84px" alt="">
        </h1>
        <?php //echo $error; ?>
        <form class="form" action="" method="POST">
            <div class="username">
                <label for="user_login">Username</label>
                <input type="text" id="user_login" name="uname" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="password">
                <label for="user_pass">Password</label>
                <input type="password" id="user_pass" name="password" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="button text-end">
                <input type="submit" name="login" class="btn btn-primary" value="Log In">
            </div>
        </form>
        <br>
        <div class="bottom-links ms-4">
            <p><a class="link text-muted" style="text-decoration:none; font-size: 12px;" href="">Forgot password?</a></p>
        </div>
    </div>


</body>
</html>