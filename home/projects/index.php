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

                    <?php
$projet_sql = "SELECT * FROM projects";
$project_result = mysqli_query($conn, $projet_sql);

if (mysqli_num_rows($project_result) > 0) {
    while ($project = mysqli_fetch_assoc($project_result)) {
        $project_id            = $project['project_id'];
        $project_idno          = $project['idno'];  
        $project_name          = $project['project_name']; 
        $project_short_name    = $project['project_short_name']; 
        $project_description   = $project['project_description'];
        $project_github_link   = $project['project_github_link'];
        $project_github_user   = $project['project_github_user'];
        $project_url           = $project['project_url'];
        $project_release       = $project['project_release'];
        $project_tech          = $project['project_tech'];
        $project_content       = $project['project_content'];
        $technologies          = explode(", ", $project_tech);
        
        // Format release date
        $formatted_release_date = date("F j, Y", strtotime($project_release));
?>
        <div class="portfolio-grid three-columns shuffle" style="height: 905.765625px; transition: height 450ms ease-out;">
            <figure class="item standard shuffle-item filtered" data-groups="[&quot;category_all&quot;, &quot;category_detailed&quot;]" style="position: absolute; top: 0px; left: 0px; visibility: visible; transition: transform 450ms ease-out, opacity 450ms ease-out;">
                <div class="portfolio-item-img">
                    <img fetchpriority="high" decoding="async" width="1280" height="853" src="../../assets/images/project-images/<?php echo $project_short_name; ?>.png" alt="">
                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-<?php echo $project_id; ?>"></a> <!-- Adjust data-bs-target -->
                </div>
            </figure>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas-<?php echo $project_id; ?>" aria-labelledby="offcanvasTopLabel" style="width: 100vw;">
            <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">
                <div class="portfolio-page-content mt-5">
                    <div class="portfolio-page-wrapper">
                        <div class="body">
                        <nav class="portfolio-page-nav">
                                  <div class="nav-item portfolio-page-close-button">
                                      <a href="" id="portfolio-page-close-button" data-bs-dismiss="offcanvas">
                                          <i class="bi bi-x"></i>
                                      </a>
                                  </div>
                                </nav>
                            <div class="portfolio-page-title">
                                <h2><?php echo $project_name; ?></h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 portfolio-block">
                                    <div class="project-content">
                                        <?php echo $project_content; ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 portfolio-block">
                                    <div class="project-description">
                                        <div class="block-title">
                                            <h3>Description</h3>
                                        </div>
                                        <ul class="project-general-info">
                                            <li>
                                                <p>
                                                    <i class="bi bi-github"></i> &nbsp; 
                                                    <a href="<?php echo $project_github_link; ?>" target="_blank" class=""><?php echo $project_github_user; ?></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <i class="bi bi-globe"></i> &nbsp; 
                                                    <a href="<?php echo $project_url; ?>" target="_blank"><?php echo $project_short_name; ?></a>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <i class="bi bi-calendar3"></i> &nbsp; 
                                                    <?php echo $formatted_release_date; ?>
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="text-justify">
                                            <p>
                                                <?php echo $project_description; ?>
                                            </p>
                                        </div>
                                        <div class="tags-block">
                                            <div class="block-title">
                                                <h3>Technology</h3>
                                            </div>
                                            <ul class="tags">
                                                <?php foreach ($technologies as $tech): ?>
                                                    <li><a href=""><?php echo htmlspecialchars($tech); ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    } 
} else {
    // If no projects found, display a message
?>
    <div class="portfolio-grid three-columns shuffle">
        <p>No current projects.</p>
    </div>
<?php
}
?>


                  


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