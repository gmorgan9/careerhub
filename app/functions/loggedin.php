<?php


function isLoggedIn()
{
    if (isset($_SESSION['fname'])) {
        return true;
    } else {
        return false;
    }
}

// Debugging
var_dump(isLoggedIn());



?>