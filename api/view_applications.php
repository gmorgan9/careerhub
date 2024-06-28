<?php

require('../app/database/connection.php');

// Fetch data from the database
$query = "SELECT idno, job_title, company, location, status, job_link, job_type FROM jobs";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store in array
    $jobs = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }

    // Set HTTP headers to indicate JSON content
    header('Content-Type: application/json');

    // Output JSON data
    echo json_encode($jobs);
} else {
    // No data found
    echo json_encode(array('message' => 'No jobs found'));
}
?>
