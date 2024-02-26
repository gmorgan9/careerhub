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

// Handle search query
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Construct SQL query with search condition
    $sql = "SELECT * FROM applications WHERE status = 'Applied' AND job_title LIKE '%$search%' ORDER BY created_at DESC LIMIT $start, $limit";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Calculate total number of pages for pagination
    $countSql = "SELECT COUNT(*) as total FROM applications WHERE status = 'Applied' AND job_title LIKE '%$search%'";
    $countResult = mysqli_query($conn, $countSql);
    $row = mysqli_fetch_assoc($countResult);
    $total_pages = ceil($row["total"] / $limit);
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
            <input type="text" class="form-control" placeholder="Search by job title" name="search">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Display search results only if a search query is submitted -->
    <?php if ($result !== false): ?>
    <ul class="list-group">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li class="list-group-item"><?php echo $row['job_title']; ?></li>
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
                <li class='page-item <?php echo $active; ?>'><a class='page-link' href='?search=<?php echo $search; ?>&page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

</body
</html>