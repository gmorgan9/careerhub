<div class="header">
    <h3 class="logo ms-3 me-3">
        
        Job Management System
        <!-- Set the href attribute to the logout page URL -->
        <a class="float-end" href="index.php?logout=1"><button style="cursor:pointer;" class="btn btn-link text-black"><i class="bi bi-box-arrow-left fs-5"></i></button></a>
    </h3>
</div>
<br>


<?php if (isset($_SESSION['fname'])) : ?>
    <h1 style="margin-left: 150px;" class="text-center">Welcome <strong><?php echo $_SESSION['fname']; ?></strong></h1>
<?php endif ?>
<br>
