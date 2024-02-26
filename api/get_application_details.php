<?php

// Include necessary files and start session
date_default_timezone_set('America/Denver');
require_once __DIR__ . "/../app/database/connection.php"; // Adjust path as necessary
require_once "../path.php";
session_start();

// Check if app_id is provided in the URL query parameter
if (isset($_GET['app_id'])) {
    $app_id = $_GET['app_id'];

    // Prevent SQL injection
    $app_id = mysqli_real_escape_string($conn, $app_id);

    // Fetch application details from the database based on app_id
    $sql = "SELECT * FROM applications WHERE id = $app_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $application = mysqli_fetch_assoc($result);
            // Output application details as HTML
            echo "<p><strong>Job Title:</strong> " . htmlspecialchars($application['job_title']) . "</p>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($application['company']) . "</p>";
            // Add more details as needed
        } else {
            echo "<p>No application found.</p>";
        }
    } else {
        // Handle SQL query error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<p>No application ID provided.</p>";
}

?>
