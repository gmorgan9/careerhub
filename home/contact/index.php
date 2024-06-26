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

    <title>Contact - MorganServer Career Hub</title>

</head>
<body style="background-color: rgb(34,34,34);">
    
    <?php include(ROOT_PATH . "/app/database/includes/hub-header.php"); ?>

    <div class="page_title">
        <h2 class="text-white title">Contact</h2>
    </div>

    <div class="container w-100">
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">

            <div class="map-frame">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106813.99079929621!2d-96.65331520000001!3d33.21574225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c125aa0745495%3A0xaa290ada6420a624!2sMcKinney%2C%20TX!5e0!3m2!1sen!2sus!4v1719493304192!5m2!1sen!2sus" title="McKinney, TX 75070"></iframe>   
            </div>

            <div class="row">
                <div class=" col-xs-12 col-sm-4 ">
                    <div class="info-block">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-text">
                            <h4>McKinney, TX</h4>
                        </div>
                    </div>
                    <div class="info-block">
                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="info-text">
                            <h4>garrett.morgan.pro@gmail.com</h4>
                        </div>
                    </div>
                </div>
                <div class=" col-xs-12 col-sm-8 ">
                    <div class="block-title">
                        <h2>
                            How Can I Help You?
                        </h2>
                    </div>
                    <div class="form">
                    <div class="form">
    <form action="https://formsubmit.co/5858e7a751b8315d824b1bdf35ce716d" method="POST">
        <input type="hidden" name="_captcha" value="false">
        <input type="text" name="_honey" style="display:none">
        <input type="hidden" name="_next" value="<?php echo BASE_URL; ?>/home/contact/thank-you">
        <div class="controls two-columns">
            <div class="left-column">
                <div class="form-group">
                    <input id="full_name" type="text" name="full_name" class="form-input" placeholder="Full Name" required="required" data-error="Name is required.">
                </div>
                <div class="form-group">
                    <input id="email" type="text" name="email" class="form-input" placeholder="Email Address" required="required" data-error="Email Address is required.">
                </div>
                <div class="form-group">
                    <input id="subject" type="text" name="subject" class="form-input" placeholder="Subject" required="required" data-error="Subject is required.">
                </div>
            </div>
            <div class="right-column">
                <div class="form-group">
                    <textarea id="form_message" name="message" class="form-input" placeholder="Message" rows="7" required="required" data-error="Please, leave me a message."></textarea>
                </div>
            </div>
            <input type="submit" class="form-btn" value="Send message">
        </div>
    </form>
</div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>

    <!-- <script src="../../assets/js/slack_notify.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>