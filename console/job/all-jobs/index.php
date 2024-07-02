<?php
date_default_timezone_set('America/Denver');
require_once "../../../app/database/connection.php";
require_once "../../../path.php";
session_start();

$files = glob("../../../app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

$limit = 10; // Number of entries per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM jobs ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);

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

    <title>All Jobs - MorganServer Career Hub</title>
</head>
<body style="background-color: rgb(34,34,34);">


    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">    
        <h2 class="text-white title">All Jobs</h2>
        <div class="float-end">
            <a class="all-btn" href="<?php echo BASE_URL; ?>/console/job/add-job">Add Job</a>
        </div>
    </div>

    <div class="container-fluid">
        

        <!-- <div class="content text-white" style="margin-top: 55px;"> -->
        <table class="table text-white w-75 mx-auto">
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
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id             = $row['job_id'];
                        $idno           = $row['idno'];
                        $job_title      = $row['job_title'];
                        $company        = $row['company'];
                        $location       = $row['location'];
                        $pay            = $row['pay'];
                        $bonus_pay      = $row['bonus_pay'];
                        $status         = $row['status'];
                        $watchlist      = $row['watchlist'];
                        $job_link       = $row['job_link'];
                        $job_type       = $row['job_type'];
                        $interview_set  = $row['interview_set'];
                        $notes          = $row['notes'];
                        $created_at     = $row['created_at'];
                        $updated_at     = $row['updated_at'];

                        $updated_time = strtotime($updated_at);
                        $updated_at_formatted = date('M j, Y', $updated_time);
                        $created_time = strtotime($created_at);
                        $created_at_formatted = date('M j, Y', $created_time);
                ?>
                        <tr>
                            <th scope="row"><?php echo $idno; ?></th>
                            <td><?php echo $job_title ? $job_title : '-'; ?></td>
                            <td><?php echo $company ? $company : '-'; ?></td>
                            <td><?php echo $location ? $location : '-'; ?></td>
                            <td><?php echo $created_at_formatted ? $created_at_formatted : '-'; ?></td>
                            <td><?php echo $status ? $status : '-'; ?></td>
                            <td style="font-size: 20px;">
                                <a class="view" data-bs-toggle="offcanvas" data-bs-target="#job-canvas-<?php echo $id; ?>" style="text-decoration: none; cursor: pointer;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/job/update-job/?jobupdid=<?php echo $id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="/console/job/all-jobs/?jobdelid=<?php echo $id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- View Job Canvas -->
                            <div class="offcanvas project-offcanvas offcanvas-end" tabindex="-1" id="job-canvas-<?php echo $id; ?>" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-body">
                                    <button type="button" class="off-canvas-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left-circle"></i></button>
                                    <hr>
                                    <div class="main-project-details">
                                        <div class="ms-3 me-3">
                                            <?php if ($status == 'Applied') { ?>
                                                <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $status; ?></span></p>
                                            <?php } else if ($status == 'Interviewed') { ?>
                                                <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $status; ?></span></p>
                                            <?php } else if ($status == 'Offered') { ?>
                                                <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $status; ?></span></p>
                                            <?php } else if ($status == 'Rejected') { ?>
                                                <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $status; ?></span></p>
                                            <?php } ?>
                                        </div>

                                        <h3 class="mt-3"><?php echo $job_title; ?></h3>
                                        <p class="text-secondary" style="font-size: 12px;">
                                            <span class="pe-3">
                                                Last updated: <?php echo $updated_at_formatted; ?>
                                            </span>
                                            <span>
                                                Applied: <?php echo $created_at_formatted; ?>
                                            </span>
                                        </p>
                                        <h4>Company Name</h4>
                                        <p><?php echo $company ?? '--'; ?></p>
                                        <h4>Location</h4>
                                        <p><?php echo $location ?? '--'; ?></p>
                                        <h4>Pay</h4>
                                        <p><?php echo $pay ?? '--'; ?></p>
                                        <h4>Bonus Pay</h4>
                                        <p><?php echo $bonus_pay ?? '--'; ?></p>
                                        <h4>Job Type</h4>
                                        <p><?php echo $job_type ?? '--'; ?></p>
                                        <h4>Other Details</h4>
                                        <ul class="tags">
                                            <?php if($watchlist == 1) { ?>
                                                <li>Watching</li>
                                            <?php } ?>
                                            <?php if($interview_set == 1) { ?>
                                                <li>Interview Set</li>
                                            <?php } ?>
                                        </ul>
                                        <p>
                                            <?php if($interview_set == 0 && $watchlist == 0) { ?>
                                                No other details.
                                            <?php } ?>
                                        </p>
                                        <h4>Notes</h4>
                                        <p><?php echo $ce_notes ?? 'No listed notes.'; ?></p>
                                       
                                           
                                        <a href="<?php echo $job_link; ?>" class="open__project" target="_blank" id="cardHover" rel="noopener noreferrer">
                                           Open Job &nbsp; 
                                           <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <!-- end View Job Canvas -->


                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6" class="text-center">No jobs found.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Pagination links
        $sql_count = "SELECT COUNT(*) as total FROM jobs";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $total_records = $row_count['total'];
        $total_pages = ceil($total_records / $limit);

        if ($total_pages > 1) {
            echo '<ul class="pagination justify-content-center" style="background-color: #333333;">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($page == $i) ? "active" : "";
                echo "<li class='page-item {$active}'><a class='page-link' href='?page={$i}'>{$i}</a></li>";
            }
            echo '</ul>';
        }
        ?>
    </div>

            
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
