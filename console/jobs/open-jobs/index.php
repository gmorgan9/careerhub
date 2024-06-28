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

    <title>Open Jobs - MorganServer Career Hub</title>

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
        <h2 class="text-white title">Open Jobs</h2>
    </div>

    <div class="content text-white" style="max-width: 1320px; margin-top: 55px;">
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Company</th>
                    <th scope="col">Location</th>
                    <th scope="col">Applied</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Enable error reporting
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    // Pagination variables
                    $limit = 10; // Number of entries per page
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;

                    // Debugging output
                    echo "<!-- Page: $page, Offset: $offset -->";

                    $sql = "SELECT * FROM jobs WHERE status = 'Applied' ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $num_rows = mysqli_num_rows($result);
                        echo "<!-- Number of rows fetched: $num_rows -->";
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['job_id'];
                                $idno = $row['idno'];
                                $status = $row['status'];
                                $job_title = $row['job_title'];
                                $company = $row['company'];
                                $location = $row['location'];
                                $created_at = $row['created_at'];
                                $utc_date_time = new DateTime($created_at, new DateTimeZone('UTC'));
                                $local_date_time = $utc_date_time->setTimezone(new DateTimeZone('America/Denver'));
                                $formatted_date = $local_date_time->format('M d, Y');
                ?>
                <tr>
                    <th scope="row"><?php echo $idno; ?></th>
                    <td><?php echo $job_title ?: '-'; ?></td>
                    <td><?php echo $company ?: '-'; ?></td>
                    <td><?php echo $location ?: '-'; ?></td>
                    <td><?php echo $formatted_date ?: '-'; ?></td>
                    <td><?php echo $status ?: '-'; ?></td>
                    <td style="font-size: 20px;">
                        <a href="<?php echo BASE_URL; ?>/console/jobs/open-jobs/?viewid=<?php echo $id; ?>" class="view" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $id; ?>" style="text-decoration: none;">
                            <i class="bi bi-eye text-success"></i>
                        </a>
                        &nbsp; 
                        <a href="/console/admin/update-job/?updateid=<?php echo $id; ?>" style="text-decoration: none;">
                            <i class="bi bi-pencil-square" style="color:#005382;"></i>
                        </a>
                        &nbsp;
                        <a href="open-app.php?deleteid=<?php echo $id; ?>" class="delete" style="text-decoration: none;">
                            <i class="bi bi-trash" style="color:#941515;"></i>
                        </a>
                    </td>
                </tr>

                <!-- VIEW Modal -->
                <div class="modal fade" id="viewModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background-color: #333;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel">View Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                    $new = "SELECT * FROM jobs WHERE job_id=$id";
                                    $new1 = mysqli_query($conn, $new);
                                    if ($new1) {
                                        while ($cap = mysqli_fetch_assoc($new1)) {
                                ?>
                                <!-- Display the content of the selected entry -->
                                <div>
                                    <h5 class="float-start">Job Details</h5>
                                    <div class="float-end">
                                        <?php if ($cap['watchlist'] == 1) { ?>
                                            <i class="bi bi-eye text-muted"></i>
                                        <?php } ?>
                                        <?php if ($cap['interview_set'] == 1) { ?>
                                            <i class="bi bi-people"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Status</p> 
                                    <?php if ($cap['status'] == 'Applied') { ?>
                                        <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                    <?php } else if ($cap['status'] == 'Interviewed') { ?>
                                        <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                    <?php } else if ($cap['status'] == 'Offered') { ?>
                                        <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                    <?php } else if ($cap['status'] == 'Rejected') { ?>
                                        <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                    <?php } ?>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Connected Emails</p>
                                    <p><span class="float-end">
                                        <?php
                                            $count = "SELECT COUNT(*) as email_count FROM email_application WHERE job_id='$id'";
                                            $count_result = mysqli_query($conn, $count);
                                            $rtotal = mysqli_fetch_assoc($count_result);
                                            $email_count = $rtotal['email_count'];
                                            echo $email_count < 10 ? "0$email_count" : $email_count;
                                        ?>
                                    </span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Job Title</p> 
                                    <p><span class="float-end"><?php echo $cap['job_title']; ?></span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Company</p> 
                                    <p><span class="float-end"><?php echo $cap['company']; ?></span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Location</p>
                                    <p><span class="float-end"><?php echo $cap['location']; ?></span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Job Link</p> 
                                    <p><a target="_blank" href="<?php echo $cap['job_link']; ?>" class="float-end">Link Here</a></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Job Type</p> 
                                    <p><span class="float-end"><?php echo $cap['job_type']; ?></span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Base Pay</p> 
                                    <p><span class="float-end"><?php echo $cap['pay']; ?></span></p>
                                </div>
                                <br>
                                <div class="ms-3 me-3">
                                    <p class="float-start fw-bold">Bonus Pay</p> 
                                    <p><span class="float-end"><?php echo $cap['bonus_pay']; ?></span></p>
                                </div>
                                <br><br>
                                <div class="ms-3 me-3">
                                    <p class="fw-bold">Notes</p> 
                                    <p><span><?php echo $cap['notes']; ?></span></p>
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end VIEW Modal -->

                <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'>No jobs found.</td></tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                ?>
            </tbody>
        </table>
        <br>
        <?php
            // Pagination links
            $sql = "SELECT COUNT(*) as total FROM jobs WHERE status = 'Applied'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_pages = ceil($row["total"] / $limit);

            echo '<ul class="pagination justify-content-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($page == $i) ? "active" : "";
                echo "<li class='page-item {$active}'><a class='page-link' href='?page={$i}'>{$i}</a></li>";
            }
            echo '</ul>';
        ?>
    </div>
</div>
<!-- END main-container -->






            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>