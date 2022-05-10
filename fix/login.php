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
		<h2 class="welcome">Selamat datang di laman sistem informasi inventarisasi dan operasi aset Hotel Anara</h2>
	<div class="container">
		<div class="img">
			<img src="img/hotel.svg">
		</div>
		<div class="login-content">
			<form action="proses_login.php" method="POST" >
				<img src="img/logo.png">
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Log in" name="submit">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>

