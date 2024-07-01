<?php
date_default_timezone_set('America/Denver');
require_once "../../../../app/database/connection.php";
require_once "../../../../path.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$files = glob("../../../../app/functions/*.php");
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

    <link rel="stylesheet" href="../../../../assets/css/home.css?v=<?php echo time(); ?>">


    <title>Update Experience - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">

    <?php include(ROOT_PATH . "/app/database/includes/console-header.php"); ?>


        <div class="page_title">
            <h2 class="text-white title">
                Update Experience
            </h2>
        </div>
    <div class="container-fluid" style="max-width: 1320px; margin: 0 auto;">
        
        <?php
            $id = $_GET['ce_id'];
            $sql = "SELECT * FROM career_experience WHERE ce_id=$id";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $num_rows = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ce_id          = $row['ce_id'];
                    $ce_idno        = $row['idno'];
                    $ce_job_title   = $row['ce_job_title'];
                    $ce_company     = $row['ce_company'];
                    $ce_start       = $row['ce_start'];
                    $ce_end         = $row['ce_end'];
                    $ce_job_duties  = $row['ce_job_duties'];
                    $ce_notes       = $row['ce_notes'];
                    $ce_status      = $row['ce_status'];
                ?>
        <div class="form">
            <form action="" method="POST">
                <div class="form-group">
                    <label class="form-label text-white" for="ce_company">Company Name</label>
                    <input id="cert_ce_companyname" type="text" name="ce_company" class="form-input" value="<?php echo $ce_company; ?>">
                </div>
                <div class="form-group">
                    <label class="form-label text-white" for="ce_job_title">Experience Job Title</label>
                    <input id="ce_job_title" type="text" name="ce_job_title" class="form-input" value="<?php echo $ce_job_title; ?>">
                </div>
                <div class="controls two-columns">
                    <div class="left-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="ce_start">Experience Start</label>
                            <input id="ce_start" type="text" name="ce_start" class="form-input" value="<?php echo $ce_start; ?>">
                        </div>
                    </div>
                    <div class="right-column">
                        <div class="form-group">
                            <label class="form-label text-white" for="ce_end">Experience End</label>
                            <input id="ce_end" type="text" name="ce_end" class="form-input" value="<?php echo $ce_end; ?>">
                        </div> 
                    </div>
                </div>
                <legend class="text-white" for="form-checks" style="font-size: 16px !important;">Active Career Experience <span class="text-secondary" style="font-size: 12px;">&nbsp;&nbsp;Only 3 active experiences can be shown at a time</span></legend>
                <div class="form-check form-check-inline text-white">
                  <input class="form-check-input" type="radio" name="ce_status" id="ce_status1" value="active-1" <?php if ($ce_status == 'active-1') { ?> checked <?php } else {} ?> <?php echo ($count_active1 == 1 && $ce_id != $id) ? 'disabled' : ''; ?>>
                  <label class="form-check-label" for="ce_status1">
                    Active 1
                  </label>
                </div>
                <div class="form-check form-check-inline text-white">
                  <input class="form-check-input" type="radio" name="ce_status" id="ce_status2" value="active-2" <?php if ($ce_status == 'active-2') {?> checked <?php } else {} ?> <?php echo ($count_active2 == 1 && $ce_id != $id) ? 'disabled' : ''; ?>>
                  <label class="form-check-label" for="ce_status2">
                    Active 2
                  </label>
                </div>
                <div class="form-check form-check-inline text-white mb-3">
                  <input class="form-check-input" type="radio" name="ce_status" id="ce_status3" value="active-3" <?php if ($ce_status == 'active-3') {?> checked <?php } else {} ?> <?php echo ($count_active3 == 1 && $ce_id != $id) ? 'disabled' : ''; ?>>
                  <label class="form-check-label" for="ce_status3">
                    Active 3
                  </label>
                </div>
                <br>
                <label class="form-label text-white" for="ce_job_duties">Experience Job Duties</label>
                <textarea id="ce_job_duties" name="ce_job_duties" class="form-input mb-3" rows="4"><?php echo $ce_job_duties; ?></textarea>
                <label class="form-label text-white" for="ce_notes">Experience Notes</label>
                <textarea id="ce_notes" name="ce_notes" class="form-input mb-3" rows="2"><?php echo $ce_notes; ?></textarea>
                <input type="submit" name="update-experience" class="form-btn mt-2" value="Update Experience">
            </form>
            <?php } } ?>

            <?php echo $count_active1; ?>
            <?php echo $count_active2; ?>
            <?php echo $count_active3; ?>
            <?php echo $id; ?>

        </div> 
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>
                   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>