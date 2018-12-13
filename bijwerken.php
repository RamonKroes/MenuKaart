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
		include 'db.php';
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
		<h1>Bestaande producten wijzigen</h1>
		<?php
			/*$query = $conn->prepare("SELECT producten.id, producten.naam, producten.omschrijving, producten.prijs, producten.img, promoties.datum, producten.special, promoties.product_id FROM producten JOIN promoties ON producten.id = promoties.product_id");*/
			$query = $conn->prepare("SELECT producten.id, producten.naam, producten.omschrijving, producten.prijs, producten.img, producten.special FROM producten");
			$query->execute();

			$result = $query->get_result();
			while ($row = $result->fetch_assoc()) {
				?>
					<form action="update.php" method="post" enctype="multipart/form-data">
						<input type="text" name="id" hidden="" value=<?php echo htmlspecialchars($row['id']); ?>>
						<p class="inp_holder">
							<label for="naam">Naam</label>
							<input type="text" name="naam" placeholder="naam" <?php echo 'value ="' . $row['naam'] . '"' ?>>
						</p>
						<p class="inp_holder">
							<label class="label_text" for="omschrijving">Omschrijving</label>
							<textarea name="omschrijving" placeholder="Typ hier uw omschrijving">
								<?php echo htmlspecialchars($row['omschrijving']); ?>
							</textarea>
						</p>
						<p class="inp_holder">
							<label for="prijs">Prijs</label>
							<input type="number" name="prijs" placeholder="10.00" step="0.01" value=<?php echo htmlspecialchars($row['prijs']);  ?>>
						</p>
						<p class="inp_holder">
							<label for="special">Special</label>
							<input type="number" name="special" placeholder="1 of 0" value=<?php echo htmlspecialchars($row['special']); ?>>
						</p>
						<div class="submit_holder">
							<input type="submit" name="submit" value="Verzenden">
						</div>
					</form>						
				<?php
			}
		?>
		<h1>Promoties wijzigen</h1>
		<?php
			$sql = $conn->prepare('SELECT * FROM producten');
			$sql->execute();

			$result = $sql->get_result();
		?>
			<form method="post" action="promoties.php">
				<p id="select_p">					
					<?php
						while($row = $result->fetch_assoc()){
							?>
							<label class="select_holder"><?php echo $row['naam'] ?>
								<input type="radio" name="product">
								<span class="checkmark"></span>
							</label>
							<?php
						}
					?>
				</p>
				<p>
					<label for="datum">datum actie</label>
					<input type="date" name="datum">					
				</p>
				<p>
					<label for="product"></label>	
					<select name="keuze">
						<option value="0">Bijvoegen</option>
						<option value="1">Alle promoties verwijderen</option>
					</select>
				</p>
				<div class="submit_holder">
					<input type="submit" name="submit" value="Verzenden">
				</div>
			</form>
		</main>
	</div>
</body>
</html>