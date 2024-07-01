<?php

// -------- Project Queries -------- //

// All - SELECT all projects
    $all_sql = "SELECT * FROM projects;";
    $all_result = mysqli_query($conn, $all_sql);
// End All - SELECT all projects

// All - (count) all projects
    $count_all_sql = "SELECT COUNT(*) AS count FROM projects;";
    $count_all_result = mysqli_query($conn, $count_all_sql);
    $count_all_row = mysqli_fetch_assoc($count_all_result);
    $count_all = $count_all_row['count'];
// End All - (count) all projects

// All - even projects
    $even_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 0;";

    $even_result = mysqli_query($conn, $even_sql);
// End All - even projects

// All - odd projects
    $odd_sql = "SELECT *
    FROM (
        SELECT 
            @row_number := @row_number + 1 AS row_num, 
            projects.*
        FROM projects, (SELECT @row_number := 0) AS t
    ) AS numbered_projects
    WHERE MOD(row_num, 2) = 1;";

    $odd_result = mysqli_query($conn, $odd_sql);
// End All - odd projects

// Web Development - (count) web development projects
    $count_wd_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Web Development';";
    $count_wd_result = mysqli_query($conn, $count_wd_sql);
    $count_wd_row = mysqli_fetch_assoc($count_wd_result);
    $count_wd = $count_wd_row['count'];
// End Web Development - (count) web development projects

// Web Development - even projects
    $even_wd_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Web Development'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";

    $even_wd_result = mysqli_query($conn, $even_wd_sql);
// End Web Development - even projects

// Web Development - odd projects
    $odd_wd_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Web Development'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_wd_result = mysqli_query($conn, $odd_wd_sql);
// End Web Development - odd projects

// Scripting & Automation - (count) scripting & automation projects
    $count_sa_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Scripting & Automation';";
    $count_sa_result = mysqli_query($conn, $count_sa_sql);
    $count_sa_row = mysqli_fetch_assoc($count_sa_result);
    $count_sa = $count_sa_row['count'];
// End Scripting & Automation - (count) scripting & automation projects

// Scripting & Automation - even projects
    $even_sa_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Scripting & Automation'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";
    
    $even_sa_result = mysqli_query($conn, $even_sa_sql);
// End Scripting & Automation - even projects

// Scripting & Automation - odd projects
    $odd_sa_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Scripting & Automation'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_sa_result = mysqli_query($conn, $odd_sa_sql);
// End Scripting & Automation - odd projects

// Software Development - (count) software development projects
    $count_sd_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Software Development';";
    $count_sd_result = mysqli_query($conn, $count_sd_sql);
    $count_sd_row = mysqli_fetch_assoc($count_sd_result);
    $count_sd = $count_sd_row['count'];
// End Software Development - (count) software development projects

// Software Development - even projects
    $even_sd_sql = "SELECT *
                    FROM (
                    SELECT projects.*,
                    ROW_NUMBER() OVER() AS row_num
                    FROM projects
                    WHERE project_category = 'Software Development'
                    ) AS numbered_projects
                    WHERE MOD(row_num, 2) = 0;";

    $even_sd_result = mysqli_query($conn, $even_sd_sql);
// End Software Development - even projects

// Software Development - odd projects
    $odd_sd_sql = "SELECT *
                   FROM (
                   SELECT projects.*,
                   ROW_NUMBER() OVER() AS row_num
                   FROM projects
                   WHERE project_category = 'Software Development'
                   ) AS numbered_projects
                   WHERE MOD(row_num, 2) = 1;";

    $odd_sd_result = mysqli_query($conn, $odd_sd_sql);
// End Software Development - odd projects

// Open Source - (count) open source projects
    $count_os_sql = "SELECT COUNT(*) AS count FROM projects WHERE project_category = 'Open Source';";
    $count_os_result = mysqli_query($conn, $count_os_sql);
    $count_os_row = mysqli_fetch_assoc($count_os_result);
    $count_os = $count_os_row['count'];
// End Open Source - (count) open source projects

// Open Source - even projects
    // $even_sd_sql = "SELECT *
    // FROM (
    //     SELECT 
    //         @row_number := @row_number + 1 AS row_num, 
    //         projects.*
    //     FROM projects, (SELECT @row_number := 0) AS t
    // ) AS numbered_projects
    // WHERE MOD(row_num, 2) = 0 AND project_category = 'Open Source';";

    // $even_sd_result = mysqli_query($conn, $even_sd_sql);
// End Open Source - even projects

// Open Sourcet - odd projects
    // $odd_os_sql = "SELECT *
    // FROM (
    //     SELECT 
    //         @row_number := @row_number + 1 AS row_num, 
    //         projects.*
    //     FROM projects, (SELECT @row_number := 0) AS t
    // ) AS numbered_projects
    // WHERE MOD(row_num, 2) = 1 AND project_category = 'Open Source';";

    // $odd_os_result = mysqli_query($conn, $odd_os_sql);
// End Open Source - odd projects


// -------- Select Queries -------- //

// Certifications - SELECT all certifications
    $cert_sql = "SELECT * FROM certifications;";
    $cert_result = mysqli_query($conn, $cert_sql);
// End Certifications - SELECT all certifications

// Career Experience - SELECT all active experience
    $ce_sql = "SELECT * FROM career_experience WHERE ce_status IN ('active-1', 'active-2', 'active-3') ORDER BY ce_status ASC;";
    $ce_result = mysqli_query($conn, $ce_sql);
// End Career Experience - SELECT all active experience

// Career Experience - SELECT all experience
    $ce_all_sql = "SELECT * FROM career_experience";
    $ce_all_result = mysqli_query($conn, $ce_all_sql);
// End Career Experience - SELECT all experience


// -------- Count Queries -------- //

// Certifications - Count all certifications
    $count_cert_sql = "SELECT COUNT(*) AS count FROM certifications;";
    $count_cert_result = mysqli_query($conn, $count_cert_sql);
    $count_cert_row = mysqli_fetch_assoc($count_cert_result);
    $count_cert = $count_cert_row['count'];
// End Certifications - SELECT all certifications

// Career Experience - Count active-1 Career Experience
    $count_active1_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-1';";
    $count_active1_result = mysqli_query($conn, $count_active1_sql);
    $count_active1_row = mysqli_fetch_assoc($count_active1_result);
    $count_active1 = $count_active1_row['count'];
// End Career Experience - Count active-1 Career Experience

// Career Experience - Count active-2 Career Experience
    $count_active2_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-2';";
    $count_active2_result = mysqli_query($conn, $count_active2_sql);
    $count_active2_row = mysqli_fetch_assoc($count_active2_result);
    $count_active2 = $count_active2_row['count'];
// End Career Experience - Count active-2 Career Experience

// Career Experience - Count active-3 Career Experience
    $count_active3_sql = "SELECT COUNT(*) AS count FROM career_experience WHERE ce_status = 'active-3';";
    $count_active3_result = mysqli_query($conn, $count_active3_sql);
    $count_active3_row = mysqli_fetch_assoc($count_active3_result);
    $count_active3 = $count_active3_row['count'];
// End Career Experience - Count active-3 Career Experience



// -------- Add Queries -------- //

// Certification - Add Certification
    if (isset($_POST['add-certification'])) {
        $idno = rand(1000000, 9999999);
        if(isset($_POST['cert_name'])) { $cert_name = mysqli_real_escape_string($conn, $_POST['cert_name']); } else { $cert_name = ""; }
    	if(isset($_POST['cert_short_name'])) { $cert_short_name = mysqli_real_escape_string($conn, $_POST['cert_short_name']); } else { $cert_short_name = ""; }
        if(isset($_POST['cert_issued'])) { $cert_issued = mysqli_real_escape_string($conn, $_POST['cert_issued']); } else { $cert_issued = ""; }
        if(isset($_POST['cert_expire'])) { $cert_expire = mysqli_real_escape_string($conn, $_POST['cert_expire']); } else { $cert_expire = ""; }
        if(isset($_POST['cert_renewed'])) { $cert_renewed = mysqli_real_escape_string($conn, $_POST['cert_renewed']); } else { $cert_renewed = ""; }
        if(isset($_POST['cred_id'])) { $cred_id = mysqli_real_escape_string($conn, $_POST['cred_id']); } else { $cred_id = ""; }
        if(isset($_POST['cert_provider'])) { $cert_provider = mysqli_real_escape_string($conn, $_POST['cert_provider']); } else { $cert_provider = ""; }

        $select = "SELECT * FROM certifications WHERE idno = '$idno'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'The certification already exists!';
        } else {
            $insert = "INSERT INTO certifications (idno, cert_name, cert_short_name, cert_issued, cert_expire, cert_renewed, cred_id, cert_provider) VALUES ('$idno', NULLIF('$cert_name',''), NULLIF('$cert_short_name',''), NULLIF('$cert_issued',''), NULLIF('$cert_expire',''), NULLIF('$cert_renewed',''), NULLIF('$cred_id',''), NULLIF('$cert_provider',''))";
            mysqli_query($conn, $insert);
            header('location:' . BASE_URL . '/console/certification');
        }
    }
// End Certification - Add Certification

// Experience - Add Experience
    if (isset($_POST['add-experience'])) {
        $idno = rand(1000000, 9999999);

        if(isset($_POST['ce_company'])) { $ce_company = mysqli_real_escape_string($conn, $_POST['ce_company']); } else { $ce_company = ""; }
        if(isset($_POST['ce_start'])) { $ce_start = mysqli_real_escape_string($conn, $_POST['ce_start']); } else { $ce_start = ""; }
        if(isset($_POST['ce_end'])) { $ce_end = mysqli_real_escape_string($conn, $_POST['ce_end']); } else { $ce_end = ""; }
        if(isset($_POST['ce_job_title'])) { $ce_job_title = mysqli_real_escape_string($conn, $_POST['ce_job_title']); } else { $ce_job_title = ""; }
        if(isset($_POST['ce_job_duties'])) { $ce_job_duties = mysqli_real_escape_string($conn, $_POST['ce_job_duties']); } else { $ce_job_duties = ""; }
        // if(isset($_POST['ce_status'])) { $ce_status = mysqli_real_escape_string($conn, $_POST['ce_status']); } else { $ce_status = ""; }
        if(isset($_POST['ce_notes'])) { $ce_notes = mysqli_real_escape_string($conn, $_POST['ce_notes']); } else { $ce_notes = ""; }


        $select = "SELECT * FROM career_experience WHERE idno = '$idno'";
        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result) > 0) {
            $error[] = 'The experience already exists!';
        } else {
            $insert = "INSERT INTO career_experience (idno, ce_company, ce_start, ce_end, ce_job_title, ce_job_duties, ce_notes) VALUES ('$idno', NULLIF('$ce_company',''), NULLIF('$ce_start',''), NULLIF('$ce_end',''), NULLIF('$ce_job_title',''), NULLIF('$ce_job_duties',''), NULLIF('$ce_notes',''))";
            mysqli_query($conn, $insert);
            header('location:' . BASE_URL . '/console/experience');
        }
    }
// End Experience - Add Experience

// Job - Add Job
    if (isset($_POST['add-full'])) {
    	$idno  = rand(1000000, 9999999);
    	$watchlist = isset($_POST['watchlist']) ? 1 : 0;
    	$interview_set = isset($_POST['interview_set']) ? 1 : 0;
    	if(isset($_POST['job_title'])) { $job_title = mysqli_real_escape_string($conn, $_POST['job_title']); } else { $job_title = ""; }
    	if(isset($_POST['company'])) { $company = mysqli_real_escape_string($conn, $_POST['company']); } else { $company = ""; }
    	if(isset($_POST['location'])) { $location = mysqli_real_escape_string($conn, $_POST['location']); } else { $location = ""; }
    	if(isset($_POST['pay'])) { $pay = mysqli_real_escape_string($conn, $_POST['pay']); } else { $pay = ""; }
    	if(isset($_POST['bonus_pay'])) { $bonus_pay = mysqli_real_escape_string($conn, $_POST['bonus_pay']); } else { $bonus_pay = ""; }
    	if(isset($_POST['status'])) { $status = mysqli_real_escape_string($conn, $_POST['status']); } else { $status = ""; }
    	if(isset($_POST['job_link'])) { $job_link = mysqli_real_escape_string($conn, $_POST['job_link']); } else { $job_link = ""; }
    	if(isset($_POST['job_type'])) { $job_type = mysqli_real_escape_string($conn, $_POST['job_type']); } else { $job_type = ""; }
    	if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }
    
    	$select = "SELECT * FROM jobs WHERE idno = '$idno'";
    	$result = mysqli_query($conn, $select);
    	if (mysqli_num_rows($result) > 0) {
    		$error[] = 'Job already exists!';
    	} else {
    		$insert = "INSERT INTO jobs (idno, job_title, company, location, pay, bonus_pay, status, watchlist, job_link, job_type, interview_set, notes) 
    		VALUES ('$idno',NULLIF('$job_title',''),NULLIF('$company',''),NULLIF('$location',''),NULLIF('$pay',''),NULLIF('$bonus_pay',''),NULLIF('$status',''),    '$watchlist',NULLIF('$job_link',''),NULLIF('$job_type',''),'$interview_set',NULLIF('$notes',''))";
    		mysqli_query($conn, $insert);
    		header('location:' . BASE_URL . '/console');
    	}
    }
// End Job - Add Job

// Project - Add Project
	if (isset($_POST['add-project'])) {
		$idno  = rand(1000000, 9999999);
		if(isset($_POST['project_name'])) { $project_name = mysqli_real_escape_string($conn, $_POST['project_name']); } else { $project_name = ""; }
		if(isset($_POST['project_short_name'])) { $project_short_name = mysqli_real_escape_string($conn, $_POST['project_short_name']); } else { $project_short_name = ""; }
		if(isset($_POST['project_description'])) { $project_description = mysqli_real_escape_string($conn, $_POST['project_description']); } else { $project_description = ""; }
		if(isset($_POST['project_github_link'])) { $project_github_link = mysqli_real_escape_string($conn, $_POST['project_github_link']); } else { $project_github_link = ""; }
		if(isset($_POST['project_github_user'])) { $project_github_user = mysqli_real_escape_string($conn, $_POST['project_github_user']); } else { $project_github_user = ""; }
		if(isset($_POST['project_url'])) { $project_url = mysqli_real_escape_string($conn, $_POST['project_url']); } else { $project_url = ""; }
		if(isset($_POST['project_release'])) { $project_release = mysqli_real_escape_string($conn, $_POST['project_release']); } else { $project_release = ""; }
		if(isset($_POST['project_tech'])) { $project_tech = mysqli_real_escape_string($conn, $_POST['project_tech']); } else { $project_tech = ""; }
		if(isset($_POST['project_category'])) { $project_category = mysqli_real_escape_string($conn, $_POST['project_category']); } else { $project_category = ""; }
		if(isset($_POST['project_content'])) { $project_content = mysqli_real_escape_string($conn, $_POST['project_content']); } else { $project_content = ""; }
		

		$select = "SELECT * FROM projects WHERE idno = '$idno'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'The project already exists!';
		} else {
			$insert = "INSERT INTO projects (idno, project_name, project_short_name, project_description, project_github_link, project_github_user, project_url, project_release, project_tech, project_category) VALUES ('$idno', NULLIF('$project_name',''), NULLIF('$project_short_name',''), NULLIF('$project_description',''), NULLIF('$project_github_link',''), NULLIF('$project_github_user',''), NULLIF('$project_url',''), NULLIF('$project_release',''), NULLIF('$project_tech',''), NULLIF('$project_category',''))";
			mysqli_query($conn, $insert);
			header('location:' . BASE_URL . '/console/project');
		}
	}
// End Project - Add Project


// -------- Update Queries -------- //

// Career Experience - Update Experience
    if (isset($_POST['update-experience'])) {

        // Sanitize input fields
        $ce_id = isset($_POST['ce_id']) ? mysqli_real_escape_string($conn, $_POST['ce_id']) : "";
        $ce_company = isset($_POST['ce_company']) ? mysqli_real_escape_string($conn, $_POST['ce_company']) : "";
        $ce_start = isset($_POST['ce_start']) ? mysqli_real_escape_string($conn, $_POST['ce_start']) : "";
        $ce_End = isset($_POST['ce_End']) ? mysqli_real_escape_string($conn, $_POST['ce_End']) : "";
        $ce_job_title = isset($_POST['ce_job_title']) ? mysqli_real_escape_string($conn, $_POST['ce_job_title']) : "";
        $ce_job_duties = isset($_POST['ce_job_duties']) ? mysqli_real_escape_string($conn, $_POST['ce_job_duties']) : "";
        $ce_status = isset($_POST['ce_status']) ? mysqli_real_escape_string($conn, $_POST['ce_status']) : "";
        $ce_notes = isset($_POST['ce_notes']) ? mysqli_real_escape_string($conn, $_POST['ce_notes']) : "";

        $update = "UPDATE career_experience SET 
                    ce_company = NULLIF('$ce_company', ''), 
                    ce_start = NULLIF('$ce_start', ''), 
                    ce_End = NULLIF('$ce_End', ''), 
                    ce_job_title = NULLIF('$ce_job_title', ''), 
                    ce_job_duties = NULLIF('$ce_job_duties', ''), 
                    ce_status = NULLIF('$ce_status', ''), 
                    ce_notes = NULLIF('$ce_notes', '')
                   WHERE ce_id = '$ce_id';";

        $result = mysqli_query($conn, $update);
        if (!$result) {
            die('Error updating record: ' . mysqli_error($conn));
        }
        header('location:' . BASE_URL . '/console/experience');
    }
// End Career Experience - Update Experience

// Projects - Update Project
    if (isset($_POST['update-project'])) {
        $project_id = isset($_POST['project_id']) ? mysqli_real_escape_string($conn, $_POST['project_id']) : "";
        $project_name = isset($_POST['project_name']) ? mysqli_real_escape_string($conn, $_POST['project_name']) : "";
        $project_short_name = isset($_POST['project_short_name']) ? mysqli_real_escape_string($conn, $_POST['project_short_name']) : "";
        $project_description = isset($_POST['project_description']) ? mysqli_real_escape_string($conn, $_POST['project_description']) : "";
        $project_github_link = isset($_POST['project_github_link']) ? mysqli_real_escape_string($conn, $_POST['project_github_link']) : "";
        $project_github_user = isset($_POST['project_github_user']) ? mysqli_real_escape_string($conn, $_POST['project_github_user']) : "";
        $project_url = isset($_POST['project_url']) ? mysqli_real_escape_string($conn, $_POST['project_url']) : "";
        $project_release = isset($_POST['project_release']) ? mysqli_real_escape_string($conn, $_POST['project_release']) : "";
        $project_tech = isset($_POST['project_tech']) ? mysqli_real_escape_string($conn, $_POST['project_tech']) : "";
        $project_category = isset($_POST['project_category']) ? mysqli_real_escape_string($conn, $_POST['project_category']) : "";

        $update = "UPDATE projects SET 
                    project_name = NULLIF('$project_name', ''), 
                    project_short_name = NULLIF('$project_short_name', ''), 
                    project_description = NULLIF('$project_description', ''), 
                    project_github_link = NULLIF('$project_github_link', ''), 
                    project_github_user = NULLIF('$project_github_user', ''), 
                    project_url = NULLIF('$project_url', ''), 
                    project_release = NULLIF('$project_release', ''), 
                    project_tech = NULLIF('$project_tech', ''), 
                    project_category = NULLIF('$project_category', '')
                   WHERE project_id = '$project_id';";

        $result = mysqli_query($conn, $update);
        if (!$result) {
            die('Error updating record: ' . mysqli_error($conn));
        }
        header('location:' . BASE_URL . '/console/project');
    }
// End Projects - Update Project

// Job - Update Job
    if (isset($_POST['update-full'])) {
        $id = $_POST['job_id'];
        $watchlist = isset($_POST['watchlist']) ? 1 : 0;
        $interview_set = isset($_POST['interview_set']) ? 1 : 0;
        if(isset($_POST['job_title'])) { $job_title = mysqli_real_escape_string($conn, $_POST['job_title']); } else { $job_title = ""; }
        if(isset($_POST['company'])) { $company = mysqli_real_escape_string($conn, $_POST['company']); } else { $company = ""; }
        if(isset($_POST['location'])) { $location = mysqli_real_escape_string($conn, $_POST['location']); } else { $location = ""; }
        if(isset($_POST['pay'])) { $pay = mysqli_real_escape_string($conn, $_POST['pay']); } else { $pay = ""; }
        if(isset($_POST['bonus_pay'])) { $bonus_pay = mysqli_real_escape_string($conn, $_POST['bonus_pay']); } else { $bonus_pay = ""; }
        if(isset($_POST['status'])) { $status = mysqli_real_escape_string($conn, $_POST['status']); } else { $status = ""; }
        if(isset($_POST['job_link'])) { $job_link = mysqli_real_escape_string($conn, $_POST['job_link']); } else { $job_link = ""; }
        if(isset($_POST['job_type'])) { $job_type = mysqli_real_escape_string($conn, $_POST['job_type']); } else { $job_type = ""; }
        if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }
        $select = "SELECT * FROM jobs WHERE idno = '$idno'";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $error[] = 'Job already exists!';
        } else {
            $update = "UPDATE jobs SET job_title = NULLIF('$job_title',''), company = NULLIF('$company',''), location = NULLIF('$location',''), pay = NULLIF('$pay',''), bonus_pay = NULLIF('$bonus_pay',''), status = NULLIF('$status',''), watchlist = '$watchlist', job_link = NULLIF('$job_link',''), job_type = NULLIF('$job_type',''), interview_set = '$interview_set', notes = NULLIF('$notes','') WHERE job_id = '$id';";
            mysqli_query($conn, $update);
            header('location:' . BASE_URL . '/console');
        }
    }
// End Job - Update Job

// Certification - Update Certification
    if (isset($_POST['update-certification'])) {
        $cert_id = isset($_POST['cert_id']) ? mysqli_real_escape_string($conn, $_POST['cert_id']) : "";
        $idno = isset($_POST['idno']) ? mysqli_real_escape_string($conn, $_POST['idno']) : "";
        $cert_name = isset($_POST['cert_name']) ? mysqli_real_escape_string($conn, $_POST['cert_name']) : "";
        $cert_short_name = isset($_POST['cert_short_name']) ? mysqli_real_escape_string($conn, $_POST['cert_short_name']) : "";
        $cert_issued = isset($_POST['cert_issued']) ? mysqli_real_escape_string($conn, $_POST['cert_issued']) : "";
        $cert_expire = isset($_POST['cert_expire']) ? mysqli_real_escape_string($conn, $_POST['cert_expire']) : "";
        $cert_renewed = isset($_POST['cert_renewed']) ? mysqli_real_escape_string($conn, $_POST['cert_renewed']) : "";
        $cred_id = isset($_POST['cred_id']) ? mysqli_real_escape_string($conn, $_POST['cred_id']) : "";
        $cert_provider = isset($_POST['cert_provider']) ? mysqli_real_escape_string($conn, $_POST['cert_provider']) : "";

        $update = "UPDATE certifications SET 
                    idno = NULLIF('$idno', ''), 
                    cert_name = NULLIF('$cert_name', ''), 
                    cert_short_name = NULLIF('$cert_short_name', ''), 
                    cert_issued = NULLIF('$cert_issued', ''), 
                    cert_expire = NULLIF('$cert_expire', ''), 
                    cert_renewed = NULLIF('$cert_renewed', ''), 
                    cred_id = NULLIF('$cred_id', ''), 
                    cert_provider = NULLIF('$cert_provider', '')
                   WHERE cert_id = '$cert_id';";

        $result = mysqli_query($conn, $update);
        if (!$result) {
            die('Error updating record: ' . mysqli_error($conn));
        }
        header('location:' . BASE_URL . '/console/certification');
    }
// End Certification - Update Certification


// -------- Delete Queries -------- //

// Career Experience - Delete Experience
    if(isset($_GET['expdelid'])) {
        $id = $_GET['expdelid'];

        $sql = "DELETE FROM career_experience WHERE ce_id=$id";
        $result = mysqli_query($conn, $sql);
        header('location:' . BASE_URL . '/console/experience');
    }
// End Career Experience - Delete Experience

// Projects - Delete project
    if(isset($_GET['prodelid'])) {
        $id = $_GET['prodelid'];

        $sql = "DELETE FROM projects WHERE project_id=$id";
        $result = mysqli_query($conn, $sql);
        header('location:' . BASE_URL . '/console/project');
    }
// End Projects - Delete project

// Jobs - Delete Job
    if(isset($_GET['jobdelid'])) {
        $id = $_GET['jobdelid'];

        $sql = "DELETE FROM jobs WHERE job_id=$id";
        $result = mysqli_query($conn, $sql);
    }
// End Jobs - Delete Job

// Certification - Delete certification
    if(isset($_GET['certdelid'])) {
        $id = $_GET['certdelid'];

        $sql = "DELETE FROM certification WHERE cert_id=$id";
        $result = mysqli_query($conn, $sql);
        header('location:' . BASE_URL . '/console/certification');
    }
// End Certification - Delete certification

?>