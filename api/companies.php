<?php

require('../app/database/connection.php');

// Fetch distinct companies from the database
$query = "SELECT DISTINCT company FROM jobs WHERE status = 'Applied'";
$result = mysqli_query($conn, $query);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store in array
    $companies = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $companies[] = $row['company'];
    }

    // Set HTTP headers to indicate JSON content
    header('Content-Type: application/json');

    // Output JSON data
    echo json_encode($companies);
} else {
    // No data found
    echo json_encode(array('message' => 'No Jobs found'));
}
?>
