<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)) {
    // If $data is not an array, wrap it in an array to handle single item case
    if (!is_array($data)) {
        $data = array($data);
    }

    // Process each set of data independently
    foreach ($data as $item) {
        // Check if $item is an array
        if (!is_array($item)) {
            echo "Invalid data format. Expected an array.";
            continue;
        }

        // Ensure that $item contains exactly four keys
        if(count($item) !== 4) {
            echo "Invalid data structure. Each set of data must contain companyName, subject, sender, and link.";
            continue;
        }

        // Check if all required fields are present
        if(isset($item['companyName'], $item['subject'], $item['sender'], $item['link'])) {
            // Escape and retrieve data
            $companyName = mysqli_real_escape_string($conn, $item['companyName']);
            $subject = mysqli_real_escape_string($conn, $item['subject']);
            $sender = mysqli_real_escape_string($conn, $item['sender']);
            $link = mysqli_real_escape_string($conn, $item['link']);

            // Retrieve app_id from applications table
            $query1 = "SELECT app_id FROM applications WHERE company = '$companyName'";
            $result1 = mysqli_query($conn, $query1);
            
            if ($result1) {
                if (mysqli_num_rows($result1) > 0) {
                    // Fetch the app_id from the result set
                    $row = mysqli_fetch_assoc($result1);
                    $app_id = $row['app_id'];
                } else {
                    // No matching company, set app_id to null
                    $app_id = null;
                }
                
                // Generate idno
                $idno = rand(1000000, 9999999);

                // Check if the link already exists
                $query_check = "SELECT idno FROM email_application WHERE link = '$link' LIMIT 1";
                $result_check = mysqli_query($conn, $query_check);
                if (mysqli_num_rows($result_check) == 0) {
                    // Insert data into email_application table
                    $query2 = "INSERT INTO email_application (idno, app_id, subject, sender, link) VALUES ('$idno', NULLIF('$app_id',''), '$subject', '$sender', '$link')";
                    $result2 = mysqli_query($conn, $query2);
                    
                    if ($result2) {
                        // Insertion successful
                        echo "Data inserted successfully.";
                    } else {
                        // Error inserting data
                        echo "Error inserting data: " . mysqli_error($conn);
                    }
                } else {
                    echo "Link already exists in the database.";
                }
            } else {
                // Error retrieving app_id
                echo "Error retrieving app_id: " . mysqli_error($conn);
            }
        } else {
            // Missing required fields
            echo "Missing required fields for one of the sets.";
        }
    }
} else {
    // No valid data provided
    echo "No valid data provided.";
}
?>
