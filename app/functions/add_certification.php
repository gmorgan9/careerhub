<?php

if (isset($_POST['add-certification'])) {
    $idno = rand(1000000, 9999999);
    if(isset($_POST['cert_name'])) { $cert_name = mysqli_real_escape_string($conn, $_POST['cert_name']); } else { $cert_name = ""; }
    if(isset($_POST['cert_issued'])) { $cert_issued = mysqli_real_escape_string($conn, $_POST['cert_issued']); } else { $cert_issued = ""; }
    if(isset($_POST['cert_expire'])) { $cert_expire = mysqli_real_escape_string($conn, $_POST['cert_expire']); } else { $cert_expire = ""; }
    if(isset($_POST['cert_renewed'])) { $cert_renewed = mysqli_real_escape_string($conn, $_POST['cert_renewed']); } else { $cert_renewed = ""; }
    if(isset($_POST['cred_id'])) { $cred_id = mysqli_real_escape_string($conn, $_POST['cred_id']); } else { $cred_id = ""; }
    if(isset($_POST['cert_provider'])) { $cert_provider = mysqli_real_escape_string($conn, $_POST['cert_provider']); } else { $cert_provider = ""; }
    // if(isset($_POST['cert_recipient'])) { $cert_recipient = mysqli_real_escape_string($conn, $_POST['cert_recipient']); } else { $cert_recipient = ""; }
    // if(isset($_POST['cert_tags'])) { $cert_tags = mysqli_real_escape_string($conn, $_POST['cert_tags']); } else { $cert_tags = ""; }
    // if(isset($_POST['notes'])) { $notes = mysqli_real_escape_string($conn, $_POST['notes']); } else { $notes = ""; }

    $select = "SELECT * FROM certifications WHERE idno = '$idno'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'The certification already exists!';
    } else {
        $insert = "INSERT INTO certifications (idno, cert_name, cert_issued, cert_expire, cert_renewed, cred_id, cert_provider) VALUES ('$idno', NULLIF('$cert_name',''), NULLIF('$cert_issued',''), NULLIF('$cert_expire',''), NULLIF('$cert_renewed',''), NULLIF('$cred_id',''), NULLIF('$cert_provider',''))";
        mysqli_query($conn, $insert);
        header('location:' . BASE_URL . '/home/resume');
    }
}

?>