<?php

// LOGOUT
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: login.php");
}
// END LOGOUT

?>