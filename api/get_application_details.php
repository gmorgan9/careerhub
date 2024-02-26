<?php

// Include necessary files and start session
date_default_timezone_set('America/Denver');
require_once ROOT_PATH . "app/database/connection.php";
require_once "path.php";
session_start();

// Check if app_id is provided in the URL query parameter
if (isset($_GET['app_id'])) {
    $app_id = $_GET['app_id'];

    // Fetch application details from the database based on app_id
    $sql = "SELECT * FROM applications WHERE id = $app_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $application = mysqli_fetch_assoc($result);
        // Output application details as HTML
        echo "<p><strong>Job Title:</strong> " . $application['job_title'] . "</p>";
        echo "<p><strong>Company:</strong> " . $application['company'] . "</p>";
        // Add more details as needed
    } else {
        echo "<p>No application found.</p>";
    }
} else {
    echo "<p>No application ID provided.</p>";
}

?>