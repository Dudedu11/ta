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
			<form action="proses_login.php" method="POST" >
				<!-- <img src="img/logo.png"> -->
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nama Pengguna</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Kata Sandi</h5>
           		    	<input type="password" class="input" name="password">
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

