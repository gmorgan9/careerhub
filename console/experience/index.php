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

    <title>Career Experience - MorganServer Career Hub</title>
</head>
<body style="background-color: rgb(34,34,34);">


    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">   
        <h2 class="text-white title">Career Experience</h2> 
        <div class="float-end">
            <a class="all-btn" href="<?php echo BASE_URL; ?>/console/experience/add-experience">Add Experience</a>
        </div>
    </div>

    <div class="container-fluid" style="height: calc(100vh - 502px);">
        

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
                        $job_duties      = explode("- ", $ce_job_duties);
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
                                <a class="view" data-bs-toggle="offcanvas" data-bs-target="#exp-canvas-<?php echo $ce_id; ?>" style="text-decoration: none; cursor: pointer !important;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/experience/update-experience/?expupdid=<?php echo $ce_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="/console/experience/?expdelid=<?php echo $ce_id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- View Experience Canvas -->
                            <div class="offcanvas project-offcanvas offcanvas-end" tabindex="-1" id="exp-canvas-<?php echo $ce_id; ?>" aria-labelledby="offcanvasRightLabel">
        
                               <div class="offcanvas-body">
                                   <button type="button" class="off-canvas-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left-circle"></i></button>
                                   <hr>
                                   <div class="main-project-details">
                                       <h3 class="mt-5"><?php echo $ce_job_title; ?></h3>
                                       <h4>Company Name</h4>
                                        <p><?php echo $ce_company ?? '--'; ?></p>
                                        <h4>Duties</h4>
                                        <ul>
                                            <?php foreach ($job_duties as $job_duty): ?>
                                                <li><?php echo htmlspecialchars($job_duty); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <h4>Time Period</h4>
                                        <p><?php echo $ce_start; ?> - <?php if(is_null($ce_end)) { ?>Current <?php } else { echo $ce_end; } ?></p>
                                        <h4>Notes</h4>
                                        <p><?php echo $ce_notes ?? 'No listed notes.'; ?></p>
                                        <h4>Provider</h4>
                                        
                                        <a href="/console/experience/update-experience/?expupdid=<?php echo $ce_id; ?>" class="open__project" target="_blank" id="cardHover" rel="noopener noreferrer">
                                           Edit Experience &nbsp; 
                                           <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                   </div>
                               </div>
                           </div>
                        <!-- end View Experience Canvas -->


                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="7" class="text-center">No experience found.</td>
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

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>   
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
