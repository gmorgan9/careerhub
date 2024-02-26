<?php
// LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.php");
    exit; // Prevent further execution
}
// END LOGOUT
?>