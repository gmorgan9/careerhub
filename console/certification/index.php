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

    <title>Certifications - MorganServer Career Hub</title>
</head>
<body style="background-color: rgb(34,34,34);">


    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>

    <div class="page_title">   
        <h2 class="text-white title">Certifications</h2> 
        <div class="float-end">
            <a class="all-btn" href="<?php echo BASE_URL; ?>/console/certification/add-certification">Add Certification</a>
        </div>
    </div>

    <div class="container-fluid" style="height: calc(100vh - 502px);">
        

        <!-- <div class="content text-white" style="margin-top: 55px;"> -->
        <table class="table text-white w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Certification Name</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">Provider</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($cert_result) > 0) {
                    while ($row = mysqli_fetch_assoc($cert_result)) {
                        $cert_id          = $row['cert_id'];
                        $idno             = $row['idno'];
                        $cert_name        = $row['cert_name'];
                        $cert_short_name  = $row['cert_short_name'];
                        $cert_issued      = $row['cert_issued'];
                        $cert_expire      = $row['cert_expire'];
                        $cert_renewed     = $row['cert_renewed'];
                        $cred_id          = $row['cred_id'];
                        $cert_provider    = $row['cert_provider'];
                        $cert_credly      = $row['cert_credly'];
                ?>
                        <tr>
                            <th scope="row"><?php echo $cert_idno; ?></th>
                            <td><?php echo $cert_name ? $cert_name : '-'; ?></td>
                            <td><?php echo $cert_expire ? $cert_expire : 'In-progress'; ?></td>
                            <td><?php echo $cert_provider ? $cert_provider : ''; ?></td>
                            <td style="font-size: 20px;">
                                <a href="" class="view" data-bs-toggle="modal" data-bs-target="#cert-renew-<?php echo $cert_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-arrow-repeat text-info"></i>
                                </a>
                                &nbsp;
                                <a class="view pe-auto" data-bs-toggle="offcanvas" data-bs-target="#cert-canvas-<?php echo $cert_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/certification/update-certification/?certupdid=<?php echo $cert_id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="/console/certification/?certdelid=<?php echo $cert_id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- View Cert Canvas -->
                            <div class="offcanvas project-offcanvas offcanvas-end" tabindex="-1" id="cert-canvas-<?php echo $cert_id; ?>" aria-labelledby="offcanvasRightLabel">
                               
                               <div class="offcanvas-body">
                                   <button type="button" class="off-canvas-close-btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left-circle"></i></button>
                                   <hr>
                                   <div class="main-project-details">
                                       <h3 class="mt-5"><?php echo $cert_name; ?></h3>
                                       
                                       <h4>Credential ID</h4>
                                       <p><?php echo $cred_id; ?></p>
                                       <h4>Original Issue Date</h4>
                                       <p><?php echo $cert_issued; ?></p>
                                       <h4>Expiration Date</h4>
                                       <p><?php echo $cert_expire; ?></p>
                                       <h4>Renewal Date</h4>
                                       <p><?php echo $cert_renewed; ?></p>
                                       <h4>Provider</h4>
                                       <p><?php echo $cert_provider; ?></p>
                                       
                                       
                                       <a href="<?php echo $cert_credly; ?>" class="open__project" target="_blank" id="cardHover" rel="noopener noreferrer">
                                           Open Certification &nbsp; 
                                           <i class="bi bi-box-arrow-up-right"></i>
                                       </a>
                                   </div>
                                   
                               </div>
                           </div>
                        <!-- end View Project Canvas -->

                        <!-- Renewal Modal -->
                            <div class="modal fade" id="cert-renew-<?php echo $cert_id; ?>" tabindex="-1" aria-labelledby="cert-renew-Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background-color: #333;">
                                        <div class="modal-header text-white">
                                            <h5 class="modal-title" id="viewModalLabel">Certification Renewal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <div class="alert alert-info" role="alert">
                                                <i class="bi bi-info-circle-fill"></i> &nbsp; Certification Renewal for: <strong><?php echo $cert_name; ?></strong>
                                            </div>
                                            <form action="" method="POST">
                                                <input type="hidden" name="cert_id" value="<?php echo $cert_id; ?>">
                                                <div class="form-group">
                                                    <label class="form-label text-white" for="cert_renewed">Renewal Date <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                                                    <input type="date" class="form-input" name="cert_renewed" id="cert_renewed" style="padding-bottom: 0 !important;" required>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="form-label text-white" for="cert_expire">Expiration Date <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                                                    <input type="date" class="form-input" name="cert_expire" id="cert_expire" style="padding-bottom: 0 !important;" value="<?php echo $cert_expire; ?>" required>
                                                </div>
                                                <input type="submit" name="cert-renewal" class="all-btn mt-3" value="Renew Certification">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end Renewal Modal -->


                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="7" class="text-center">No certifications found.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Pagination links
        $sql_count = "SELECT COUNT(*) as total FROM certifications";
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
