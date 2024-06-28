<?php
date_default_timezone_set('America/Denver');
require_once "../app/database/connection.php";
require_once "../path.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/home.css?v=<?php echo time(); ?>">


    <title>Console - MorganServer Career Hub</title>

</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">
        <h2 class="text-white title">
            MorganServer Career Hub Console
        </h2>
    </div>

    <div class="container-fluid">
        

        <div class="content text-white" style="max-width: 1400px; margin: 0 auto; margin-top: 55px;">

            <!-- Top Row -->
                <div class="card-container justify-content-center mx-auto">
                <!-- Open/Awaiting -->
                <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem; background-color: #333333;">
                    <a class="text-decoration-none stretched-link" href="/console/jobs/open-jobs">
                        <div class="card-body p-0">
                            <div class="left float-start" style="background-color: lightgreen; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                                <i class="bi bi-clipboard d-block mx-auto my-3 ms-4 me-4 text-black" style=" margin-top: 20px !important; font-size: 48px;"></i>
                            </div>
                            <div class="right float-end mt-2 text-white" style="margin-right: 30px !important;">
                                <div class="pt-3"></div>
                                <h5 class="card-text text-center">
                                    <?php
                                    $sql="select count('1') from jobs where status='Applied' || status='Interested'";
                                    $result=mysqli_query($conn,$sql);
                                    $rowtotal=mysqli_fetch_array($result); 
                                    if($rowtotal[0] < 10) {
                                        echo "0$rowtotal[0]";
                                    } else {
                                        echo "$rowtotal[0]";
                                    }
                                    ?>
                                </h5>
                                <p class="card-title text-center">Open/Awaiting</p>
                                <div class="overlay-text">
                                    View Details
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end Open/Awaiting -->

                <!-- Recieved Offer -->
                <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem; background-color: #333333;">
                    <a class="text-decoration-none stretched-link" href="/console/jobs/offer-jobs">
                        <div class="card-body p-0">
                            <div class="left float-start" style="background-color: lightblue; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                                <i class="bi bi-clipboard-check d-block mx-auto my-3 ms-4 me-4 text-black" style="margin-top: 20px !important; font-size: 48px;"></i>
                            </div>

                            <div class="right float-end mt-2 text-white" style="margin-right: 30px !important;">
                                <div class="pt-3"></div>
                                <h5 class="card-text text-center">
                                    <?php
                                        $sql="select count('1') from jobs where status='Offered'";
                                        $result=mysqli_query($conn,$sql);
                                        $rowtotal=mysqli_fetch_array($result); 
                                        if($rowtotal[0] < 10) {
                                            echo "0$rowtotal[0]";
                                        } else {
                                            echo "$rowtotal[0]";
                                        }
                                    ?>
                                </h5>
                                <p class="card-title text-center">Recevied Offer</p>
                                <div class="overlay-text">
                                        View Details
                                    </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end Received Offer -->

                <!-- Declined -->
                <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem; background-color: #333333;">
                    <a class="text-decoration-none stretched-link" href="/console/jobs/declined-jobs">
                        <div class="card-body p-0">
                            <div class="left float-start" style="background-color: lightpink; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                                <i class="bi bi-clipboard-x d-block mx-auto my-3 ms-4 me-4 text-black" style="margin-top: 20px !important; font-size: 48px;"></i>
                            </div>

                            <div class="right float-end mt-2 text-white" style="margin-right: 55px !important;">
                                <div class="pt-3"></div>
                                <h5 class="card-text text-center">
                                    <?php
                                        $sql="select count('1') from jobs where status='Rejected'";
                                        $result=mysqli_query($conn,$sql);
                                        $rowtotal=mysqli_fetch_array($result); 
                                        if($rowtotal[0] < 10) {
                                            echo "0$rowtotal[0]";
                                        } else {
                                            echo "$rowtotal[0]";
                                        }
                                    ?>
                                </h5>
                                <p class="card-title text-center">Rejected</p>
                                <div class="overlay-text">
                                    View Details
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end Declined -->

                <!-- Total -->
                <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem; background-color: #333333;">
                    <a class="text-decoration-none stretched-link" href="/console/jobs/total-jobs">
                        <div class="card-body p-0">
                            <div class="left float-start" style="background-color: lightsalmon; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                                <i class="bi bi-clipboard-data d-block mx-auto my-3 me-4 ms-4 text-black" style="margin-top: 20px !important; font-size: 48px;"></i>
                            </div>

                            <div class="right float-end mt-2 text-white" style="margin-right: 55px !important;">
                                <div class="pt-3"></div>
                                <h5 class="card-text text-center">
                                    <?php
                                        $sql="select count('1') from jobs";
                                        $result=mysqli_query($conn,$sql);
                                        $rowtotal=mysqli_fetch_array($result); 
                                        if($rowtotal[0] < 10) {
                                            echo "0$rowtotal[0]";
                                        } else {
                                            echo "$rowtotal[0]";
                                        }
                                    ?>
                                </h5>
                                <p class="card-title text-center">Total Jobs</p>
                                <div class="overlay-text">
                                    View Details
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end Total -->
                </div>
            <!-- end Top Row -->

            <div class="mt-5"></div>
            <hr>
            <div class="mt-5"></div>

            <!-- Bottom Row -->
                <div class="row justify-content-center mx-auto" style="margin-left: 2% !important;">
                    <!-- first table -->
                        <div class="card p-0 me-2" style="width: 25rem; background-color: #333333;">
                            <div class="card-header">
                                <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">latest jobs</span> 
                            </div>
                            <div class="card-body">
                                <!-- only allow three -->
                                <ul class="list-group">
                                    <?php
                                    $sql = "SELECT * FROM jobs ORDER BY created_at DESC LIMIT 3";
                                    $result = mysqli_query($conn, $sql);
                                    if($result) {
                                        $num_rows = mysqli_num_rows($result);
                                        if($num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $job_id         = $row['job_id'];
                                                $status         = $row['status'];
                                                $job_title      = $row['job_title'];
                                                $company        = $row['company'];
                                                ?>
                                                <li class="list-group-item text-white" style="background-color: #333333; border-color: #444444;">
                                                        <p class="float-start"><div class="d-inline-block text-truncate" style="max-width: 180px;"><?php echo $job_title; ?></div> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                                        <?php if($row['status'] == 'Applied'){ ?>
                                                            <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-primary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                        <?php } else if($row['status'] == 'Interviewed') { ?>
                                                            <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-info"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                        <?php } else if($row['status'] == 'Offered') { ?>
                                                            <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-success"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                        <?php } else if($row['status'] == 'Rejected') { ?>
                                                            <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-danger"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                        <?php } else if($row['status'] == 'Interested') { ?>
                                                            <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-secondary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                        <?php } ?>
                                                        <a href="/console/jobs/view-job/?viewid=<?php echo $job_id; ?>" class="text-decoration-none stretched-link"></a>
                                                </li>
                                            <?php 
                                            }
                                        } else { ?>
                                            <h3 class="mt-2 text-center text-muted">
                                                No Entries
                                            </h3>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <!-- end first table -->

                    <!-- second table -->
                        <div class="card p-0 me-2" style="width: 25rem; background-color: #333333;">
                            <div class="card-header">
                                <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">watch list</span>
                            </div>
                            <div class="card-body">
                                <!-- only allow three -->
                                <ul class="list-group">
                                    <?php
                                    $sql = "SELECT * FROM jobs WHERE watchlist = 1 LIMIT 3";
                                    $result = mysqli_query($conn, $sql);
                                    if($result) {
                                        $num_rows = mysqli_num_rows($result);
                                        if($num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $job_id         = $row['job_id'];
                                                $status         = $row['status'];
                                                $job_title      = $row['job_title'];
                                                $company        = $row['company'];
                                                ?>
                                                <li class="list-group-item text-white" style="background-color: #333333; border-color: #444444;">
                                                    <p class="float-start"><div class="d-inline-block text-truncate" style="max-width: 180px;"><?php echo $job_title; ?></div> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                                    <?php if($row['status'] == 'Applied'){ ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-primary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Interviewed') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-info"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Offered') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-success"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Rejected') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-danger"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Interested') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-secondary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } ?>
                                                    <a href="/console/jobs/view-job/?viewid=<?php echo $job_id; ?>" class="text-decoration-none stretched-link"></a>
                                                </li>
                                            <?php 
                                            }
                                        } else { ?>
                                            <h3 class="mt-2 text-center text-muted">
                                                No Entries
                                            </h3>
                                        <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    <!-- end second table -->

                    <!-- third table -->
                        <div class="card p-0" style="width: 25rem; background-color: #333333;">
                            <div class="card-header">
                                <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">latest updated</span>
                            </div>
                            <div class="card-body">
                                <!-- only allow three -->
                                <ul class="list-group">

                                    <?php

                                    function time_elapsed_string($updated_at, $current_time = null, $full = false) {
                                        // If current time is not provided, use the current time
                                        if ($current_time === null) {
                                            $current_time = new DateTime('now', new DateTimeZone('America/Chicago'));
                                        } else {
                                            $current_time = new DateTime($current_time, new DateTimeZone('America/Chicago'));
                                        }

                                        $updated_at = new DateTime($updated_at, new DateTimeZone('America/Chicago'));

                                        $diff = $current_time->diff($updated_at);
                                    
                                        $diff->w = floor($diff->d / 7);
                                        $diff->d -= $diff->w * 7;
                                    
                                        $string = array(
                                            'y' => 'yr',
                                            'm' => 'mon',
                                            'w' => 'wk',
                                            'd' => 'day',
                                            'h' => 'hr',
                                            'i' => 'min',
                                            's' => 'sec',
                                        );
                                    
                                        foreach ($string as $k => &$v) {
                                            if ($diff->$k) {
                                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                            } else {
                                                unset($string[$k]);
                                            }
                                        }
                                    
                                        if (!$full) {
                                            $string = array_slice($string, 0, 1);
                                        }
                                    
                                        return $string ? implode(', ', $string) . ' ago' : 'Just now';
                                    }
                                
                                    $sql = "SELECT * FROM jobs ORDER BY updated_at DESC LIMIT 3";
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        $num_rows = mysqli_num_rows($result);
                                        if ($num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $job_id     = $row['job_id'];
                                                $status     = $row['status'];
                                                $job_title  = $row['job_title'];
                                                $company    = $row['company'];
                                                $updated_at = $row['updated_at']; // No need to convert to timestamp

                                                $time_ago = time_elapsed_string($updated_at);
                                                ?>
                                                <li class="list-group-item text-white" style="background-color: #333333; border-color: #444444;">
                                                <p class="float-start"><div class="d-inline-block text-truncate" style="max-width: 180px;"><?php echo $job_title; ?></div> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                                    <?php if($row['status'] == 'Applied'){ ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-primary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Interviewed') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-info"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Offered') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-success"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Rejected') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-danger"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } else if($row['status'] == 'Interested') { ?>
                                                        <p><span class="float-end" style="margin-top: -75px;"><i style="font-size: 12px;" class="bi bi-circle-fill text-secondary"></i>&nbsp;<span style="font-size: 12px;"><?php echo $row['status']; ?></span></span></p>
                                                    <?php } ?>
                                                    <a href="/console/jobs/view-job/?viewid=<?php echo $job_id; ?>" class="text-decoration-none stretched-link"></a>
                                                    <p class="float-end text-muted" style="font-size: 11px; margin-top: -15px; margin-bottom: -15px;"><?php echo $time_ago; ?></p>
                                                </li>
                                            <?php
                                            }
                                        } else { ?>
                                            <h3 class="mt-2 text-center text-muted">
                                                No Entries
                                            </h3>
                                    <?php }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>



                    <!-- end third table -->

                </div>
            <!-- end Bottom Row -->

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>