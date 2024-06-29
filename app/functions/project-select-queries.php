<?php

// ALL - even projects
    $even_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 0;";

    $even_result = mysqli_query($conn, $even_sql);
// end ALL - even projects

// ALL - odd projects
    $odd_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 1;";

    $odd_result = mysqli_query($conn, $odd_sql);
// end ALL - odd projects


// Web Development - even projects
    $even_wd_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 0 AND project_category = 'Web Development';";
    
    $even_wd_result = mysqli_query($conn, $even_wd_sql);
// end ALL - even projects

// Web Development - odd projects
    $odd_wd_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 1 AND project_category = 'Web Development';";

    $odd_wd_result = mysqli_query($conn, $odd_wd_sql);
// end ALL - odd projects






?>