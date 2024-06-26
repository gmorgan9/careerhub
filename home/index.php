<?php
date_default_timezone_set('America/Denver');
require_once "../app/database/connection.php";
require_once "../path.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../app/functions/*.php");
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

    <link rel="stylesheet" href="../assets/css/home.css?v=<?php echo time(); ?>">


    <title>Home - MorganServer Career Hub</title>

</head>
<body style="background-color: rgb(34,34,34);">
    
    <?php include(ROOT_PATH . "/app/database/includes/hub-header.php"); ?>

    <div class="container-fluid">
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">
            <div class="row flex-v-align" style="margin-top: 150px;">
                <div class="col-sm-12 col-md-5 col-lg-5">
                    <img src="../assets/images/home-image.png" alt="">
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 d-flex flex-column justify-content-center">
                    <p class="text-secondary">
                        Cybersecurity Enthusiast
                    </p>
                    <h2 class="text-white" style="font-size: 48px;">
                        Garrett Morgan
                    </h2>
                    <p class="pt-3" style="color: #d5d5d5; width: 85%;">
                    Experienced in IT Audit with a strong foundation in cybersecurity, I am actively working to transition back into the technical cybersecurity field. Currently, I am pursuing multiple CompTIA certifications to enhance my expertise and skills.
                    </p>
                    <div class="pt-4 buttons">
                        <a href="../assets/files/garrett-morgan-resume.pdf" download="garrett-morgan-resume" id="" class="download_btn" style="background-color: rgb(51,51,51); border-radius: 50px; border: 2px solid #994E4E; padding: 15px 25px; text-decoration: none; color: white;">Download Résumé</a>
                        &nbsp;&nbsp;
                        <a href="/home/contact" id="" class="contact_btn" style="background-color: rgb(51,51,51); border-radius: 50px; border: 2px solid rgb(213,213,213); padding: 15px 25px;; text-decoration: none; color: white;">Contact me</a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 75px !important;">
                <div class="col-xs-12 col-sm-12">
                    <div class="block-title">
                        <h2>Fun Facts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-3">
                    <div class="lm-info-block">
                        <i class="bi bi-box"></i>
                        <h4>HTB Machines Owned</h4>
                        <span class="lm-info-block-value">10</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="lm-info-block">
                        <i class="bi bi-motherboard"></i>
                        <h4>Technologies Explored</h4>
                        <span class="lm-info-block-value">49</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="lm-info-block">
                        <i class="bi bi-watch"></i>
                        <h4>Working Hours</h4>
                        <span class="lm-info-block-value">10,000+</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="lm-info-block">
                        <i class="bi bi-cup-straw"></i>
                        <h4>Dr Peppers Consumed</h4>
                        <span class="lm-info-block-value">250+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>