<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

// if (!isLoggedIN()) {
// 	header('location: login.php');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css?v=1.77">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>

    <style>
        
    </style>
    
</head>
<body>

<div class="header">
        <h3 class="logo ms-3 me-3 pt-1">
            <a class="text-decoration-none text-white" href="/">Job Management System</a>
            <a class="float-end" href="index.php?logout='1'"><button style="cursor:pointer;" class="btn btn-link text-white"><i class="bi bi-box-arrow-left fs-5"></i></button></a>
        </h3>
    </div>
<br>
<div class="record_incident float-end me-5">
    <a href="/"><button class="btn btn-secondary rec">Home</button></a>
</div>







 <!-- main-container -->
 <div class="container-fluid main" style="background-color: rgb(240, 240, 240); max-width: 80%; border-radius: 15px;">

<br><br>

    <?php
            $id = $_GET['viewid'];
            $sql = "SELECT * FROM applications WHERE app_id=$id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $num_rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $app_id          = $row['app_id'];
                    $job_title      = $row['job_title'];
                    $comapny        = $row['company'];
                    $location       = $row['location'];
                    $job_desc       = $row['job_desc'];
                    $pay            = $row['pay'];
                    $bonus_pay      = $row['bonus_pay'];
                    $status         = $row['status'];
                    $job_type       = $row['job_type'];
                    $app_link       = $row['app_link'];
                    $contact_name   = $row['contact_name'];
                    $contact_phone  = $row['contact_phone'];
                    $contact_email  = $row['contact_email'];
                    $start_date     = $row['start_date'];
                    $resume_used    = $row['resume_used'];
                    $notes          = $row['notes'];
                    $watchlist      = $row['watchlist'];
                    $interview_set  = $row['interview_set'];
    ?>







    <?php } } ?>



</div>
<!-- END main-container -->

<br><br><br>








</body>
</html>