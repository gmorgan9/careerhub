<?php
// session_start();
// require_once "app/database/functions.php";
// require_once "../../../path.php";

// Check if the logout parameter is set and call the logoutUser() function
// if (isset($_GET['logout'])) {
    // logoutUser();
// }
?>

<div class="header">
    <h3 class="logo ms-3 me-3">
        
        Job Management System
        <!-- Set the href attribute to the logout page URL -->
        <a class="float-end" href="index.php?logout=1"><button style="cursor:pointer;" class="btn btn-link text-black"><i class="bi bi-box-arrow-left fs-5"></i></button></a>
    </h3>
</div>
<br>
<div class="record_incident float-end me-5">
    <a href="record-incident.php"><button class="btn btn-secondary rec">Record Job</button></a>
</div>

<?php if (isset($_SESSION['fname'])) : ?>
    <h1 style="margin-left: 150px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
<?php endif ?>
<br>
