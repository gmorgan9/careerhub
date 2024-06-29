<?php
date_default_timezone_set('America/Denver');
require_once "../../app/database/connection.php";
require_once "../../path.php";
session_start();
// include 'offcanvas.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../../app/functions/*.php");
foreach ($files as $file) {
    require_once $file;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
                    
                    <!-- Project Filters -->
                        <ul class="project-filters nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item project-filter-item" role="presentation">
                                <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item project-filter-item" role="presentation">
                                <button class="nav-link" id="webdev-tab" data-bs-toggle="pill" data-bs-target="#webdev" type="button" role="tab" aria-controls="webdev" aria-selected="false">Web Development</button>
                            </li>
                            <li class="nav-item project-filter-item" role="presentation">
                                <button class="nav-link" id="scripting-automation-tab" data-bs-toggle="pill" data-bs-target="#scripting-automation" type="button" role="tab" aria-controls="scripting-automation" aria-selected="false">Scripting & Automation</button>
                            </li>
                            <li class="nav-item project-filter-item" role="presentation">
                                <button class="nav-link" id="software-dev-tab" data-bs-toggle="pill" data-bs-target="#software-dev" type="button" role="tab" aria-controls="software-dev" aria-selected="false">Software Development</button>
                            </li>
                        </ul>
                    <!-- end Project Filters -->
                    
                    <!-- All Content -->
                        <div class="tab-content project-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="row">

                                    <?php if($count_all == 0) { ?>
                                        <div class="alert project-alert" role="alert">
                                            No current projects.
                                        </div>
                                    <?php } ?>

                                    <!-- Column 1 (Odd Results) -->
                                        <div class="col-md-6">
                                            <!-- PHP code for Odd Results -->
                                                <?php
                                                if (mysqli_num_rows($odd_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($odd_result)) {
                                                        // Process and display each odd row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Odd Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> -->
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left-circle"></i></button>
                                                            <hr>
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                                            
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 1 (Odd Results) -->
                                        
                                    <!-- Column 2 (Even Results) -->
                                        <div class="col-md-6 mt-5">
                                            <!-- PHP code for Even Results -->
                                                <?php
                                                if (mysqli_num_rows($even_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($even_result)) {
                                                        // Process and display each even row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Even Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 2 (Even Results) -->

                                </div> <!-- end row  -->
                            </div> <!-- end tab-pane -->
                        </div> 
                    <!-- end All Content -->

                    <!-- Web Development Content -->
                        <div class="tab-content project-content" id="myTabContent">
                            <div class="tab-pane fade" id="webdev" role="tabpanel" aria-labelledby="webdev-tab">
                                <div class="row">

                                    <?php if($count_wd == 0) { ?>
                                        <div class="alert project-alert" role="alert">
                                            No current Web Development projects.
                                        </div>
                                    <?php } ?>

                                    <!-- Column 1 (Web Development - Odd Results) -->
                                        <div class="col-md-6">
                                            <!-- PHP code for Web Development - Odd Results -->
                                                <?php
                                                if (mysqli_num_rows($odd_wd_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($odd_wd_result)) {
                                                        // Process and display each odd row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Web Development - Odd Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                                            
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 1 (Web Development - Odd Results) -->
                                        
                                    <!-- Column 2 (Web Development - Even Results) -->
                                        <div class="col-md-6 mt-5">
                                            <!-- PHP code for Web Development - Even Results -->
                                                <?php
                                                if (mysqli_num_rows($even_wd_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($even_wd_result)) {
                                                        // Process and display each even row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Web Development - Even Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 2 (Web Development - Even Results) -->
                                    
                                </div> <!-- end row  -->
                            </div> <!-- end tab-pane -->
                        </div>
                    <!-- end Web Development Content -->

                    <!-- Scripting & Automation Content -->
                        <div class="tab-content project-content" id="myTabContent">
                            <div class="tab-pane fade" id="scripting-automation" role="tabpanel" aria-labelledby="scripting-automation-tab">
                                <div class="row">

                                    <?php if($count_sa == 0) { ?>
                                        <div class="alert project-alert" role="alert">
                                            No current Scripting & Automation projects.
                                        </div>
                                    <?php } ?>

                                    <!-- Column 1 (Scripting & Automation - Odd Results) -->
                                        <div class="col-md-6">
                                            <!-- PHP code for Scripting & Automation - Odd Results -->
                                                <?php
                                                if (mysqli_num_rows($odd_sa_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($odd_sa_result)) {
                                                        // Process and display each odd row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Scripting & Automation - Odd Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                                            
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 1 (Scripting & Automation - Odd Results) -->
                                        
                                    <!-- Column 2 (Scripting & Automation - Even Results) -->
                                        <div class="col-md-6 mt-5">
                                            <!-- PHP code for Scripting & Automation - Even Results -->
                                                <?php
                                                if (mysqli_num_rows($even_sa_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($even_sa_result)) {
                                                        // Process and display each even row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Scripting & Automation - Even Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 2 (Scripting & Automation - Even Results) -->
                                    
                                </div> <!-- end row  -->
                            </div> <!-- end tab-pane -->
                        </div>
                    <!-- end Scripting & Automation Content -->

                    <!-- Software Development Content -->
                        <div class="tab-content project-content" id="myTabContent">
                            <div class="tab-pane fade" id="software-dev" role="tabpanel" aria-labelledby="software-dev-tab">
                                <div class="row">

                                    <?php if($count_sd == 0) { ?>
                                        <div class="alert project-alert" role="alert">
                                            No current Software Development projects.
                                        </div>
                                    <?php } ?>

                                    <!-- Column 1 (Software Development - Odd Results) -->
                                        <div class="col-md-6">
                                            <!-- PHP code for Software Development - Odd Results -->
                                                <?php
                                                if (mysqli_num_rows($odd_sd_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($odd_sd_result)) {
                                                        // Process and display each odd row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Software Development - Odd Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                                            
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 1 (Software Development - Odd Results) -->
                                        
                                    <!-- Column 2 (Software Development - Even Results) -->
                                        <div class="col-md-6 mt-5">
                                            <!-- PHP code for Software Development - Even Results -->
                                                <?php
                                                if (mysqli_num_rows($even_sd_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($even_sd_result)) {
                                                        // Process and display each even row
                                                        $project_id            = $row['project_id'];
                                                        $project_idno          = $row['idno'];  
                                                        $project_name          = $row['project_name']; 
                                                        $project_short_name    = $row['project_short_name']; 
                                                        $project_description   = $row['project_description'];
                                                        $project_github_link   = $row['project_github_link'];
                                                        $project_github_user   = $row['project_github_user'];
                                                        $project_url           = $row['project_url'];
                                                        $project_release       = $row['project_release'];
                                                        $project_tech          = $row['project_tech'];
                                                        $project_content       = $row['project_content'];
                                                        $technologies          = explode(", ", $project_tech);
                                                ?>
                                            <!-- end PHP code for Software Development - Even Results -->
                                                    
                                            <div>
                                                <div style="height:400px" role="gridcell" id="cardHover" tabindex="0" class="project-cell" data-bs-toggle="offcanvas" data-bs-target="#web-dev-<?php echo $project_id; ?>">
                                                    <img id="cardHover" loading="lazy" width="500" height="500" decoding="async" data-nimg="1" class="" style="color:transparent" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png">
                                                    <div class="content__slate">
                                                        <h3><?php echo $project_name; ?></h3>
                                                        <p class="text-truncate" style="width: 350px;"><?php echo $project_description; ?></p>
                                                        <ul class="tags">
                                                            <?php foreach ($technologies as $tech): ?>
                                                                <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                            
                                                <!-- CANVAS -->
                                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="web-dev-<?php echo $project_id; ?>" aria-labelledby="offcanvasRightLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <?php echo $project_name; ?>
                                                        </div>
                                                    </div>
                                                <!-- end CANVAS -->
                                            </div>
                                                            
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- end Column 2 (Software Development - Even Results) -->
                                    
                                </div> <!-- end row  -->
                            </div> <!-- end tab-pane -->
                        </div>
                    <!-- end Software Development Content -->
                             
                </div>
            </div>

        </div>
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>