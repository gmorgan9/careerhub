<?php

// DELETE
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM applications WHERE app_id=$id";
    $result = mysqli_query($conn, $sql);
}
// END DELETE

?>