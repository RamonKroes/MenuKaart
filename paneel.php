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
		<?php require('header.php'); ?>
		<main>
			<?php 
			if(isset($_SESSION['active']) && $_SESSION['active'] === 1){	
				?>
				<h1>Producten inzetten</h1>
				<form action="verwerk.php" method="post" enctype="multipart/form-data">
					<p>
						<label for="naam">Naam</label>
						<input type="text" name="naam" placeholder="naam">
					</p>
					<p>
						<label for="omschrijving">Omschrijving</label>
						<textarea name="omschrijving" placeholder="Typ hier uw omschrijving"></textarea>
					</p>
					<p>
						<label for="prijs">Prijs</label>
						<input type="number" name="prijs" placeholder="10.00" step="0.01">
					</p>
					<p>
						<label for="special">Special</label>
						<input type="number" name="special" placeholder="1 of 0">
					</p>
					<p>
						<label for="promotie">Promotie op dagen</label>
						<input type="date" name="promotie">
					</p>
					<p>
						<label for="img">Illustratie</label>
						<input type="file" name="img">
					</p>
					<input type="submit" name="submit" value="Verzend">
				</form>		
				<a href="uitloggen.php?stat=1">Uitloggen</a>
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