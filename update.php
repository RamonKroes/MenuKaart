<?php
include 'db.php';
if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$naam = $_POST['naam'];
	$omschr = $_POST['omschrijving'];
	$prijs = $_POST['prijs'];
	$special = $_POST['special'];
	$promotie = $_POST['promotie'];


	$sql = $conn->prepare("UPDATE producten SET naam = ?, omschrijving = ?, prijs = ?, special = ? WHERE id = ?");
	$sql->bind_param('ssdii', $naam, $omschr, $prijs, $special, $id);
	$sql->execute();

	$sql2 = $conn->prepare("UPDATE promoties SET datum = ? WHERE product_id = ?");
	$sql2->bind_param('si', $promotie, $id);
	$sql2->execute();

	header('location:paneel.php');
}
?>