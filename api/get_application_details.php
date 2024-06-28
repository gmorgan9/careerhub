<?php

// Include necessary files and start session
date_default_timezone_set('America/Denver');
require_once "../app/database/connection.php";
require_once "../path.php";
session_start();


if (isset($_GET['job_id'])) {
   
    $job_id = $_GET['job_id'];

    // Prevent SQL injection
    $job_id = mysqli_real_escape_string($conn, $job_id);

    // 
    $sql = "SELECT * FROM jobs WHERE job_id = '$job_id'"; // Assuming 'id' is the primary key
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch the jobs details
            $job = mysqli_fetch_assoc($result);
            // Output job details as HTML
            echo "<p><strong>Job Title:</strong> " . htmlspecialchars($job['job_title']) . "</p>";
            echo "<p><strong>Company:</strong> " . htmlspecialchars($job['company']) . "</p>";
            // Add more details as needed
        } else {
            echo "<p>No job found.</p>";
        }
    } else {
        // If there was an error executing the query, echo the error message
        echo "<p>Error executing the query: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p>No job ID provided.</p>";
}

?>
