<?php

// ADD Project
	if (isset($_POST['add-project'])) {
		$idno  = rand(1000000, 9999999);
		if(isset($_POST['project_name'])) { $project_name = mysqli_real_escape_string($conn, $_POST['project_name']); } else { $project_name = ""; }
		if(isset($_POST['project_description'])) { $project_description = mysqli_real_escape_string($conn, $_POST['project_description']); } else { $project_description = ""; }
		if(isset($_POST['project_description'])) { $project_description = mysqli_real_escape_string($conn, $_POST['project_description']); } else { $project_description = ""; }
		if(isset($_POST['project_github'])) { $project_github = mysqli_real_escape_string($conn, $_POST['project_github']); } else { $project_github = ""; }
		if(isset($_POST['project_url'])) { $project_url = mysqli_real_escape_string($conn, $_POST['project_url']); } else { $project_url = ""; }
		if(isset($_POST['project_release'])) { $project_release = mysqli_real_escape_string($conn, $_POST['project_release']); } else { $project_release = ""; }
		if(isset($_POST['project_tech'])) { $project_tech = mysqli_real_escape_string($conn, $_POST['project_tech']); } else { $project_tech = ""; }
		if(isset($_POST['project_share_link'])) { $project_share_link = mysqli_real_escape_string($conn, $_POST['project_share_link']); } else { $project_share_link = ""; }
		if(isset($_POST['project_content'])) { $project_content = mysqli_real_escape_string($conn, $_POST['project_content']); } else { $project_content = ""; }
		

		$select = "SELECT * FROM projects WHERE idno = '$idno'";
		$result = mysqli_query($conn, $select);

		if (mysqli_num_rows($result) > 0) {
			$error[] = 'The project already exists!';
		} else {
			$insert = "INSERT INTO projects (idno, project_name, project_description, project_github, project_url, project_release, project_tech, project_share_link, project_content) VALUES ('$idno', NULLIF('$project_name',''), NULLIF('$project_description',''), NULLIF('$project_github',''), NULLIF('$project_url',''), NULLIF('$project_release',''), NULLIF('$project_tech',''), NULLIF('$project_share_link',''), NULLIF('$project_content',''))";
			mysqli_query($conn, $insert);
			header('location:' . BASE_URL . '/home/projects');
		}
	}
// END ADD FULL APPLICATION

?>