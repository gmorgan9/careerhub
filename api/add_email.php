<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data)) {
    // Ensure that $data contains exactly four keys
    if(count($data) !== 4) {
        echo "Invalid data structure. The data must contain companyName, subject, sender, and link.";
    } else {
        // Check if all required fields are present
        if(isset($data['companyName'], $data['subject'], $data['sender'], $data['link'])) {
            // Escape and retrieve data
            $companyName = mysqli_real_escape_string($conn, $data['companyName']);
            $subject = mysqli_real_escape_string($conn, $data['subject']);
            $sender = mysqli_real_escape_string($conn, $data['sender']);
            $link = mysqli_real_escape_string($conn, $data['link']);

            
            $query1 = "SELECT job_id FROM jobs WHERE company = '$companyName'";
            $result1 = mysqli_query($conn, $query1);
            
            if ($result1) {
                if (mysqli_num_rows($result1) > 0) {
                    
                    $row = mysqli_fetch_assoc($result1);
                    $job_id = $row['job_id'];
                } else {
                    
                    $job_id = null;
                }
                
                // Generate idno
                $idno = rand(1000000, 9999999);

                // Check if the link already exists
                $query_check = "SELECT idno FROM email_application WHERE link = '$link' LIMIT 1";
                $result_check = mysqli_query($conn, $query_check);
                if (mysqli_num_rows($result_check) == 0) {
                    // Insert data into email_application table
                    $query2 = "INSERT INTO email_application (idno, job_id, subject, sender, link) VALUES ('$idno', NULLIF('$job_id',''), '$subject', '$sender', '$link')";
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
                
                echo "Error retrieving job_id: " . mysqli_error($conn);
            }
        } else {
            // Missing required fields
            echo "Missing required fields in the data.";
        }
    }
} else {
    // No valid data provided
    echo "No valid data provided.";
}
?>
