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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>">
    <!-- new -->
    <link rel="stylesheet" href="../../assets/css/home.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Job Management System</title>


    <style>
        /* top card overlay */
            .top-card {
                position: relative;
            }

            .top-card:hover::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(107, 107, 107, 0.75);
                border-radius: 0.325rem;
            }

            .top-card:hover .overlay-text {
                visibility: visible;
                opacity: 1;
            }

            .overlay-text {
                color: white;
                font-weight: bold;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                visibility: hidden;
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }

            .card-container {
                width: 75%;
                display: flex;
        }
        
        .card {
            width: calc(25%);
            margin-bottom: 20px;
        }
        
        @media (max-width: 1366px) {
            .card-container {
                flex-wrap: wrap;
            }
            .card {
                width: 100%; /* 50% width on tablets */
            }
        }
        /* end top card overlay */
    </style>
    
</head>
<body style="background-color: rgb(34,34,34);">
<?php //include(ROOT_PATH . "/app/database/includes/header.php"); ?>

    <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
            <div class="left">
                <a href="/home" class="text-white text-decoration-none">
                    <img src="../../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
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

<?php if (isset($_SESSION['fname'])) : ?>
    <h1 class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
<?php endif ?>
<br>



    <!-- Top Row -->
        <div class="card-container justify-content-center mx-auto">

        <!-- Open/Awaiting -->
            
            <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="open-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightgreen; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard d-block mx-auto my-3 ms-4 me-4" style=" margin-top: 20px !important; font-size: 48px;"></i>
                        </div>
                        <div class="right float-end mt-2" style="margin-right: 30px !important;">
                            <div class="pt-3"></div>
                            <h5 class="card-text text-center">
                                <?php
                                $sql="select count('1') from applications where status='Applied' || status='Interested'";
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
            <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="offer-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightblue; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-check d-block mx-auto my-3 ms-4 me-4" style="margin-top: 20px !important; font-size: 48px;"></i>
                        </div>

                        <div class="right float-end mt-2" style="margin-right: 30px !important;">
                            <div class="pt-3"></div>
                            <h5 class="card-text text-center">
                                <?php
                                    $sql="select count('1') from applications where status='Offered'";
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
            <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="declined-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightpink; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-x d-block mx-auto my-3 ms-4 me-4" style="margin-top: 20px !important; font-size: 48px;"></i>
                        </div>

                        <div class="right float-end mt-2" style="margin-right: 40px !important;">
                            <div class="pt-3"></div>
                            <h5 class="card-text text-center">
                                <?php
                                    $sql="select count('1') from applications where status='Rejected'";
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
            <div class="card top-card me-2" style="min-width: 18rem; max-width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="total-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightsalmon; height: 100%; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-data d-block mx-auto my-3 me-4 ms-4" style="margin-top: 20px !important; font-size: 48px;"></i>
                        </div>

                        <div class="right float-end mt-2" style="margin-right: 18px !important;">
                            <div class="pt-3"></div>
                            <h5 class="card-text text-center">
                                <?php
                                    $sql="select count('1') from applications";
                                    $result=mysqli_query($conn,$sql);
                                    $rowtotal=mysqli_fetch_array($result); 
                                    if($rowtotal[0] < 10) {
                                        echo "0$rowtotal[0]";
                                    } else {
                                        echo "$rowtotal[0]";
                                    }
                                ?>
                            </h5>
                            <p class="card-title text-center">Total Applications</p>
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

    <br><br>
    <hr>
    <br><br>

    <!-- Bottom Row -->
        <div class="row d-flex justify-content-center">
            <!-- first table -->
                <div class="card p-0 me-2" style="width: 25rem;">
                    <div class="card-header">
                        <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">latest applications</span> 
                    </div>
                    <div class="card-body">
                        <!-- only allow three -->
                        <ul class="list-group">
                            <?php
                            $sql = "SELECT * FROM applications ORDER BY created_at DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            if($result) {
                                $num_rows = mysqli_num_rows($result);
                                if($num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $app_id         = $row['app_id'];
                                        $status         = $row['status'];
                                        $job_title      = $row['job_title'];
                                        $company        = $row['company'];
                                        ?>
                                        <li class="list-group-item">
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
                                                <a href="view-app.php?viewid=<?php echo $app_id; ?>" class="text-decoration-none stretched-link"></a>
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
                <div class="card p-0 me-2" style="width: 25rem;">
                    <div class="card-header">
                        <i class="bi bi-grid-3x3-gap-fill"></i> &nbsp; <span style="text-transform: uppercase; font-weight: bold;">watch list</span>
                    </div>
                    <div class="card-body">
                        <!-- only allow three -->
                        <ul class="list-group">
                            <?php
                            $sql = "SELECT * FROM applications WHERE watchlist = 1 LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            if($result) {
                                $num_rows = mysqli_num_rows($result);
                                if($num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $app_id         = $row['app_id'];
                                        $status         = $row['status'];
                                        $job_title      = $row['job_title'];
                                        $company        = $row['company'];
                                        ?>
                                        <li class="list-group-item">
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
                                            <a href="view-app.php?viewid=<?php echo $app_id; ?>" class="text-decoration-none stretched-link"></a>
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
                <div class="card p-0" style="width: 25rem;">
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
                        
                            $sql = "SELECT * FROM applications ORDER BY updated_at DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $num_rows = mysqli_num_rows($result);
                                if ($num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $app_id     = $row['app_id'];
                                        $status     = $row['status'];
                                        $job_title  = $row['job_title'];
                                        $company    = $row['company'];
                                        $updated_at = $row['updated_at']; // No need to convert to timestamp

                                        $time_ago = time_elapsed_string($updated_at);
                                        ?>
                                        <li class="list-group-item">
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
                                            <a href="view-app.php?viewid=<?php echo $app_id; ?>" class="text-decoration-none stretched-link"></a>
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
<!-- END main-container -->






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>