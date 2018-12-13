<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menukaart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php
		session_start();
		include 'db.php';
		?>
		<main>
			<?php

			if(isset($_POST['submit'])){
				$query = $conn->prepare("SELECT * FROM users WHERE username = ?");
				$query->bind_param('s', $gbnaam);

				$gbnaam = $_POST['gbnaam'];
				$ww = $_POST['password'];

				if($query->execute()){
					
				}
				$result = $query->get_result();

				while($row = $result->fetch_assoc()){
					$wachtwoord = $row['password'];
					$rol = $row['role'];
				}
				
				if(password_verify($ww, $wachtwoord)){
					$_SESSION['active'] = $rol;
					header('location: paneel.php');
				}else{
					echo "verkeerde Gebruikersnaam/wachtwoord <br>";
					echo "<a href='index.php'>Terug naar de hoofdpagina</a>";
				}

			}else{
				if(isset($_SESSION['active'])){
					header("location:paneel.php");
				}else{
					?>
					<h1>Login pagina</h1>	
					<div class="form_holder">
						<form action="#" method="post">
							<p class="inp_holder">
								<label class="label_inlog" for="gbnaam">Gebruikersnaam</label>
								<input class="inlog_inp" type="text" name="gbnaam">
							</p>
							<p class="inp_holder">
								<label class="label_inlog" for="password">Wachtwoord</label>
								<input class="inlog_inp" type="password" name="password">
							</p>
							<div class="submit_holder">
								<input type="submit" name="submit">
							</div>								
						</form>
						<div class="form_link">
							<a href="register.php">Nog geen account?</a>
						</div>
					</div>

					<?php
				}
			}
			?>	
		</main>
	</div>
</body>
</html>