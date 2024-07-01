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

$sql = "SELECT * FROM jobs WHERE status = 'Applied' ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
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

    <title>Career Experience - MorganServer Career Hub</title>
</head>
<body style="background-color: rgb(34,34,34);">


    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">   
        <h2 class="text-white title">Career Experience</h2> 
        <div class="float-end">
            <a class="all-btn" href="<?php echo BASE_URL; ?>/console/admin/experience/add-experience">Add Experience</a>
        </div>
    </div>

    <div class="container-fluid">
        

        <!-- <div class="content text-white" style="margin-top: 55px;"> -->
        <table class="table text-white w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Job Start</th>
                    <th scope="col">Job End</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($ce_all_result) > 0) {
                    while ($row = mysqli_fetch_assoc($ce_all_result)) {
                        $ce_id          = $row['ce_id'];
                        $ce_idno        = $row['idno'];
                        $ce_job_title   = $row['ce_job_title'];
                        $ce_company     = $row['ce_company'];
                        $ce_start       = $row['ce_start'];
                        $ce_end         = $row['ce_end'];
                        $ce_job_duties  = $row['ce_job_duties'];
                        $ce_notes       = $row['ce_notes'];
                        $ce_status      = $row['ce_status'];
                ?>
                        <tr>
                            <th scope="row"><?php echo $ce_idno; ?></th>
                            <td><?php echo $ce_company ? $ce_company : '-'; ?></td>
                            <td><?php echo $ce_job_title ? $ce_job_title : '-'; ?></td>
                            <td><?php echo $ce_start ? $ce_start : '-'; ?></td>
                            <td><?php echo $ce_end ? $ce_end : 'Current'; ?></td>
                            <td>
                                <?php if ($ce_status == 'active-1') { ?>
                                    Active (1)
                                <?php } else if ($ce_status == 'active-2') { ?>
                                    Active (2)
                                <?php } else if ($ce_status == 'active-3') { ?>
                                    Active (3)
                                <?php } else { ?>
                                    Not Active
                                <?php } ?>
                            </td>
                            <td style="font-size: 20px;">
                                <a href="<?php echo BASE_URL; ?>/console/admin/experience/?viewid=<?php echo $ce_id; ?>" class="view" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $ce_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/admin/update-job/?updateid=<?php echo $ce_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="open-app.php?deleteid=<?php echo $ce_id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- VIEW Modal -->
                            <div class="modal fade" id="viewModal<?php echo $ce_id; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="background-color: #333;">
                                        <div class="modal-header text-white">
                                            <h5 class="modal-title" id="viewModalLabel">View Experience</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <?php
                                                $new = "SELECT * FROM career_experience WHERE ce_id=$ce_id";
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
        $sql_count = "SELECT COUNT(*) as total FROM career_experience";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $total_records = $row_count['total'];
        $total_pages = ceil($total_records / $limit);

        if ($total_pages > 1) {
            echo '<ul class="pagination justify-content-center">';
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
