<?php
$current_page = basename($_SERVER['REQUEST_URI']);
?>
<nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
    <div class="left">
        <a href="/home" class="text-white text-decoration-none">
            <img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
            &nbsp;<span style="font-size: 25px;"><strong>Garrett</strong> Morgan</span>
        </a>
    </div>
    <div class="right">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'home' || $current_page == '' ? 'active' : ''; ?>" href="/home">About Me</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'resume' ? 'active' : ''; ?>" href="/home/resume">Resume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'projects' ? 'active' : ''; ?>" href="/home/projects">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'contact' ? 'active' : ''; ?>" href="/home/contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary <?php echo $current_page == 'console' ? 'active' : ''; ?>" href="/console">Console</a>
            </li>
        </ul>
    </div>
</nav>