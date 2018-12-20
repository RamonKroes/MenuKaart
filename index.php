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

			<section>

				<h2 class="sub-titel font">Specials</h2>

				
					<?php
						require('db.php');
						$query = $conn->prepare("SELECT producten.id, producten.naam, producten.omschrijving, producten.prijs, producten.img, producten.special FROM producten");
						$query->execute();

						$result = $query->get_result();
						while ($row = $result->fetch_assoc()) {
					?>

					<div class="image">
					<img <?php echo 'src ="' . $row['img'] . '"'?> alt="panini">

						<div class="font-awesome">
							<i class="fas fa-plus-square"></i>
						</div>
						
					<div class="info-contain font">
						<div class="info">
							<span class="type-broodje"><?php echo $row['naam'];?></span><br/>
							<span class="prijs"><?php echo $row['prijs']; ?></span><br/>
						</div>
					</div>
				</div>
				
			
					<?php
				}
				?>
				</div>
			</section>

			
		</main>

	</div>



</body>
</html>