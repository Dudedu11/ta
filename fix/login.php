<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="icon" href="img/logo2.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.svg">
	<img class="wavee" src="img/welcome.svg">
	<div class="container">
		<div class="img">
			<img src="img/hotel.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST" >
				<!-- <img src="img/logo.png"> -->
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nama Pengguna</h5>
           		   		<input type="text" class="input" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Kata Sandi</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
            	<!-- <a href="#">Forgot Password?</a> -->
            	<input type="submit" class="btn" value="Masuk" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>


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
			?>
            <script language="JavaScript">
            alert('Username atau Password tidak sesuai ...');
            document.location='./';
        	</script>
			<?php
        }
    }
?>