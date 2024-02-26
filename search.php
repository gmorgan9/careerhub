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

// Pagination variables
$limit = 10; // Number of items per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$start = ($page - 1) * $limit; // Offset for pagination

// Initialize variables for search
$search = '';
$result = false;
$total_pages = 0;
$searchField = '';

// Define available search fields
$searchFields = ['job_title', 'company'];

// Handle search query
if (isset($_GET['search']) && isset($_GET['search_field'])) {
    $search = $_GET['search'];
    $searchField = $_GET['search_field'];

    // Check if the selected search field is valid
    if (in_array($searchField, $searchFields)) {
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
                <?php foreach ($searchFields as $field): ?>
                    <option value="<?php echo $field; ?>" <?php if ($searchField === $field) echo 'selected'; ?>><?php echo ucfirst($field); ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Display search criteria -->
    <?php if (!empty($search) && !empty($searchField)): ?>
        <div class="alert alert-info" role="alert">
            Search Criteria: <?php echo ucfirst($searchField) . ' contains "' . $search . '"'; ?>
        </div>
    <?php endif; ?>

<!-- Display search results only if a search query is submitted -->
<?php if ($result !== false): ?>
    <ul class="list-group">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php $app_id_data = $row['app_id']; ?>
                <li class="list-group-item">
                    <?php echo $row['job_title']; ?>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $app_id_data; ?>" data-app-id="<?php echo $app_id_data; ?>">View Details</a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <li class="list-group-item">No results found</li>
        <?php endif; ?>
    </ul>

    <!-- Pagination links -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php $active = ($page == $i) ? "active" : ""; ?>
                <li class='page-item <?php echo $active; ?>'><a class='page-link' href='?search=<?php echo $search; ?>&search_field=<?php echo $searchField; ?>&page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>


<!-- Modal for application details -->
<?php if ($result !== false && mysqli_num_rows($result) > 0): ?>
    <?php mysqli_data_seek($result, 0); // Reset result pointer ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="modal fade" id="exampleModal<?php echo $row['app_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $row['app_id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel<?php echo $row['app_id']; ?>">Application Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content-<?php echo $row['app_id']; ?>">
                        <!-- Application details will be loaded here dynamically via JavaScript -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Additional buttons or actions can be added here -->
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // JavaScript to load application details dynamically into the modal
const modalBodyContent = document.getElementById('modal-body-content');
const viewDetailLinks = document.querySelectorAll('[data-bs-toggle="modal"]');

viewDetailLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        const appId = this.getAttribute('data-app-id');
        // Fetch application details using AJAX or fetch API and update modal body content
        fetch(`<?php echo BASE_URL; ?>/api/get_application_details.php?app_id=${appId}`)
            .then(response => response.text())
            .then(data => {
                // Set the modal body content for the specific modal
                const modalBody = document.getElementById(`modal-body-content-${appId}`);
                modalBody.innerHTML = data;
                // Show the modal
                const modal = new bootstrap.Modal(document.getElementById(`exampleModal${appId}`));
                modal.show();
            })
            .catch(error => {
                console.error('Error fetching application details:', error);
            });
    });
});
</script>

</body>
</html>
