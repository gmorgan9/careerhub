<?php

require('../database/connection.php');

// Fetch data from the database
$query = "SELECT * FROM applications";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store in array
    $applications = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }

    // Set HTTP headers to indicate JSON content
    header('Content-Type: application/json');

    // Output JSON data
    echo json_encode($applications);
} else {
    // No data found
    echo json_encode(array('message' => 'No applications found'));
}
?>