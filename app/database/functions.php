<?php

session_start();
require('connection.php');

// login function
    function loginUser($conn)
    {
        if(isset($_POST['login'])){
            $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = md5($_POST['password']);
            $loggedin = $_POST['logged_in'];

            $select = "SELECT * FROM users WHERE uname = '$uname' && password = '$password'";

            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $sql = "UPDATE users SET logged_in='1' WHERE uname='$uname'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['fname']        = $row['fname'];
                    $_SESSION['user_id']      = $row['user_id'];
                    $_SESSION['loggedin']     = $row['loggedin'];
                    $_SESSION['user_idno']    = $row['idno'];
                    $_SESSION['lastname']     = $row['lname'];
                    $_SESSION['username']     = $row['uname'];
                    $_SESSION['email']        = $row['email'];
                    $_SESSION['pass']         = $row['password'];
                    $_SESSION['loggedin']     = true;
                    header('location:' . BASE_URL . '/');
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                $error = '
                <div class="pt-3"></div>
                <div class="login_error">
                <strong>Error:</strong> 
                The username <strong>'. $_POST['uname'] .'</strong> or password entered is not registered on this site. Please try again.
                </div>
                ';
            }
        }
    }
// login function

// logged in function
    function isLoggedIn()
    {
        if (isset($_SESSION['fname'])) {
            return true;
        } else {
            return false;
        }
    }
// logged in function

// logout function
    // function logoutUser($conn)
    // {
    //     if (isset($_POST['logout'])) {
    //         session_destroy();
    //         header("location: login.php");
    //         exit; // Prevent further execution
    //     }
    // }
    if (isset($_GET['logout'])) {
		session_destroy();
		header("location: login.php");
	}
// logout function

?>