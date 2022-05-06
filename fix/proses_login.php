<?php
    include 'connection.php';
    session_start();
    
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
    
        $qry = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
        $cek = mysqli_num_rows($qry);
        if ($cek == 1) {
            $_SESSION['username']=$username;
			$_SESSION['is_login']  = true;
            header("location: index.php");
            exit;
        } else {
            echo "Maaf username dan password salah!";
        }
    }
?>