<?php
function loginUser($conn)
{
    $uname = ($conn, $_POST['uname']);
    $password = md5($_POST['password']);
    $select = "SELECT * FROM users WHERE uname = '$uname' && password = '$password'";
    $result = mysqli_query($conn, $select);
        
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $sql = "UPDATE users SET logged_in='1' WHERE uname='$uname'";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['fname']        = $row['fname'];
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
        $_SESSION['error'][] = 'Incorrect username or password!';
    }
}
?>
