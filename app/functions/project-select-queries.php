<?php

// Debug and handle errors for even rows
$even_sql = "SELECT *
FROM (
    SELECT 
        @row_number := @row_number + 1 AS row_num, 
        projects.*
    FROM projects, (SELECT @row_number := 0) AS t
) AS numbered_projects
WHERE MOD(row_num, 2) = 0;";

$even_result = mysqli_query($conn, $even_sql);

// Debug and handle errors for odd rows
$odd_sql = "SELECT *
FROM (
    SELECT 
        @row_number := @row_number + 1 AS row_num, 
        projects.*
    FROM projects, (SELECT @row_number := 0) AS t
) AS numbered_projects
WHERE MOD(row_num, 2) = 1;";

$odd_result = mysqli_query($conn, $odd_sql);



?>