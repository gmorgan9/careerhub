<?php

// Include necessary files and start session
date_default_timezone_set('America/Denver');
require_once ROOT_PATH . "app/database/connection.php";
require_once "../path.php";
session_start();

// Check if app_id is provided in the URL query parameter
if (isset($_GET['app_id'])) {
    // Get the app_id from the URL
    $app_id = $_GET['app_id'];

    // Prevent SQL injection
    $app_id = mysqli_real_escape_string($conn, $app_id);

    // Fetch application details from the database based on app_id
    $sql = "SELECT * FROM applications WHERE id = '$app_id'"; // Assuming 'id' is the primary key
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the application details
            $application = mysqli_fetch_assoc($result);
            // Output application details as HTML
            echo "<p><strong>Job Title:</strong> " . htmlspecialchars($application['job_title']) . "</p>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($application['company']) . "</p>";
            // Add more details as needed
        } else {
            echo "<p>No application found.</p>";
        }
    } else {
        // If there was an error executing the query, echo the error message
        echo "<p>Error executing the query: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p>No application ID provided.</p>";
}

?>
