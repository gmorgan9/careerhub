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

// Career Experience - SELECT all active experience
    $ce_sql = "SELECT * FROM career_experience WHERE ce_status IN ('active-1', 'active-2', 'active-3') ORDER BY ce_status ASC;";
    $ce_result = mysqli_query($conn, $ce_sql);
// end Career Experience - SELECT all active experience

// Career Experience - SELECT all experience
    $ce_all_sql = "SELECT * FROM career_experience";
    $ce_all_result = mysqli_query($conn, $ce_all_sql);
// end Career Experience - SELECT all experience

// Career Experience - Count active-1 Career Experience
    $count_active1_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-1';";
    $count_active1_result = mysqli_query($conn, $count_active1_sql);
    $count_active1_row = mysqli_fetch_assoc($count_active1_result);
    $count_active1 = $count_active1_row['count'];
// end Career Experience - Count active-1 Career Experience

// Career Experience - Count active-2 Career Experience
    $count_active2_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-2';";
    $count_active2_result = mysqli_query($conn, $count_active2_sql);
    $count_active2_row = mysqli_fetch_assoc($count_active2_result);
    $count_active2 = $count_active2_row['count'];
// end Career Experience - Count active-2 Career Experience

// Career Experience - Count active-3 Career Experience
    $count_active3_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-3';";
    $count_active3_result = mysqli_query($conn, $count_active3_sql);
    $count_active3_row = mysqli_fetch_assoc($count_active3_result);
    $count_active3 = $count_active3_row['count'];
// end Career Experience - Count active-3 Career Experience

// Career Experience - Delete Experience
    if(isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM career_experience WHERE ce_id=$id";
        $result = mysqli_query($conn, $sql);
        header('location:' . BASE_URL . '/console/experience');
    }
// End Career Experience - Delete Experience

?>