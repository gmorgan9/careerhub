<?php
// LOGOUT
function logoutUser($conn)
{
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
        exit; // Prevent further execution
    }
}
// END LOGOUT
?>