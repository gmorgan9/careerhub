<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}
logoutUser($conn);
if(isLoggedIn() == false) {
    header('location:' . BASE_URL . '/login.php');
}

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
        .application-details {
            background-color: rgb(240, 240, 240);
            max-width: 80%;
            border-radius: 15px;
            padding: 20px;
            margin: 20px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .application-details h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .detail-label {
            font-weight: bold;
        }

        .detail-value {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php include(ROOT_PATH . "/app/database/includes/header.php"); ?>

<div class="container-fluid main">
    <div class="application-details">
        <?php
        $id = $_GET['viewid'];
        $sql = "SELECT * FROM applications WHERE app_id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num_rows = mysqli_num_rows($result);
            while ($row = mysqli_fetch_assoc($result)) {
                $job_title = $row['job_title'];
                $company = $row['company'];
                $location = $row['location'];
                $pay = $row['pay'];
                $bonus_pay = $row['bonus_pay'];
                $status = $row['status'];
                $job_type = $row['job_type'];
                $app_link = $row['app_link'];
                $notes = $row['notes'];
                $watchlist = $row['watchlist'];
                $interview_set = $row['interview_set'];
                $created_at = $row['created_at'];
                $updated_at = $row['updated_at'];
                ?>

                <h2><?php echo $job_title; ?></h2>
                <?php 
                    $timestamp = strtotime($updated_at);
                    $updated_at_formatted = date('M j, Y', $timestamp);
                ?>
                <div class="detail-label">Last updated: <div class="detail-value"><?php echo $updated_at_formatted; ?></div></div>
                
                <div class="detail-label">Company:</div>
                <div class="detail-value"><?php echo $company; ?></div>
                <div class="detail-label">Location:</div>
                <div class="detail-value"><?php echo $location; ?></div>
                <div class="detail-label">Pay:</div>
                <div class="detail-value"><?php echo $pay; ?></div>
                <div class="detail-label">Bonus Pay:</div>
                <div class="detail-value"><?php echo $bonus_pay; ?></div>
                <div class="detail-label">Status:</div>
                <div class="detail-value"><?php echo $status; ?></div>
                <div class="detail-label">Job Type:</div>
                <div class="detail-value"><?php echo $job_type; ?></div>
                <div class="detail-label">Application Link:</div>
                <div class="detail-value"><?php echo $app_link; ?></div>
                <div class="detail-label">Notes:</div>
                <div class="detail-value"><?php echo $notes; ?></div>
                <div class="detail-label">Watchlist:</div>
                <div class="detail-value"><?php echo $watchlist; ?></div>
                <div class="detail-label">Interview Set:</div>
                <div class="detail-value"><?php echo $interview_set; ?></div>
                <div class="detail-label">Created At:</div>
                <div class="detail-value"><?php echo $created_at; ?></div>
                

            <?php }
        } ?>
    </div>
</div>

</body>
</html>
