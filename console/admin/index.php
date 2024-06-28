<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php";
require_once "../../path.php";
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../../app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../assets/css/home.css?v=<?php echo time(); ?>">


    <title>Admin - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>


    <div class="container w-100">

        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">

        </div>
        
    </div>
                   





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
