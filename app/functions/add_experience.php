<?php

if (isset($_POST['add-experience'])) {
    $idno = rand(1000000, 9999999);
    
    if(isset($_POST['ce_company'])) { $ce_company = mysqli_real_escape_string($conn, $_POST['ce_company']); } else { $ce_company = ""; }
    if(isset($_POST['ce_start'])) { $ce_start = mysqli_real_escape_string($conn, $_POST['ce_start']); } else { $ce_start = ""; }
    if(isset($_POST['ce_end'])) { $ce_end = mysqli_real_escape_string($conn, $_POST['ce_end']); } else { $ce_end = ""; }
    if(isset($_POST['ce_job_title'])) { $ce_job_title = mysqli_real_escape_string($conn, $_POST['ce_job_title']); } else { $ce_job_title = ""; }
    if(isset($_POST['ce_job_duties'])) { $ce_job_duties = mysqli_real_escape_string($conn, $_POST['ce_job_duties']); } else { $ce_job_duties = ""; }
    // if(isset($_POST['ce_status'])) { $ce_status = mysqli_real_escape_string($conn, $_POST['ce_status']); } else { $ce_status = ""; }
    if(isset($_POST['ce_notes'])) { $ce_notes = mysqli_real_escape_string($conn, $_POST['ce_notes']); } else { $ce_notes = ""; }
    

    $select = "SELECT * FROM career_experience WHERE idno = '$idno'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'The experience already exists!';
    } else {
        $insert = "INSERT INTO career_experience (idno, ce_company, ce_start, ce_end, ce_job_title, ce_job_duties, ce_notes) VALUES ('$idno', NULLIF('$ce_company',''), NULLIF('$ce_start',''), NULLIF('$ce_end',''), NULLIF('$ce_job_title',''), NULLIF('$ce_job_duties',''), NULLIF('$ce_notes',''))";
        mysqli_query($conn, $insert);
        header('location:' . BASE_URL . '/console/experience');
    }
}


?>