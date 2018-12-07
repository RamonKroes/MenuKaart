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
	<?php
	session_start();
	include 'db.php';
	if(isset($_POST['submit'])){
		$naam = $_POST['gbnaam'];
		$mail = $_POST['mail'];
		$ww = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$stmt = $conn->prepare("INSERT INTO users(username, password, mail) VALUES(?,?,?)");
		$stmt->bind_param('sss' , $naam, $ww, $mail);
		$stmt->execute();
	}
	?>
	<main>
		<h1>Login pagina</h1>	

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
				echo $wachtwoord;
				header('location: login.php');
			}else{
				echo "verkeerde Gebruikersnaam/wachtwoord <br>";
				echo "<a href='index.php'>Terug naar de hoofdpagina</a>";
			}
			
		}else{
			if(isset($_SESSION['active'])){
				echo "U bent al ingelogd Klik hier beneden om uit te kunnen loggen <br>";
				echo "<a href='uitloggen.php?stat=1'>Uitloggen</a>";
				
			}else{
				?>
				<form action="#" method="post">
					<h1>Registreer je hier</h1>
				<div class="form_holder">
					<form action="#" method="post">
						<p class="inp_holder">
							<label class="label_inlog" for="gbnaam">Gebruikersnaam</label>
							<input class="inlog_inp" type="text" name="gbnaam">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="mail">email</label>
							<input class="inlog_inp" type="email" name="mail">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="password">Wachtwoord</label>
							<input class="inlog_inp" type="password" name="password" id="ww1">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="password">Herhaal nogmaals het Wachtwoord</label>
							<input class="inlog_inp" type="password" id="ww2">
						</p>
						<div id="ww_result"></div>
						<div class="submit_holder">
							<input type="submit" name="submit" id="submit">
						</div>
					</form>
				</div>
				</form>

				<?php
			}
		}
		?>	
	</main>
	<script type="text/javascript">
		window.onload = function(){
			var result = document.getElementById('ww_result');
			var sub = document.getElementById('submit');
			setInterval(
				function(){
					var ww1 = document.getElementById('ww1').value;
					var ww2 = document.getElementById('ww2').value;
					if(ww1.length > 0 && ww2.length > 0){						
						if(ww1 === ww2){
							sub.style.display = "block";
							result.innerHTML = "Wachtwoorden komen overeen";	
						}else{
							result.innerHTML = "Je wachtwoorden kloppen niet of de velden zijn leeg";
							sub.style.display = "none";		
						}	
					}					
				},500);
		}
	</script>
</div>
</body>
</html>