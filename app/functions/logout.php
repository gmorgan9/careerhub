<?php
// LOGOUT
function logoutUser()
    {
        if ($_GET['logout'] == 1) {
            $uname = $_SESSION['username'];
            $sql = "UPDATE users SET logged_in='0' WHERE uname='$uname'";
            mysqli_query($conn, $sql)
            session_destroy();
            header("location: login.php");
            exit; // Prevent further execution
        }
    }
// END LOGOUT
?>