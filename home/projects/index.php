<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php";
require_once "../../path.php";
session_start();
include 'offcanvas.php';


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


    <title>Projects - MorganServer Career Hub</title>

</head>
<body style="background-color: rgb(34,34,34);">
    
    <?php include(ROOT_PATH . "/app/database/includes/hub-header.php"); ?>

    <div class="page_title">
        <h2 class="text-white title">Projects</h2>
    </div>

    <div class="container-fluid">
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">

            <div class="row">
                <div class=" col-xs-12 col-sm-12 ">
                    <ul class="portfolio-filters">
                        <li class="active"><a class="filter btn btn-sm btn-link" data-group="category_all">All</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_detailed">Website</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_direct-url">Coding</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_image">CyberSecurity</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_youtube-video">YouTube Video</a></li>
                    </ul>

                    
                    <div class="portfolio-grid three-columns shuffle" style="height: 905.765625px; transition: height 450ms ease-out;">
                        <figure class="item standard shuffle-item filtered" data-groups="[&quot;category_all&quot;, &quot;category_detailed&quot;]" style="position: absolute; top: 0px; left: 0px; visibility: visible; transition: transform 450ms ease-out, opacity 450ms ease-out;">
                            <div class="portfolio-item-img">
                                <img fetchpriority="high" decoding="async" width="1280" height="853" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png" alt="">
                                <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-<?php echo $project_id; ?>"></a> <!-- Adjust data-bs-target -->
                            </div>
                        </figure>
                    </div>
                            
                                
                </div>
            </div>

        </div>
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>