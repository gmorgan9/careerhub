<?php

// DELETE
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM jobs WHERE job_id=$id";
    $result = mysqli_query($conn, $sql);
}
// END DELETE

?>