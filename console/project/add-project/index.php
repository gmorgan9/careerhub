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


    <title>Add Project - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>


        <div class="page_title">
            <h2 class="text-white title">
                Add Project
            </h2>
        </div>
    <div class="container-fluid" style="max-width: 1320px; margin: 0 auto;">
        
        <div class="form">
            <form action="" method="POST">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <div class="controls two-columns">
                    <div class="left-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="project_name">Project Name <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_name" type="text" name="project_name" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_short_name">Project Short Name <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_short_name" type="text" name="project_short_name" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_github_link">Github Link <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_github_link" type="text" name="project_github_link" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_github_user">Github User <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_github_user" type="text" name="project_github_user" class="form-input" required>
                        </div>
                        <label class="form-label text-white" for="project_description">Description <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Optional</span></label>
                    </div>
                    <div class="right-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="project_URL">Project URL <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Optional</span></label>
                            <input id="project_url" type="text" name="project_url" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_release">Release Date <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_release" type="date" name="project_release" class="form-input" style="padding-bottom: 0 !important;" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_tech">Technologies <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <input id="project_tech" type="text" name="project_tech" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-white" for="project_category">Category <span class="text-danger" style="font-size: 8px; vertical-align: top;">&nbsp;<i class="bi bi-asterisk"></i></span></label>
                            <select class="form-input" name="project_category" required>
                                <option value="">Please select one...</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Scripting & Automation">Scripting & Automation</option>
                                <option value="Software Development">Software Development</option>
                            </select>
                        </div>
                    </div>
                </div>
                <textarea id="project_description" name="project_description" class="form-input mb-3" rows="2"></textarea>
                <input type="submit" name="add-project" class="form-btn mt-5 mb-3" value="Add Project">
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