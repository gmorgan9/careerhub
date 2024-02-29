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
    <link rel="stylesheet" href="assets/css/main.css?v=<?php echo time(); ?>">
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

    <!-- List -->
        <?php if ($result !== false): ?>
            <ul class="list-group">
                <?php if (mysqli_num_rows($result) > 0){ ?>
                    <?php while ($row = mysqli_fetch_assoc($result)){ 
                        $id             = $row['app_id'];
                        $job_title      = $row['job_title'];
                        ?>
                        <?php //$app_id_data = $row['app_id']; ?>
                        <li class="list-group-item float-end">
                            <?php echo $row['job_title']; ?>
                            <a href="view-app.php?viewid=<?php echo $id; ?>" class="view float-end badge text-bg-secondary text-decoration-none">View</a>
                        </li>
                    
            <?php } ?>
            <?php } else { ?>
                <li class="list-group-item">No results found</li>
            <?php } ?>
        </ul>
    <!-- end List -->

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
