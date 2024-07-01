<?php

// Certifications - SELECT all certifications
    $cert_sql = "SELECT * FROM certifications;";
    $cert_result = mysqli_query($conn, $cert_sql);
// end Certifications - SELECT all certifications

// Certifications - Count all certifications
    $count_cert_sql = "SELECT COUNT(*) AS count FROM certifications;";
    $count_cert_result = mysqli_query($conn, $count_cert_sql);
    $count_cert_row = mysqli_fetch_assoc($count_cert_result);
    $count_cert = $count_cert_row['count'];
// end Certifications - SELECT all certifications

// Career Experience - SELECT all experience
    $ce_sql = "SELECT * FROM career_experience WHERE ce_status = 'active-1';";
    $ce_result = mysqli_query($conn, $ce_sql);
// end Career Experience - SELECT all experience

?>