<?php
	include 'db.php';
	if(isset($_POST['submit'])){
		$product = $_POST['product'];
		$datum = $_POST['datum'];
		$keuze = $_POST['keuze'];

		if($keuze){
			$sql = $conn->prepare("DELETE FROM promoties WHERE product_id = $product");
			$sql->execute();
		}else{
			$sql = $conn->prepare("INSERT INTO promoties (datum, product_id) VALUES(?,?)");
			$sql->bind_param('si', $datum, $product);
			$sql->execute();
		}

	header("location:bijwerken.php");


	}


?>