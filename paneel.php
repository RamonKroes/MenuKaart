<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Producten toevoegen</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/beheerder.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 
			session_start();
		?>
		<header>
			<nav>
				<ul>
					<li><a href="paneel.php">paneel</a></li>
					<li><a href="bijwerken.php">bijwerken</a></li>
					<li><a href="uitloggen.php?stat=1">uitloggen</a></li>
				</ul>
			</nav>
		</header>
		<main>
			<?php 
			if(isset($_SESSION['active']) && $_SESSION['active'] == 1){	
				?>
				<h1>Producten inzetten</h1>
				<div class="form_holder">
					<form action="verwerk.php" method="post" enctype="multipart/form-data">
						<p class="inp_holder">
							<label class="label_inlog" for="naam">Naam</label>
							<input class="inlog_inp" type="text" name="naam" placeholder="naam">
						</p>
						<p class="inp_holder">
							<label class="label_inlog label_text" for="omschrijving">Omschrijving</label>
							<textarea class="text_inp" name="omschrijving" placeholder="Typ hier uw omschrijving"></textarea>
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="prijs">Prijs</label>
							<input class="inlog_inp" type="number" name="prijs" placeholder="10.00" step="0.01">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="special">Special</label>
							<input class="inlog_inp" type="number" name="special" placeholder="1 of 0">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="promotie">Promotie op dagen</label>
							<input class="inlog_inp" type="date" name="promotie">
						</p>
						<p class="inp_holder">
							<label class="label_inlog" for="img">Illustratie</label>
							<input class="inlog_inp" type="file" name="img">
						</p>
						<div class="submit_holder">
							<input type="submit" name="submit" value="Verzend">
						</div>
					</form>
					<div class="form_link">	
						<a href="uitloggen.php?stat=1">Uitloggen</a>
					</div>
				</div>
			</main>

		</div>
		<?php 
	}else{
		echo "Niet ingelogd of niet de benodigde rechten<br>";
		echo "<a href='index.php'>Terug naar de hoofdpagina</a>";
	}
	?>
</body>
</html>