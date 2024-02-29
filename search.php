<?php
// Include necessary files and start session
date_default_timezone_set('America/Denver');
require_once "app/database/connection.php";
require_once "path.php";
session_start();

// Include all PHP functions
$files = glob("app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

// Logout user if not logged in
logoutUser($conn);
if (isLoggedIn() == false) {
    header('location:' . BASE_URL . '/login.php');
}

    // Search functionality
        // Pagination variables
        $limit = 10; // Number of items per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
        $start = ($page - 1) * $limit; // Offset for pagination

        // Initialize variables for search
        $search = '';
        $result = false;
        $total_pages = 0;
        $searchField = '';

        // Define available search fields with database field names
        $searchFields = [
            'job_title' => 'Job title',
            'company' => 'Company'
        ];

        // Handle search query
        if (isset($_GET['search']) && isset($_GET['search_field'])) {
            $search = $_GET['search'];
            $selectedField = $_GET['search_field'];
        
            // Check if the selected search field is valid
            if (array_key_exists($selectedField, $searchFields)) {
                // Get the corresponding database field name
                $searchField = $selectedField;
            
                // Construct SQL query with search condition
                $sql = "SELECT * FROM applications WHERE $searchField LIKE '%$search%' ORDER BY created_at DESC LIMIT $start, $limit";
            
                // Execute the query
                $result = mysqli_query($conn, $sql);
            
                // Calculate total number of pages for pagination
                $countSql = "SELECT COUNT(*) as total FROM applications WHERE $searchField LIKE '%$search%'";
                $countResult = mysqli_query($conn, $countSql);
                $row = mysqli_fetch_assoc($countResult);
                $total_pages = ceil($row["total"] / $limit);
            } else {
                // Invalid search field
                echo "Invalid search field";
            }
        }
    // end Search functionality

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
    <style></style>
</head>
<body>

<?php include(ROOT_PATH . "/app/database/includes/header.php"); ?>

<h1 class="text-center"><strong>Search Applications</strong></h1><br>

    <!-- Search form -->
        <div class="container">
        <form method="GET" action="" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search; ?>">
                <select class="form-select" name="search_field">
                    <?php foreach ($searchFields as $fieldName => $fieldLabel): ?>
                        <option value="<?php echo $fieldName; ?>" <?php if ($searchField === $fieldName) echo 'selected'; ?>><?php echo $fieldLabel; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    <!-- end Search form -->

    <!-- Display search criteria -->
        <?php if (!empty($search) && !empty($searchField)): ?>
            <div class="alert alert-info" role="alert">
                Search Criteria: <?php echo ucfirst(str_replace('_', ' ', $searchField)) . ' contains "' . $search . '"'; ?>
            </div>
        <?php endif; ?>
    <!-- end Display search criteria -->

    <!-- View Modal -->
        <?php if ($result !== false): ?>
            <ul class="list-group">
                <?php if (mysqli_num_rows($result) > 0){ ?>
                    <?php while ($row = mysqli_fetch_assoc($result)){ 
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
                        <?php //$app_id_data = $row['app_id']; ?>
                        <li class="list-group-item float-end">
                            <?php echo $row['job_title']; ?>
                            <a href="view-app.php?viewid=<?php echo $id; ?>" class="view float-end badge text-bg-secondary text-decoration-none">View</a>
                            <!-- <a href="view-app.php?viewid=<?php //echo $id; ?>">View Details</a> -->
                        </li>
                    
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
            <?php } ?>
            <?php } else { ?>
                <li class="list-group-item">No results found</li>
            <?php } ?>
        </ul>
    <!-- end VIEW Modal -->

    <!-- Pagination links -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php $active = ($page == $i) ? "active" : ""; ?>
                    <li class='page-item <?php echo $active; ?> mt-4'><a class='page-link' href='?search=<?php echo $search; ?>&search_field=<?php echo $searchField; ?>&page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
        <?php endif; ?>
    <!-- end Pagnation links -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
