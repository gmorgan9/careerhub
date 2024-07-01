<?php
if (isset($_POST['update-experience'])) {
    $id = $_POST['ce_id'];

    // Sanitize input fields
    $ce_company = isset($_POST['ce_company']) ? mysqli_real_escape_string($conn, $_POST['ce_company']) : "";
    $ce_start = isset($_POST['ce_start']) ? mysqli_real_escape_string($conn, $_POST['ce_start']) : "";
    $ce_end = isset($_POST['ce_end']) ? mysqli_real_escape_string($conn, $_POST['ce_end']) : "";
    $ce_job_title = isset($_POST['ce_job_title']) ? mysqli_real_escape_string($conn, $_POST['ce_job_title']) : "";
    $ce_job_duties = isset($_POST['ce_job_duties']) ? mysqli_real_escape_string($conn, $_POST['ce_job_duties']) : "";
    $ce_status = isset($_POST['ce_status']) ? mysqli_real_escape_string($conn, $_POST['ce_status']) : "";
    $ce_notes = isset($_POST['ce_notes']) ? mysqli_real_escape_string($conn, $_POST['ce_notes']) : "";

    $select = "SELECT * FROM career_experience WHERE idno = '$idno'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'Job already exists!';
    } else {
        $update = "UPDATE career_experience SET 
                    ce_company = NULLIF('$ce_company', ''), 
                    ce_start = NULLIF('$ce_start', ''), 
                    ce_end = NULLIF('$ce_end', ''), 
                    ce_job_title = NULLIF('$ce_job_title', ''), 
                    ce_job_duties = NULLIF('$ce_job_duties', ''), 
                    ce_status = NULLIF('$ce_status', ''), 
                    ce_notes = NULLIF('$ce_notes', '')
                   WHERE ce_id = '$id';";

        mysqli_query($conn, $update);
        header('location:' . BASE_URL . '/console/admin/experience');
    }
}

?>