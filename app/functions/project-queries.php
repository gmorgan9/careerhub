<?php

// All - SELECT all projects
    $all_sql = "SELECT * FROM projects;";
    $all_result = mysqli_query($conn, $all_sql);
// end All - SELECT all projects

// All - (count) all projects
    $count_all_sql = "SELECT COUNT(*) AS count FROM projects;";
    $count_all_result = mysqli_query($conn, $count_all_sql);
    $count_all_row = mysqli_fetch_assoc($count_all_result);
    $count_all = $count_all_row['count'];
// end All - (count) all projects

// All - even projects
    $even_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 0;";

    $even_result = mysqli_query($conn, $even_sql);
// end All - even projects

// All - odd projects
    $odd_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 1;";

    $odd_result = mysqli_query($conn, $odd_sql);
// end All - odd projects

// Web Development - (count) web development projects
    $count_wd_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Web Development';";
    $count_wd_result = mysqli_query($conn, $count_wd_sql);
    $count_wd_row = mysqli_fetch_assoc($count_wd_result);
    $count_wd = $count_wd_row['count'];
// end Web Development - (count) web development projects

// Web Development - even projects
    $even_wd_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Web Development'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";

    $even_wd_result = mysqli_query($conn, $even_wd_sql);
// end Web Development - even projects

// Web Development - odd projects
    $odd_wd_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Web Development'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_wd_result = mysqli_query($conn, $odd_wd_sql);
// end Web Development - odd projects

// Scripting & Automation - (count) scripting & automation projects
    $count_sa_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Scripting & Automation';";
    $count_sa_result = mysqli_query($conn, $count_sa_sql);
    $count_sa_row = mysqli_fetch_assoc($count_sa_result);
    $count_sa = $count_sa_row['count'];
// end Scripting & Automation - (count) scripting & automation projects

// Scripting & Automation - even projects
    $even_sa_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Scripting & Automation'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";
    
    $even_sa_result = mysqli_query($conn, $even_sa_sql);
// end Scripting & Automation - even projects

// Scripting & Automation - odd projects
    $odd_sa_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Scripting & Automation'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_sa_result = mysqli_query($conn, $odd_sa_sql);
// end Scripting & Automation - odd projects

// Software Development - (count) software development projects
    $count_sd_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Software Development';";
    $count_sd_result = mysqli_query($conn, $count_sd_sql);
    $count_sd_row = mysqli_fetch_assoc($count_sd_result);
    $count_sd = $count_sd_row['count'];
// end Software Development - (count) software development projects

// Software Development - even projects
    $even_sd_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Software Development'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";

    $even_sd_result = mysqli_query($conn, $even_sd_sql);
// end Software Development - even projects

// Software Development - odd projects
    $odd_sd_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Software Development'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_sd_result = mysqli_query($conn, $odd_sd_sql);
// end Software Development - odd projects

// Open Source - (count) open source projects
    $count_os_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Open Source';";
    $count_os_result = mysqli_query($conn, $count_os_sql);
    $count_os_row = mysqli_fetch_assoc($count_os_result);
    $count_os = $count_os_row['count'];
// end Open Source - (count) open source projects

// Open Source - even projects
    // $even_sd_sql = "SELECT *
    // FROM (
    //     SELECT 
    //         @row_number := @row_number + 1 AS row_num, 
    //         projects.*
    //     FROM projects, (SELECT @row_number := 0) AS t
    // ) AS numbered_projects
    // WHERE MOD(row_num, 2) = 0 AND project_category = 'Open Source';";

    // $even_sd_result = mysqli_query($conn, $even_sd_sql);
// end Open Source - even projects

// Open Sourcet - odd projects
    // $odd_os_sql = "SELECT *
    // FROM (
    //     SELECT 
    //         @row_number := @row_number + 1 AS row_num, 
    //         projects.*
    //     FROM projects, (SELECT @row_number := 0) AS t
    // ) AS numbered_projects
    // WHERE MOD(row_num, 2) = 1 AND project_category = 'Open Source';";

    // $odd_os_result = mysqli_query($conn, $odd_os_sql);
// end Open Source - odd projects

// Update Projects
    if (isset($_POST['update-project'])) {
        $project_id = isset($_POST['project_id']) ? mysqli_real_escape_string($conn, $_POST['project_id']) : "";
        $project_name = isset($_POST['project_name']) ? mysqli_real_escape_string($conn, $_POST['project_name']) : "";
        $project_short_name = isset($_POST['project_short_name']) ? mysqli_real_escape_string($conn, $_POST['project_short_name']) : "";
        $project_description = isset($_POST['project_description']) ? mysqli_real_escape_string($conn, $_POST['project_description']) : "";
        $project_github_link = isset($_POST['project_github_link']) ? mysqli_real_escape_string($conn, $_POST['project_github_link']) : "";
        $project_github_user = isset($_POST['project_github_user']) ? mysqli_real_escape_string($conn, $_POST['project_github_user']) : "";
        $project_url = isset($_POST['project_url']) ? mysqli_real_escape_string($conn, $_POST['project_url']) : "";
        $project_release = isset($_POST['project_release']) ? mysqli_real_escape_string($conn, $_POST['project_release']) : "";
        $project_tech = isset($_POST['project_tech']) ? mysqli_real_escape_string($conn, $_POST['project_tech']) : "";
        $project_category = isset($_POST['project_category']) ? mysqli_real_escape_string($conn, $_POST['project_category']) : "";
        $project_content = isset($_POST['project_content']) ? mysqli_real_escape_string($conn, $_POST['project_content']) : "";

        // Update the project
        $update = "UPDATE projects SET 
                    project_name = NULLIF('$project_name', ''), 
                    project_short_name = NULLIF('$project_short_name', ''), 
                    project_description = NULLIF('$project_description', ''), 
                    project_github_link = NULLIF('$project_github_link', ''), 
                    project_github_user = NULLIF('$project_github_user', ''), 
                    project_url = NULLIF('$project_url', ''), 
                    project_release = NULLIF('$project_release', ''), 
                    project_tech = NULLIF('$project_tech', ''), 
                    project_category = NULLIF('$project_category', ''), 
                    project_content = NULLIF('$project_content', '')
                   WHERE project_id = '$project_id';";

        $result = mysqli_query($conn, $update);
        if (!$result) {
            die('Error updating record: ' . mysqli_error($conn));
        }
        header('location:' . BASE_URL . '/console/project');
    }
// end Update Projects

?>