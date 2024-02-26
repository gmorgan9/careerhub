<?php

date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php";
require_once "../../path.php";
session_start();

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