<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php";
require_once "../../path.php";
session_start();

$files = glob("../../app/functions/*.php");
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
    <link rel="stylesheet" href="../../assets/css/home.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Projects - MorganServer Career Hub</title>
</head>
<body style="background-color: rgb(34,34,34);">


    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">   
        <h2 class="text-white title">Projects</h2> 
        <div class="float-end">
            <a class="all-btn" href="<?php echo BASE_URL; ?>/console/project/add-project">Add Project</a>
        </div>
    </div>

    <div class="container-fluid" style="height: calc(100vh - 502px);">
        

        <!-- <div class="content text-white" style="margin-top: 55px;"> -->
        <table class="table text-white w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($all_result) > 0) {
                    while ($row = mysqli_fetch_assoc($all_result)) {
                        $project_id            = $row['project_id'];
                        $project_idno          = $row['idno'];  
                        $project_name          = $row['project_name']; 
                        $project_short_name    = $row['project_short_name']; 
                        $project_description   = $row['project_description'];
                        $project_github_link   = $row['project_github_link'];
                        $project_github_user   = $row['project_github_user'];
                        $project_url           = $row['project_url'];
                        $project_release       = $row['project_release'];
                        $project_tech          = $row['project_tech'];
                        $project_content       = $row['project_content'];
                        $technologies          = explode(", ", $project_tech);
                        $project_category      = $row['project_category'];
                ?>
                        <tr>
                            <th scope="row"><?php echo $project_idno; ?></th>
                            <td><?php echo $project_name ? $project_name : '-'; ?></td>
                            <td><?php echo $project_release ? $project_release : '-'; ?></td>
                            <td><?php echo $project_category ? $project_category : ''; ?></td>
                            <td style="font-size: 20px;">
                                <a class="view" data-bs-toggle="offcanvas" data-bs-target="#project-canvas-<?php echo $project_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/project/update-project/?proupdid=<?php echo $project_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="/console/project/?prodelid=<?php echo $project_id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- CANVAS -->
                            <div class="offcanvas project-offcanvas offcanvas-end" tabindex="-1" id="project-canvas-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                               
                               <div class="offcanvas-body">
                                   <button type="button" class="off-canvas-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left-circle"></i></button>
                                   <hr>
                                   <div class="main-project-details">
                                       <h3 class="mt-5"><?php echo $project_name; ?></h3>
                                       <div class="project-image d-flex justify-content-center">
                                           <img src="<?php echo ROOT_PATH; ?>/assets/images/project-images/<?php echo $project_short_name; ?>.png" class="mt-3" alt="">
                                       </div>
                                       <h4>About</h4>
                                       <p><?php echo $project_description; ?></p>
                                       <h4>Technologies</h4>
                                       <ul class="tags">
                                           <?php foreach ($technologies as $tech): ?>
                                               <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                           <?php endforeach; ?>
                                       </ul>
                                       <h4>
                                           <i class="bi bi-globe2"></i> &nbsp; 
                                           Website
                                       </h4>
                                       <p>
                                           <a href="<?php echo $project_url; ?>" target="_blank"><?php echo $project_name; ?></a>
                                       </p>
                                       <h4>
                                           <i class="bi bi-github"></i> &nbsp;
                                           Github
                                       </h4>
                                       <p>
                                           <a href="https://github.com/<?php echo $project_github_user ?>" target="_blank"><?php echo $project_github_user; ?></a>
                                       </p>
                                       <a href="<?php echo $project_github_link; ?>" class="open__project" target="_blank" id="cardHover" rel="noopener noreferrer">
                                           Open Project &nbsp; 
                                           <i class="bi bi-box-arrow-up-right"></i>
                                       </a>
                                   </div>
                                   
                               </div>
                           </div>
                        <!-- end CANVAS -->

                        <!-- VIEW Modal -->
                            <div class="modal fade" id="viewModal<?php echo $project_id; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content" style="background-color: #333;">
                                        <div class="modal-header text-white">
                                            <h5 class="modal-title" id="viewModalLabel">View Experience</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <?php
                                                $new = "SELECT * FROM projects WHERE project_id=$project_id";
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
                        <td colspan="7" class="text-center">No projects found.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Pagination links
        $sql_count = "SELECT COUNT(*) as total FROM projects";
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

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>

            
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
