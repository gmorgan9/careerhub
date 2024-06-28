<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Jobs - MorganServer Career Hub</title>
    <link rel="stylesheet" href="../../../assets/css/home.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: rgb(34,34,34);
        }
        .page_title {
            text-align: center;
            padding: 20px 0;
        }
        .table-container {
            margin: 30px auto;
            width: 75%;
        }
        @media (max-width: 768px) {
            .table-container {
                width: 95%;
            }
        }
    </style>
</head>
<body>

<nav class="d-flex justify-content-between align-items-center" style="padding: 40px 70px 0px 70px;">
    <div class="left">
        <a href="/home" class="text-white text-decoration-none">
            <img src="../../../assets/images/logo.png" alt="" style="height: 44px; width: 44px;">
            &nbsp;<span style="font-size: 20px;"><strong>Garrett</strong> Morgan</span>
        </a>
    </div>
    <div class="right">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-secondary" href="/">Career Hub</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary active" href="/console">Console</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -50px;">
                    <a class="dropdown-item" href="/console/admin/add-job">Add Job</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?logout=1">Settings</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="page_title">    
        <h2 class="text-white title">Open Jobs</h2>
    </div>
<div class="container-fluid">
    

    <div class="table-container">
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Company</th>
                    <th scope="col">Location</th>
                    <th scope="col">Applied</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $idno = $row['idno'];
                        $job_title = $row['job_title'];
                        $company = $row['company'];
                        $location = $row['location'];
                        $created_at = new DateTime($row['created_at'], new DateTimeZone('UTC'));
                        $created_at->setTimezone(new DateTimeZone('America/Denver'));
                        $formatted_date = $created_at->format('M d, Y');
                ?>
                        <tr>
                            <th scope="row"><?php echo $idno; ?></th>
                            <td><?php echo $job_title ? $job_title : '-'; ?></td>
                            <td><?php echo $company ? $company : '-'; ?></td>
                            <td><?php echo $location ? $location : '-'; ?></td>
                            <td><?php echo $formatted_date ? $formatted_date : '-'; ?></td>
                            <td><?php echo $row['status'] ? $row['status'] : '-'; ?></td>
                            <td style="font-size: 20px;">
                                <a href="<?php echo BASE_URL; ?>/console/jobs/open-jobs/?viewid=<?php echo $id; ?>" class="view" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-eye text-success"></i>
                                </a>
                                &nbsp; 
                                <a href="/console/admin/update-job/?updateid=<?php echo $id; ?>" style="text-decoration: none;">
                                    <i class="bi bi-pencil-square" style="color:#005382;"></i>
                                </a>
                                &nbsp;
                                <a href="open-app.php?deleteid=<?php echo $id; ?>" class="delete" style="text-decoration: none;">
                                    <i class="bi bi-trash" style="color:#941515;"></i>
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="7" class="text-center">No jobs found.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Pagination links
        $sql_count = "SELECT COUNT(*) as total FROM jobs WHERE status = 'Applied'";
        $result_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $total_records = $row_count['total'];
        $total_pages = ceil($total_records / $limit);

        if ($total_pages > 1) {
            echo '<ul class="pagination justify-content-center">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active = ($page == $i) ? "active" : "";
                echo "<li class='page-item {$active}'><a class='page-link' href='?page={$i}'>{$i}</a></li>";
            }
            echo '</ul>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
