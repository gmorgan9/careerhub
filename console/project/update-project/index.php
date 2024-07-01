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


    <title>Update Project - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>


        <div class="page_title">
            <h2 class="text-white title">
                Update Project
            </h2>
        </div>
    <div class="container-fluid" style="max-width: 1320px; margin: 0 auto;">
        
        <?php
            $id = $_GET['updateid'];
            $sql = "SELECT * FROM projects WHERE project_id=$id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $project_idno           = $row['idno'];
                    $project_name           = $row['project_name'];
                    $project_short_name     = $row['project_short_name'];
                    $project_description    = $row['project_description'];
                    $project_github_link    = $row['project_github_link'];
                    $project_github_user    = $row['project_github_user'];
                    $project_url            = $row['project_url'];
                    $project_release        = $row['project_release'];
                    $project_tech           = $row['project_tech'];
                    $project_category       = $row['project_category'];
                    $project_content        = $row['project_content'];
        ?>
        <div class="form">
            <form action="" method="POST">
                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <div class="controls two-columns">
                    <div class="left-column">
                        <div class="form-group">
                            <input id="project_name" type="text" name="project_name" class="form-input" value="<?php echo $project_name; ?>">
                        </div>
                        <div class="form-group">
                            <input id="project_short_name" type="text" name="project_short_name" class="form-input" value="<?php echo $project_short_name; ?>" >
                        </div>
                        <div class="form-group">
                            <input id="project_github_link" type="text" name="project_github_link" class="form-input" value="<?php echo $project_github_link; ?>">
                        </div>
                        <div class="form-group">
                            <input id="project_github_user" type="text" name="project_github_user" class="form-input" value="<?php echo $project_github_user; ?>">
                        </div>
                    </div>
                    <div class="right-column">
                        <div class="form-group">
                            <input id="project_url" type="text" name="project_url" class="form-input" value="<?php echo $project_url; ?>">
                        </div>
                        <div class="form-group">
                            <input id="project_release" type="date" name="project_release" class="form-input" style="padding-bottom: 0 !important;" value="<?php echo $project_release; ?>">
                        </div>
                        <div class="form-group">
                            <input id="project_tech" type="text" name="project_tech" class="form-input" value="<?php echo $project_tech; ?>">
                        </div>
                        <div class="form-group">
                            <select class="form-input" name="project_category" style="color: rgb(169,169,169) !important;">
                                <option value="<?php echo $project_category; ?>"><?php echo $project_category; ?></option>
                                <option value="Web Development">Web Development</option>
                                <option value="Scripting & Automation">Scripting & Automation</option>
                                <option value="Software Development">Software Development</option>
                            </select>
                        </div>
                    </div>
                </div>
                <textarea id="project_description" name="project_description" class="form-input mb-3" rows="2"><?php echo $project_description; ?></textarea>
                <input type="submit" name="add-project" class="form-btn mt-5" value="Add Project">
            </form>
        </div>
            <?php } } ?>
 
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
                   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>