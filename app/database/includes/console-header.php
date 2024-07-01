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
                <a class="nav-link text-secondary <?php echo $current_page == 'console' ? 'active' : ''; ?>" href="/console">Console</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown" style="margin-left: -50px;">
                    <span class="dropdown-item-text"><strong>Job Central</strong></span>
                    <a class="dropdown-item" href="/console/job/all-jobs"><span>View</span></a>
                    <a class="dropdown-item" href="/console/job/add-job"><span>Add</span></a>
                    <a class="dropdown-item" href="/console/job/search-jobs"><span>Search Jobs</span></a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item-text"><strong>Experience</strong></span>
                    <a class="dropdown-item" href="/console/experience"><span>View</span></a>
                    <a class="dropdown-item" href="/console/experience/add-experience"><span>Add</span></a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item-text"><strong>Projects</strong></span>
                    <a class="dropdown-item" href="/console/project"><span>View</span></a>
                    <a class="dropdown-item" href="/console/project/add-project"><span>Add</span></a>
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-item-text"><strong>Certifications</strong></span>
                    <a class="dropdown-item" href="/console/certification"><span>View</span></a>
                    <a class="dropdown-item" href="/console/certification/add-certification"><span>Add</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?logout=1">Settings</a>
                </div>
            </li>
        </ul>
    </div>
</nav>