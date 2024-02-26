<?php
// LOGOUT
function logoutUser()
    {
        if ($_GET['logout'] == 1) {
            session_destroy();
            header("location: login.php");
            exit; // Prevent further execution
        }
    }
// END LOGOUT
?>