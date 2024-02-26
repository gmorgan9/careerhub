<?php
function loginUser($conn)
{
    if(isset($_POST['login-btn'])){
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        // $pass = md5($_POST['password']);
        $isadmin = $_POST['account_type'];
        $loggedin = $_POST['logged_in'];
     
        $select = " SELECT * FROM users WHERE uname = '$uname' && password = '$pass' ";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $sql = "UPDATE users SET logged_in='1' WHERE uname='$uname'";
            mysqli_query($conn, $sql);
            $_SESSION['fname']          = $row['fname'];
            $_SESSION['user_id']        = $row['user_id'];
            $_SESSION['loggedin']       = $row['logged_in'];
            $_SESSION['user_idno']      = $row['idno'];
            $_SESSION['lname']          = $row['lname'];
            $_SESSION['acc_type']       = $row['account_type'];
            $_SESSION['uname']          = $row['uname'];
            $_SESSION['email']          = $row['email'];
            $_SESSION['pass']           = $row['password'];
            header('location:' . BASE_URL . '/pages/dashboard.php');
            // header('location: pages/dashboard.php');
        } else {
           $error[] = 'Incorrect username or password!';
        }
     };
}
?>
