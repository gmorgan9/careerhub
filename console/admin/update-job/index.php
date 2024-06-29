<?php
date_default_timezone_set('America/Denver');
require_once "../../../app/database/connection.php";
require_once "../../../path.php";
session_start();

$files = glob("../../../app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/home.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <title>Update Job - MorganServer Career Hub</title>

    <style>
        
    </style>
    
</head>
<body style="background-color: rgb(34,34,34);">


    <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
            <div class="left">
                <a href="/home" class="text-white text-decoration-none">
                    <img src="../../../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
                    &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
                </a>
            </div>
            <div class="right">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/">Career Hub</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" href="/console">Console</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -50px;">
                            <a class="dropdown-item" href="/console/admin/add-job">Add Job</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?logout=1">Settings</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    <!-- End Navbar -->

 <!-- main-container -->

 <div class="container w-100">
    <div class="page_title">
            <h2 class="text-white title">
                Update Job
            </h2>
        </div>
        
    <div class="content text-white" style="max-width: 1320px; margin: 0 auto; margin-top: 55px;">
<br>

    <?php
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM jobs WHERE job_id=$id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $num_rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $job_id         = $row['job_id'];
                    $job_title      = $row['job_title'];
                    $comapny        = $row['company'];
                    $location       = $row['location'];
                    $job_desc       = $row['job_desc'];
                    $pay            = $row['pay'];
                    $bonus_pay      = $row['bonus_pay'];
                    $status         = $row['status'];
                    $job_type       = $row['job_type'];
                    $job_link       = $row['job_link'];
                    $contact_name   = $row['contact_name'];
                    $contact_phone  = $row['contact_phone'];
                    $contact_email  = $row['contact_email'];
                    $start_date     = $row['start_date'];
                    $resume_used    = $row['resume_used'];
                    $notes          = $row['notes'];
                    $watchlist      = $row['watchlist'];
                    $interview_set  = $row['interview_set'];
    ?>

    <form method="POST" action="">

        <input type="hidden" class="form-input" id="job_id" name="job_id" value="<?php echo $job_id; ?>">

        <div class="row mb-3">
            <div class="col">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-input" id="job_title" name="job_title" value="<?php echo $job_title; ?>">
            </div>
            <div class="col">
                <label for="job_link" class="form-label">Job Link</label>
                <input type="text" class="form-input" id="job_link" name="job_link" value="<?php echo $job_link; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-input" id="company" name="company" value="<?php echo $comapny; ?>">
            </div>
            <div class="col">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-input" id="location" name="location" value="<?php echo $location; ?>">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <label for="pay" class="form-label">Pay</label>
                <input type="text" class="form-input" id="pay" name="pay" value="<?php echo $pay; ?>">
            </div>
            <div class="col">
                <label for="bonus_pay" class="form-label">Bonus Pay  <span class="text-muted" style="font-size: 10px;">Optional</span></label>
                <input type="text" class="form-input" id="bonus_pay" name="bonus_pay" value="<?php echo $bonus_pay; ?>">
            </div>
            <div class="col">
                <label class="form-label" for="status">Status</label>
                <select class="form-input" name="status">
                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                    <option value="Applied">Applied</option>
                    <option value="Interviewed">Interviewed</option>
                    <option value="Offered">Offered</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label" for="job_type">Job Type</label>
                <select class="form-input" name="job_type">
                    <option value="<?php echo $job_type; ?>"><?php echo $job_type; ?></option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                    <option value="Internship">Internship</option>
                    <option value="Temporary">Temporary</option>
                </select>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col">
                <label class="form-label" for="notes">Notes</label>
                <textarea class="form-input" name="notes" rows="5"><?php echo $notes; ?></textarea>
            </div>
        </div>

        

        <div class="row mb-3 ps-3">
            <div class="form-check">
                <?php if($watchlist == 1) { ?>
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1" checked>
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                <?php } else { ?>
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="0">
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                <?php } ?>

            </div>
            <div class="form-check">
                <?php if($interview_set == 1) { ?>
                    <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="1" checked>
                    <label class="form-check-label" for="interview_set">Interview Set</label>
                <?php } else { ?>
                    <input type="checkbox" class="form-check-input" id="interview_set" name="interview_set" value="0">
                    <label class="form-check-label" for="interview_set">Interview Set</label>
                <?php } ?>
            </div>
        </div>


    
        <button type="submit" name="update-full" class="form-btn">Update Job</button>
        <div class="pb-4"></div>
    </form>

    <?php

                
            }
        }

    ?>



</div>
<!-- END main-container -->

<br><br><br>






    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

</body>
</html>