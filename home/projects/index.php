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

    <div class="container-fluid" style="height: 100vh !important;">
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">

            <div class="row">
                <div class=" col-xs-12 col-md-10 mx-auto">
                    <ul class="project-filters nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                      <li class="nav-item project-filter-item" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                      </li>
                      <li class="nav-item project-filter-item" role="presentation">
                        <button class="nav-link" id="pills-web-dev-tab" data-bs-toggle="pill" data-bs-target="#pills-web-dev" type="button" role="tab" aria-controls="pills-web-dev" aria-selected="false">Web Development</button>
                      </li>
                      <li class="nav-item project-filter-item" role="presentation">
                        <button class="nav-link" id="pills-scripting-tab" data-bs-toggle="pill" data-bs-target="#pills-scripting" type="button" role="tab" aria-controls="pills-scripting" aria-selected="false">Scripting</button>
                      </li>
                      <li class="nav-item project-filter-item" role="presentation">
                        <button class="nav-link" id="pills-open-source-tab" data-bs-toggle="pill" data-bs-target="#pills-open-source" type="button" role="tab" aria-controls="pills-open-source" aria-selected="false">Open Source</button>
                      </li>
                    </ul>

                    <div class="tab-content mx-auto" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">

                            <div class="project-layout">
                                <div class="project-cell" style="height: 400px; width: 448px !important;">
                                    <img src="../../assets/images/project-images/EmergencyPrep.png" style="height: 500px;" alt="">
                                </div>
                                <div class="project-cell" style="height: 400px; width: 448px !important;">
                                    <img src="../../assets/images/project-images/EmergencyPrep.png" style="height: 500px;" alt="">
                                </div>
                            </div>

                        </div>

                  <div class="tab-pane fade" id="pills-web-dev" role="tabpanel" aria-labelledby="pills-web-dev-tab" tabindex="0">Web Development</div>
                  <div class="tab-pane fade" id="pills-scripting" role="tabpanel" aria-labelledby="pills-scripting-tab" tabindex="0">Scripting</div>
                  <div class="tab-pane fade" id="pills-open-source" role="tabpanel" aria-labelledby="pills-open-source-tab" tabindex="0">Open Source</div>
                </div>

                            
                                
                </div>
            </div>

        </div>
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>