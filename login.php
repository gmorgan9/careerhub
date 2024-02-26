<?php

require_once "app/database/connection.php";
require_once "app/functions/login.php";
require_once "path.php";
session_start();

// $files = glob("app/functions/*.php");
// foreach ($files as $file) {
//     require_once $file;
// }

if(isset($_POST['login'])){
    loginUser($conn); // Assuming $conn is your database connection
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/loginpage.css?v=<?php echo time(); ?>">

  <!-- Page Title -->
  <title>Sign In | JMS</title>

</head>

<body>
    <div class="main" style="height: 450px;">
        <p class="sign">Sign in</p>
        <p class="sub_sign">Job Application Management System</p>
        <?php
            if(isset($error)){
                foreach($error as $err){
                    echo '<div class="alert alert-danger error-msg" role="alert">'.$err.'</div>';
                }
            }
        ?>
        <form class="form1" method="POST">
            <input class="un " type="text" placeholder="Username" name="uname">
            <input class="pass" type="password" style="align: center;" placeholder="Password" name="password">
            <input type="submit" name="login-btn" value="Login" class="submit">
            <p class="forgot"><a href="#">Forgot Password?</a></p>
            <p class="signup">Dont have an account? <a href="#">Sign up</a></p>          
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/loginpage.js"></script>
     
</body>

</html>