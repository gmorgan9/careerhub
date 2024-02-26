<?php

// DELETE
if(isset($_GET['app_id'])) {
    $id = $_GET['app_id'];

    $sql = "DELETE FROM applications WHERE app_id=$id";
    $result = mysqli_query($conn, $sql);
}
// END DELETE

?>