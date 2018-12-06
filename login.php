<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Menukaart</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php
		session_start();
		?>
		<main>
			<h1>Login pagina</h1>	

			<?php
			if(isset($_POST['submit'])){

				$query = $conn->prepare("SELECT * FROM users WHERE username = ?");
				$query->bind_param('s', $gbnaam);

				$gbnaam = $_POST['gbnaam'];
				$ww = $_POST['password'];

				$query->execute();
				$result = $query->get_result();

				while($row = $result->fetch_assoc()){
					echo $row['username'];
					echo $row['password'];

					$wachtwoord = $row['password'];
				}
				if($ww === $wachtwoord){
					$_SESSION['active'] = 1;
				}

			}else{
				if(isset($_SESSION['active'])){
					echo $_SESSION['active'];
					echo "ingelogd";
				}else{
					?>
					<form action="#" method="post">
						<p class="inp_holder">
							<label class="label_inlog" for="gbnaam">Gebruikersnaam</label>
							<input class="inlog_inp" type="text" name="gbnaam">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="password">Wachtwoord</label>
							<input class="inlog_inp" type="password" name="password">
						</p>
						<input type="submit" name="submit">
					</form>



					<?php
				}
			}
			?>
		</main>
	</div>
</body>
</html>