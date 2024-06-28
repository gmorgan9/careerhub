<?php

// ADD FULL APPLICATION
	if (isset($_POST['add-full'])) {
		$idno  = rand(1000000, 9999999);
		$watchlist = isset($_POST['watchlist']) ? 1 : 0;
		$interview_set = isset($_POST['interview_set']) ? 1 : 0;
		if(isset($_POST['job_title'])) { $job_title = mysqli_real_escape_string($conn, $_POST['job_title']); } else { $job_title = ""; }
		if(isset($_POST['company'])) { $company = mysqli_real_escape_string($conn, $_POST['company']); } else { $company = ""; }
		if(isset($_POST['location'])) { $location = mysqli_real_escape_string($conn, $_POST['location']); } else { $location = ""; }
		// if(isset($_POST['job_desc'])) { $job_desc = mysqli_real_escape_string($conn, $_POST['job_desc']); } else { $job_desc = ""; }
		if(isset($_POST['pay'])) { $pay = mysqli_real_escape_string($conn, $_POST['pay']); } else { $pay = ""; }
		if(isset($_POST['bonus_pay'])) { $bonus_pay = mysqli_real_escape_string($conn, $_POST['bonus_pay']); } else { $bonus_pay = ""; }
		if(isset($_POST['status'])) { $status = mysqli_real_escape_string($conn, $_POST['status']); } else { $status = ""; }
		if(isset($_POST['job_link'])) { $job_link = mysqli_real_escape_string($conn, $_POST['job_link']); } else { $job_link = ""; }
		if(isset($_POST['job_type'])) { $job_type = mysqli_real_escape_string($conn, $_POST['job_type']); } else { $job_type = ""; }
		// if(isset($_POST['contact_name'])) { $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']); } else { $contact_name = ""; }
		// if(isset($_POST['contact_email'])) { $contact_email = mysqli_real_escape_string($conn, $_POST['contact_email']); } else { $contact_email = ""; }
		// if(isset($_POST['contact_phone'])) { $contact_phone = mysqli_real_escape_string($conn, $_POST['contact_phone']); } else { $contact_phone = ""; }
		// if(isset($_POST['start_date'])) { $start_date = mysqli_real_escape_string($conn, $_POST['start_date']); } else { $start_date = ""; }
		// if(isset($_POST['resume_used'])) { $resume_used = mysqli_real_escape_string($conn, $_POST['resume_used']); } else { $resume_used = ""; }
		if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }
		

		$select = "SELECT * FROM jobs WHERE idno = '$idno'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'Job already exists!';
		} else {
			$insert = "INSERT INTO jobs (idno, job_title, company, location, pay, bonus_pay, status, watchlist, job_link, job_type, interview_set, notes) 
			VALUES ('$idno',NULLIF('$job_title',''),NULLIF('$company',''),NULLIF('$location',''),NULLIF('$pay',''),NULLIF('$bonus_pay',''),NULLIF('$status',''),'$watchlist',NULLIF('$job_link',''),NULLIF('$job_type',''),'$interview_set',NULLIF('$notes',''))";
			mysqli_query($conn, $insert);
			header('location:' . BASE_URL . '/');
		}
	}
// END ADD FULL APPLICATION

?>