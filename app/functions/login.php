<?php
function loginUser($conn)
{
    if(isset($_POST['login-btn'])){
        // Check if 'user_id' is set in $_POST
        $user_id = isset($_POST['user_id']) ? mysqli_real_escape_string($conn, $_POST['user_id']) : '';
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $loggedin = $_POST['logged_in'];
        $select = "SELECT * FROM users WHERE uname = '$uname' && password = '$password'";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            $sql = "UPDATE users SET logged_in='1' WHERE uname='$uname'";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['fname']        = $row['fname'];
                // Use isset to avoid undefined index warnings
                $_SESSION['user_id']      = isset($row['user_id']) ? $row['user_id'] : '';
                $_SESSION['loggedin']     = isset($row['loggedin']) ? $row['loggedin'] : '';
                $_SESSION['user_idno']    = $row['idno'];
                $_SESSION['lastname']     = $row['lname'];
                $_SESSION['username']     = $row['uname'];
                $_SESSION['email']        = $row['email'];
                $_SESSION['pass']         = $row['password'];
                $_SESSION['loggedin']     = true;
                header('location:' . BASE_URL . '/');
            }
        } else {
           $error[] = 'Incorrect username or password!';
        }
     };
}
?>
