<?php
$current_page = basename($_SERVER['REQUEST_URI']);
?>
<nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
    <div class="left">
        <a href="/home" class="text-white text-decoration-none">
            <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
            &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
        </a>
    </div>
    <div class="right">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="/">Career Hub</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'console' || $current_page == '' ? 'active' : ''; ?>" href="/console">Console</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -50px;">
                    <a class="dropdown-item" href="/console/admin/add-job">Add Job</a>
                    <a class="dropdown-item disabled" href="/console/admin/update-job">Update Job</a>
                    <a class="dropdown-item" href="/console/admin/search-jobs">Search Jobs</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?logout=1">Settings</a>
                </div>
            </li>
        </ul>
    </div>
</nav>