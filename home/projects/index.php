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

logoutUser($conn);
// if(isLoggedIn() == false) {
//     header('location:' . BASE_URL . '/login.php');
// }

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
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>
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

    <div class="container w-100">
        <div class="page_title">
            <h2 class="text-white title">
                Projects
            </h2>
        </div>
        
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">

            <div class="row">
                <div class=" col-xs-12 col-sm-12 ">
                    <ul class="portfolio-filters">
                        <li class="active"><a class="filter btn btn-sm btn-link" data-group="category_all">All</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_detailed">Detailed</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_direct-url">Direct URL</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_image">Image</a></li>
                        <li><a class="filter btn btn-sm btn-link" data-group="category_youtube-video">YouTube Video</a></li>
                    </ul>

                    <div class="portfolio-grid three-columns shuffle" style="height: 905.765625px; transition: height 450ms ease-out;">
                        <figure class="item standard shuffle-item filtered" data-groups="[&quot;category_all&quot;, &quot;category_detailed&quot;]" style="position: absolute; top: 0px; left: 0px; visibility: visible; transition: transform 450ms ease-out, opacity 450ms ease-out;">
                            <div class="portfolio-item-img">
                                <!-- <img fetchpriority="high" decoding="async" width="1280" height="853" src="https://lmpixels.com/wp/leven-wp/full-width-dark/wp-content/uploads/sites/5/2019/12/12.jpg" class="attachment-portfolio-image-three-c size-portfolio-image-three-c wp-post-image" alt="Full Project 2" title="" srcset="https://lmpixels.com/wp/leven-wp/full-width-dark/wp-content/uploads/sites/5/2019/12/12.jpg 1280w, https://lmpixels.com/wp/leven-wp/full-width-dark/wp-content/uploads/sites/5/2019/12/12-300x200.jpg 300w, https://lmpixels.com/wp/leven-wp/full-width-dark/wp-content/uploads/sites/5/2019/12/12-1024x682.jpg 1024w, https://lmpixels.com/wp/leven-wp/full-width-dark/wp-content/uploads/sites/5/2019/12/12-768x512.jpg 768w" sizes="(max-width: 768px) 92vw, (max-width: 992px) 450px, (max-width: 1200px) 597px, 25vw"> -->
                                 <img fetchpriority="high" decoding="async" width="1280" height="853" src="../../assets/images/project-images/emergency-prep.png" alt="">
                                <a href="#" onclick="openOffcanvas('test.php');"></a>
                                
                            </div>
                            
                        </figure>
                    </div>

                    
                    <!-- Button to toggle the offcanvas -->
<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
  Toggle top offcanvas
</button>

<!-- Offcanvas container -->
<div class="offcanvas offcanvas-lg" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Your PHP Page Content</p>
    <!-- Close button to close the offcanvas -->
    <button class="btn btn-secondary" onclick="closeOffcanvas()">Close</button>
  </div>
</div>


                </div>
            </div>
            
        </div> <!-- end -->

 
        

        
        <footer class="site-footer">
            <div class="footer-socials">
                <ul class="footer-social-links">
                    <li><a href="#" target="_blank">Twitter</a></li>
                    <li><a href="#" target="_blank">Facebook</a></li>
                    <li><a href="#" target="_blank">Instagram</a></li>
                </ul>

            </div>
            <div class="footer-copyright">
                <p>© 2024 All rights reserved.</p>
            </div>
        </footer>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>