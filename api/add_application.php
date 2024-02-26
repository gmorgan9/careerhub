<?php

require('../app/database/connection.php');

// JSON entry from PS Script
$data = json_decode(file_get_contents('php://input'), true);
$idno  = rand(1000000, 9999999);

$setZero = 0;

if(isset($data)) {
$query = "INSERT INTO applications (idno, job_title, company, location, job_type, watchlist, interview_set, app_link, status) VALUES ('$idno','".$data['job_title']."', '".$data['company']."', '".$data['location']."', '".$data['job_type']."', '$setZero', '$setZero', '".$data['app_link']."', 'Applied')";
$result = mysqli_query($conn, $query);
}
// END JSON entry from PS Script


?>