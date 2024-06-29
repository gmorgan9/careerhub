<?php

// All - (count) all projects
    $count_all_sql = "SELECT COUNT(*) AS count FROM projects;";
    $count_all_result = mysqli_query($conn, $count_all_sql);
    $cout_all_row = mysqli_fetch_assoc($count_all_result);
    $count_all = $cout_all_row['count'];
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
    $cout_wd_row = mysqli_fetch_assoc($count_wd_result);
    $count_wd = $cout_wd_row['count'];
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
    $cout_sa_row = mysqli_fetch_assoc($count_sa_result);
    $count_sa = $cout_sa_row['count'];
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
    $cout_sd_row = mysqli_fetch_assoc($count_sd_result);
    $count_sd = $cout_sd_row['count'];
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
    $cout_os_row = mysqli_fetch_assoc($count_os_result);
    $count_os = $cout_os_row['count'];
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

?>