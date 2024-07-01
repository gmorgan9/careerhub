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

$cert_sql = "SELECT * FROM certifications;";
$cert_result = mysqli_query($conn, $cert_sql);

$count_cert_sql = "SELECT COUNT(*) AS count FROM certifications;";
$count_cert_result = mysqli_query($conn, $count_cert_sql);
$count_cert_row = mysqli_fetch_assoc($count_cert_result);
$count_cert = $count_cert_row['count'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../assets/css/home.css?v=<?php echo time(); ?>">


    <title>Resume - MorganServer Career Hub</title>

    
</head>
<body style="background-color: rgb(34,34,34);">
    
    <?php include(ROOT_PATH . "/app/database/includes/hub-header.php"); ?>

    <div class="page_title">
        <h2 class="text-white title">
             Résumé
        </h2>
    </div>

    <div class="container-fluid">
        <div class="content text-white" style="max-width: 1320px; margin: 0 auto;">
            <div class="row">
                <div class="col-xs-12 col-sm-6 ">

                    <!-- Education -->
                        <div class="block-title">
                            <h2>Education</h2>
                        </div>
                        <div class="timeline clearfix">
                            <div class="timeline-item">
                                <h5 class="item-period ">2023</h5>
                                <span class="item-company">Brigham Young University</span>
                                <h4 class="item-title">Bachelor of Science in Cybersecurity</h4>
                                <div class="text">
                                Relevant Coursework: Info Assurance & Security, Database Principles & Application, Computer Networks, Operating Systems, Fundamentals of Web-Based Information Technology, Pentesting, Digital Forensics, Cloud Architecture
                                </div>
                            </div>
                        </div>
                    <!-- end Education -->

                    <!-- end Additional Skills & Interests -->
                        <div class="block-title" style="margin-top: 35px;">
                            <h2>Additional Skills & Interests</h2>
                        </div>
                        <div class="text">
                            <div class="row pb-3">
                                <div class="col-sm-4">
                                    SIEM Tools
                                </div>
                                <div class="col-xs-9 col-sm-6">
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-half"></i>
                                </div>
                                <span class="text-secondary fst-italic" style="font-size: 12px;">Including Burpesuite, Wazuh, ELK Stack, OSquery</span>
                            </div>
                            <div class="row pb-3">
                                <div class="col-sm-4">
                                    Linux
                                </div>
                                <div class="col-xs-9 col-sm-6">
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-half"></i>
                                </div>
                                <span class="text-secondary fst-italic" style="font-size: 12px;">Including Ubuntu, Kali, CLI</span>
                            </div>
                            <div class="row pb-3">
                                <div class="col-sm-4">
                                    Coding
                                </div>
                                <div class="col-sm-6">
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square"></i>
                                </div>
                                <span class="text-secondary fst-italic" style="font-size: 12px;">Including Python, C(novice), C++(novice)</span>
                            </div>
                            <div class="row pb-3">
                                <div class="col-sm-4">
                                    Web Development
                                </div>
                                <div class="col-xs-9 col-sm-6">
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square"></i>
                                </div>
                                <span class="text-secondary fst-italic" style="font-size: 12px;">Including HTML, CSS, Javascript, PHP</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    Database Development
                                </div>
                                <div class="col-xs-9 col-sm-6">
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square-fill"></i>
                                    <i class="bi bi-square"></i>
                                </div>
                                <span class="text-secondary fst-italic" style="font-size: 12px;">Including MySQL, PostgresSQL, MariaDB</span>
                            </div>
                        </div>
                    <!-- end Additional Skills & Interests -->

                </div>
                <div class="col-xs-12 col-sm-6 ">

                    <!-- Experience -->
                        <div class="block-title">
                            <h2>Experience</h2>
                        </div>
                        <div class="timeline clearfix">
                            <?php
                                if (mysqli_num_rows($ce_result) > 0) {
                                    while ($row = mysqli_fetch_assoc($ce_result)) {
                                        // Process and display each odd row
                                        $ce_id           = $row['ce_id'];
                                        $ce_idno         = $row['idno'];  
                                        $ce_company      = $row['ce_company']; 
                                        $ce_start        = $row['ce_start']; 
                                        $ce_end          = $row['ce_end'];
                                        $ce_job_title    = $row['ce_job_title'];
                                        $ce_job_duties   = $row['ce_job_duties'];
                                        $ce_status       = $row['ce_status'];
                                        $job_duties      = explode(". ", $ce_job_duties);
                            ?>
                            <div class="timeline-item">
                                <h5 class="item-period "><?php echo $ce_start; ?> - <?php if(is_null($ce_end)) { ?>Current <?php } else { echo $ce_end; } ?></h5>
                                <span class="item-company"><?php echo $ce_company; ?></span>
                                <h4 class="item-title"><?php echo $ce_job_title; ?></h4>
                                <div class="text">
                                    <ul>
                                        <?php foreach ($job_duties as $job_duty): ?>
                                            <li><?php echo htmlspecialchars($job_duty); ?>/li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php }} ?>
                            <!-- <div class="timeline-item">
                                <h5 class="item-period ">Jan 2023 - July 2023</h5>
                                <span class="item-company">Arctic Wolf</span>
                                <h4 class="item-title">Triage Security Analyst Intern</h4>
                                <div class="text">
                                    <ul>
                                        <li>
                                            Triaged 500+ customer requests daily, applied playbook driven solutions, and initiated incident investigations.
                                        </li>
                                        <li>
                                            Developed new run books resulting in a 20% increase in team efficiency through streamlined processes and enhanced knowledge management.
                                        </li>
                                        <li>
                                            Troubleshot and resolved over 100 issues with sensors and scanners, achieving a 97% success rate in maintaining operational health and minimizing downtime..
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- <div class="timeline-item">
                                <h5 class="item-period ">Jan 2023 - July 2023</h5>
                                <span class="item-company">Brigham Young University Office of Information Technology</span>
                                <h4 class="item-title">Student Systems Engineer</h4>
                                <div class="text">
                                    <ul>
                                        <li>
                                            Managed and optimized over 10 ESXi hypervisors, utilizing vCenter technology to oversee and enhance the performance of 200+ virtual machines (VMs), resulting in a 20% reduction in downtime and a 15% improvement in overall system efficiency.
                                        </li>
                                        <li>
                                            Diagnosed and resolved technical challenges pertaining to Dell MX chassis, blades, and network switches.
                                        </li>
                                        <li>
                                        Documented 15+ processes and procedures for future reference, enhancing team efficiency by 10% and facilitating knowledge sharing across departments.
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    <!-- end Experience -->

                </div>
            </div>
            <div class="row">

                <!-- Certifications -->
                    <div class="block-title">
                        <h2>Certifications</h2>
                    </div>
                    <div class="row">
                        <?php if($count_cert == 0) { ?>
                            <div class="alert project-alert" role="alert">
                                No current certifications.
                            </div>
                        <?php } ?>
                        <?php
                            if (mysqli_num_rows($cert_result) > 0) {
                                while ($row = mysqli_fetch_assoc($cert_result)) {
                                    // Process and display each odd row
                                    $cert_id            = $row['cert_id'];
                                    $cert_idno          = $row['idno'];  
                                    $cert_name          = $row['cert_name']; 
                                    $cert_short_name    = $row['cert_short_name']; 
                                    $cert_issued        = $row['cert_issued'];
                                    $cert_expire        = $row['cert_expire'];
                                    $cert_renewed       = $row['cert_renewed'];
                                    $cred_id            = $row['cred_id'];
                                    $cert_provider      = $row['cert_provider'];
                                    $cert_recipient     = $row['cert_recipient'];
                        ?>
                        <div class=" col-xs-12 col-sm-6 "> <!-- Network+ -->
                            <div class="certificate-item clearfix">
                                <div class="cert-logo">
                                    <img decoding="async" src="../../assets/images/cert-logos/<?php echo $cert_short_name; ?>.png" alt="logo">
                                </div>
                                <div class="cert-content">
                                    <div class="cert-title">
                                        <h4>
                                            <!-- Network+ N10-008 -->
                                            <?php echo $cert_name; ?>
                                        </h4>
                                    </div>
                                    <div class="cert-id">
                                        <span>
                                            <?php if (is_null($cred_id)) { ?>
                                            Credential ID: ----
                                            <?php } else { ?>
                                                Credential ID: <?php echo $cred_id; ?>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <div class="cert-date">
                                        <span>
                                            <?php if(is_null($cert_issued)) { ?>
                                            In-progress
                                            <?php } else { ?>
                                                Issued: <?php echo $cert_issued; ?>
                                            <?php } ?>
                                        </span>
                                    </div>
                                    <div class="cert-company">
                                        <span>
                                            <?php echo $cert_provider; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>
                    </div>
                <!-- end Certifications -->

            </div>
        </div>

        
    </div>

    <?php include(ROOT_PATH . "/app/database/includes/site-footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- <script src="<?php //echo BASE_URL; ?>/assets/js/active-page.js"></script> -->


</body>
</html>