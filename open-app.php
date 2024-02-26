<?php
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

// if (!isLoggedIN()) {
// 	header('location: login.php');
// }
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

<!-- <div class="record_incident float-end me-5">
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="recordJobDropdown" data-bs-toggle="dropdown" data-bs-target="#recordJobDropdown" aria-haspopup="true" aria-expanded="false">
        Add Application
    </button>
    <div class="dropdown-menu" aria-labelledby="recordJobDropdown">
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#quickModal">Quick</a>
        <a class="dropdown-item" href="create-app.php">In-depth</a>
    </div>
    </div>
</div> -->

    <div class="record_incident float-end me-5">
        <a href="<?php echo BASE_URL ?>/" class="btn btn-secondary">
            Home
        </a>
    </div>

<!-- Quick Modal -->
    <!-- <div class="modal fade" id="quickModal" tabindex="-1" aria-labelledby="quickModalLabel" aria-hidden="true">
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
    </div> -->
<!-- end Quick Modal -->




    <h1 style="margin-left: 175px;" class="text-center"><strong>Open Applications</strong></h1>
    <br>







<!-- main-container -->
    <div class="container-fluid main">

        <table class="table">
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
                    // Pagination variables
                    $limit = 10; // Number of entries per page
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;
                    
                    $sql = "SELECT * FROM applications WHERE status = 'Applied' ORDER BY created_at ASC LIMIT $limit OFFSET $offset";
                    $result = mysqli_query($conn, $sql);
                    if($result) {
                        $num_rows = mysqli_num_rows($result);
                        if($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id             = $row['app_id'];
                                $status         = $row['status'];
                                $job_title      = $row['job_title'];
                                $company        = $row['company'];
                                $location       = $row['location'];
                                $created_at     = $row['created_at'];
                                $created_at = $row['created_at'];
                                $utc_date_time = new DateTime($created_at, new DateTimeZone('UTC'));
                                $local_date_time = $utc_date_time->setTimezone(new DateTimeZone('America/Denver'));
                                $formatted_date = $local_date_time->format('M d, Y');
                ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $job_title ? $job_title : '-'; ?></td>
                    <td><?php echo $company ? $company : '-'; ?></td>
                    <td><?php echo $location ? $location : '-'; ?></td>
                    <td><?php echo $formatted_date ? $formatted_date : '-'; ?></td>
                    <td><?php echo $status ? $status : '-'; ?></td>
                    <td style="font-size: 20px;"><a href="#" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $id; ?>" class="view"><i class="bi bi-eye text-success"></i></a> &nbsp; <a href="update-app.php?updateid=<?php echo $id; ?>"><i class="bi bi-pencil-square" style="color:#005382;"></a></i> &nbsp; <a href="open-app.php?app_id=<?php echo $id; ?>" class="delete"><i class="bi bi-trash" style="color:#941515;"></i></a></td>
                </tr>


                <!-- VIEW Modal -->
                    <div class="modal fade" id="viewModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewModalLabel">View Application</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                <?php
                                            $new = "SELECT * FROM applications WHERE app_id=$id";
                                            $new1 = mysqli_query($conn, $new);
                                            if($new1) {
                                                while ($cap = mysqli_fetch_assoc($new1)) {       
                                        ?> 
                                    <!-- Display the content of the selected entry -->
                                    <div>
                                        <h5 class="float-start">Job Details</h5>
                                        <div class="float-end">
                                            <?php if($cap['watchlist'] == 1){ ?>
                                                <i class="bi bi-eye text-muted"></i>
                                            <?php } else {} ?>
                                            <?php if($cap['interview_set'] == 1){ ?>
                                                <i class="bi bi-people"></i>
                                            <?php } else {} ?>
                                        </div>
                                    </div>

                                    <br>
                                    
                                    <hr>
                                    <div class="ms-3 me-3">
                                       <p class="float-start fw-bold">Status</p> 
                                       <?php if($cap['status'] == 'Applied'){ ?>
                                            <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-primary"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                        <?php } else if($cap['status'] == 'Interviewed') { ?>
                                            <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-info"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                        <?php } else if($cap['status'] == 'Offered') { ?>
                                            <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-success"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                        <?php } else if($cap['status'] == 'Rejected') { ?>
                                            <p><span class="float-end"><i style="font-size: 12px; margin-top: -5px;" class="bi bi-circle-fill text-danger"></i> &nbsp; <?php echo $cap['status']; ?></span></p>
                                        <?php } ?>
                                    </div>
                                    <br>
                                    <div class="ms-3 me-3">
                                        <p class="float-start fw-bold">Connected Emails</p>
                                        <p><span class="float-end">
                                        <?php
                                            $count="select count('1') from email_application where app_id='$id'";
                                            $count_result=mysqli_query($conn,$count);
                                            $rtotal=mysqli_fetch_array($count_result); 
                                            if($rtotal[0] < 10) {
                                                echo "0$rtotal[0]";
                                            } else {
                                                echo "$rtotal[0]";
                                            }
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
                                       <p class="float-start fw-bold">Application Link</p> 
                                       <p><a target="_blank" href="<?php echo $cap['app_link']; ?>" class="float-end">Link Here</a></p>
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
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
        <?php
            // Pagination links
            $sql = "SELECT COUNT(*) as total FROM applications WHERE status = 'Applied'";
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
<!-- END main-container -->













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>