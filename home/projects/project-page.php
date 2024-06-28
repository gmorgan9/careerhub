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


    <title>Projects - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
            <div class="left">
                <a href="/home" class="text-white text-decoration-none">
                    <img src="../../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
                    &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
                </a>
            </div>
            <div class="right">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/resume">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" href="/home/projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/home/contact">Contact</a>
                    </li>
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -50px;">
                                <a class="dropdown-item" href="/console">Console</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php?logout=1">Logout</a>
                            </div>
                        </li>  
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="/login">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    <!-- End Navbar -->

    <?php
        $idno = $_GET['key'];
        $projet_sql = "SELECT * FROM projects WHERE idno = $idno";
        $project_result = mysqli_query($conn, $projet_sql);
        if($project_result) {
            $num_rows = mysqli_num_rows($project_result);
            if($num_rows > 0) {
                while ($project = mysqli_fetch_assoc($project_result)) {
                    $project_id            = $project['project_id'];
                    $project_idno          = $project['idno'];  
                    $project_name          = $project['project_name']; 
                    $project_description   = $project['project_description'];
                    $project_github        = $project['project_github'];
                    $project_url           = $project['project_url'];
                    $project_release       = $project['project_release'];
                    $project_tech          = $project['project_tech'];
                    $project_share_link    = $project['project_share_link'];
                    $project_content       = $project['project_content'];

                    
                }
            }
        }
    ?>

    <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">
        <div class="portfolio-page-content mt-5">
            <div class="portfolio-page-wrapper">
                <div class="body">
                    <div class="portfolio-page-title">
                        <h2><?php echo $project_name; ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-8 portfolio-block">
                        </div>
                        <div class="col-sm-12 col-md-4 portfolio-block">
                            <div class="project-description">
                                <div class="block-title">
                                    <h3>Description</h3>
                                </div>
                                <a href="https://careerhub.morganserver.com/home/projects/test.php">test</a>
                                <ul class="project-general-info">
                                    <li>
                                        <p>
                                            <i class="bi bi-github"></i> &nbsp; 
                                            <a href="https://github.com/MorganServer/emergencyprep.git" target="_blank" class="">gmorgan9</a>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <i class="bi bi-globe"></i> &nbsp; 
                                            <a href="https://emergencyprep.morganserver.com" target="_blank">EmergencyPrep</a>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <i class="bi bi-calendar3"></i> &nbsp; 
                                            March 7, 2024
                                        </p>
                                    </li>
                                </ul>
                                <div class="text-justify">
                                    <p>
                                        This website serves as a vital resource hub for a church organization, offering essential information and tools for emergency preparedness.
                                    </p>
                                </div>
                                <div class="tags-block">
                                    <div class="block-title">
                                        <h3>Technology</h3>
                                    </div>
                                    <ul class="tags">
                                        <li><a href="">HTML</a></li>
                                        <li><a href="">CSS</a></li>
                                        <li><a href="">EmergencyPrep</a></li>
                                        <li><a href="">Website</a></li>
                                    </ul>
                                </div>
                                <div class="share-buttons">
                                    <div class="block-title">
                                        <h3>Share</h3>
                                    </div>
                                    <div class="btn-group">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://lmpixels.com/wp/leven-wp/full-width-dark/project/full-project-2/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="btn" target="_blank" title="Share on Facebook">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href="https://twitter.com/share?url=https://lmpixels.com/wp/leven-wp/full-width-dark/project/full-project-2/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" class="btn" target="_blank" title="Share on Twitter">
                                            <i class="bi bi-twitter"></i>
                                        </a>
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://lmpixels.com/wp/leven-wp/full-width-dark/project/full-project-2/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn" title="Share on LinkedIn">
                                            <i class="bi bi-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
