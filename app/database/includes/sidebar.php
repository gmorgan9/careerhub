<?php
$user_id = $_SESSION['userid'];
$select = " SELECT * FROM users WHERE userid = '$user_id' ";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
    $firstname    = $row['fname'];
    $loggedin     = $row['loggedin'];
    //$acct_type    = $row['isadmin'];
}}
?>

    <div class="nav position-fixed" id="navbar" style="margin-top: 40px; background-color: #1e2327;">
            <nav class="nav__container">
                <div>
                    <div class="nav__list">
                        <div class="nav__items">
                            <a href="<?php echo BASE_URL . '/rp-admin/' ?>" class="nav__link nav__logo side text-white">
                                &nbsp;&nbsp;<i class="bi bi-speedometer2 nav__icon" style="font-size: 18px;"></i>
                                <span class="nav__logo-name">&nbsp;Dashboard</span>
                            </a>
                            <div class="nav__dropdown">
                                <a href="<?php echo BASE_URL . '/rp-admin/all_recipes.php' ?>" class="nav__link side text-white">
                                    &nbsp;&nbsp;<i class="bi bi-book nav__icon" style="font-size: 18px;"></i>
                                    <span class="nav__name">&nbsp;Recipes</span>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="<?php echo BASE_URL . '/rp-admin/all_recipes.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;All Recipes</a>
                                        <a href="<?php echo BASE_URL . '/rp-admin/add_recipes.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;Add Recipes</a>
                                        <a href="<?php echo BASE_URL . '/rp-admin/categories.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;Categories</a>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle text-white">Settings</h3>

                            <a href="#" class="nav__link side text-white">
                                &nbsp;&nbsp;<i class="bi bi-sliders nav__icon" style="font-size: 18px;"></i>
                                <span class="nav__name">&nbsp;General</span>
                            </a>
    
                            <div class="nav__dropdown">
                                <a href="<?php echo BASE_URL . '/rp-admin/all_users.php' ?>" class="nav__link side text-white">
                                    &nbsp;&nbsp;<i class='bi bi-people nav__icon' style="font-size: 18px;"></i>
                                    <span class="nav__name">&nbsp;Users</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="<?php echo BASE_URL . '/rp-admin/all_users.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;All Users</a>
                                        <a href="<?php echo BASE_URL . '/rp-admin/add_user.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;Add New</a>
                                        <a href="<?php echo BASE_URL . '/rp-admin/profile.php' ?>" class="nav__dropdown-item side text-muted">&nbsp;Profile</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a> -->
            </nav>
        </div>


<!-- </div> -->











