<?php
date_default_timezone_set('America/Denver');
require_once "../../../app/database/connection.php";
require_once "../../../path.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../../../app/functions/*.php");
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

    <script src="https://cdn.tiny.cloud/1/7kainuaawjddfzf3pj7t2fm3qdjgq5smjfjtsw3l4kqfd1h4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <link rel="stylesheet" href="../../../assets/css/home.css?v=<?php echo time(); ?>">


    <title>Add Certification - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>


        <div class="page_title">
            <h2 class="text-white title">
                Add Certification
            </h2>Project Short Nam
        </div>
    <div class="container-fluid" style="max-width: 1320px; margin: 0 auto; height: calc(100vh - 505px);">
        
        <div class="form">
            <form action="" method="POST">
                <div class="controls two-columns">
                    <div class="left-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="cert_name">Certification Name <span class="text-danger" style="font-size: 12px;">*</span></label>
                            <input id="cert_name" type="text" name="cert_name" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="cert_issued">Certification Issue Date <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Optional</span></label>
                            <input id="cert_issued" type="date" name="cert_issued" class="form-input" style="padding-bottom: 0 !important;">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="cert_expire">Certification Expiry Date <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Optional</span></label>
                            <input id="cert_expire" type="date" name="cert_expire" class="form-input" style="padding-bottom: 0 !important;">
                        </div>
                        <input type="submit" name="add-certification" class="form-btn mt-2" value="Add Certification">
                    </div>
                    <div class="right-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="cred_id">Credential ID <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Optional</span></label>
                            <input id="cred_id" type="text" name="cred_id" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="cert_provider">Certification Provider</label>
                            <input id="cert_provider" type="text" name="cert_provider" class="form-input" required>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
                   

    <script>
        tinymce.init({
            selector: '#project_content',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>