<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "app/functions/loggedin.php";
require_once "path.php";
session_start();

// $files = glob("app/functions/*.php");
// foreach ($files as $file) {
//     require_once $file;
// }

if (!isLoggedIn()) {
    header('Location: login.php');
    exit; // Make sure to stop script execution after redirection
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
        /* end top card overlay */
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
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="recordJobDropdown" data-bs-toggle="dropdown" data-bs-target="#recordJobDropdown" aria-haspopup="true" aria-expanded="false">
        Add Application
    </button>
    <div class="dropdown-menu" aria-labelledby="recordJobDropdown">
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#quickModal">Quick</a>
        <a class="dropdown-item" href="create-app.php">In-depth</a>
    </div>
    </div>
</div>

<!-- Quick Modal -->
    <div class="modal fade" id="quickModal" tabindex="-1" aria-labelledby="quickModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="quickModalLabel">Quick Application Creation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="" method="POST">
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" id="job_title" name="job_title">
            </div>
            <div class="form-group">
                <label for="company">Company:</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="job_type">Job Type:</label>
                <input type="text" class="form-control" id="job_type" name="job_type">
            </div>
            <div class="form-group">
                <label for="app_link">Application Link:</label>
                <input type="text" class="form-control" id="app_link" name="app_link">
            </div>
            <br>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="watchlist" name="watchlist" value="1">
                    <label class="form-check-label" for="watchlist">Add to Watchlist</label>
                </div>
            </div>
            
            
        </div>
        <div class="modal-footer">
            <button type="submit" name="add-quick" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
        </div>
    </div>
    </div>
<!-- end Quick Modal -->




    <?php if (isset($_SESSION['fname'])) : ?>
    	<h1 style="margin-left: 175px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
    <?php endif ?>
    <br>







 <!-- main-container -->
 <div class="container-fluid main">

    <!-- Top Row -->
        <div class="row d-flex justify-content-center">
        <!-- Open/Awaiting -->
            
            <div class="card top-card me-2" style="width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="open-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightgreen; height: 100%; width: 110px; margin-left: -12px; border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
                        </div>
                        <div class="right float-end mt-2" style="margin-right: 30px !important;">
                            <div class="pt-3"></div>
                            <h5 class="card-text text-center">
                                <?php
                                $sql="select count('1') from applications where status='Applied'";
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
            <div class="card top-card me-2" style="width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="offer-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightblue; height: 100%; width: 110px; margin-left: -12px;border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-check d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
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
            <div class="card top-card me-2" style="width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="declined-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightpink; height: 100%; width: 110px; margin-left: -12px;border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-x d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
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
            <div class="card top-card" style="width: 18rem;">
                <a class="text-decoration-none text-black stretched-link" href="total-app.php">
                    <div class="card-body p-0">
                        <div class="left float-start" style="background-color: lightsalmon; height: 100%; width: 110px; margin-left: -12px;border-top-left-radius: 0.325rem; border-bottom-left-radius: 0.325rem;">
                            <i class="bi bi-clipboard-data d-block mx-auto my-3" style="margin-left: 30px !important; margin-top: 20px !important; font-size: 48px;"></i>
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
                                        $status         = $row['status'];
                                        $job_title      = $row['job_title'];
                                        $company        = $row['company'];
                                        ?>
                                        <li class="list-group-item">
                                            <p class="float-start"><?php echo $job_title; ?> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                            <?php if($row['status'] == 'Applied'){ ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Interviewed') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Offered') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Rejected') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } ?>
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
                                        $status         = $row['status'];
                                        $job_title      = $row['job_title'];
                                        $company        = $row['company'];
                                        ?>
                                        <li class="list-group-item">
                                            <p class="float-start"><?php echo $job_title; ?> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                            <?php if($row['status'] == 'Applied'){ ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Interviewed') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Offered') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Rejected') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Interested') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-secondary"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } ?>
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
                            $sql = "SELECT * FROM applications ORDER BY updated_at DESC LIMIT 3";
                            $result = mysqli_query($conn, $sql);
                            if($result) {
                                $num_rows = mysqli_num_rows($result);
                                if($num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $status         = $row['status'];
                                        $job_title      = $row['job_title'];
                                        $company        = $row['company'];
                                        ?>
                                        <li class="list-group-item">
                                            <p class="float-start"><?php echo $job_title; ?> <br> <span class="text-muted" style="font-size: 11px;"><?php echo $company; ?></span> </p>
                                            <?php if($row['status'] == 'Applied'){ ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Interviewed') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Offered') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } else if($row['status'] == 'Rejected') { ?>
                                                    <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $row['status']; ?></span></p>
                                                <?php } ?>
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