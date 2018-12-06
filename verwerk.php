<?php
	session_start();
	include 'db.php';

	$stmt = $conn->prepare("INSERT INTO producten(naam,omschrijving,prijs,img,special) VALUES(?,?,?,?,?)");
	$stmt->bind_param('ssdsi', $naam, $omschrijving, $prijs, $img, $special);
	
	$naam = $_POST['naam'];
	$omschrijving = $_POST['omschrijving'];
	$prijs = $_POST['prijs'];
	$img = "uploads/" . $_FILES['img']['name'];
	$special = $_POST['special'];
	$promotie = $_POST['promotie'];
	$stmt->execute();

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["img"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "Bestand is geen plaatje.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, bestand bestaat al.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["img"]["size"] > 500000) {
	    echo "Sorry, je bestand is te groot.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, alleen JPG, JPEG, PNG & GIF mogen worden toegevoegd.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Bestand is niet geupload.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
	        echo "Het plaatje". basename( $_FILES["img"]["name"]). " is toegevoegd.";	        
	    } else {
	        echo "Sorry, er is iets fout gegaan met het toeveogen van je bestand.";
	        echo "Keer terug naar de vorige pagina";
	    }
	}

	$stmtpre = $conn->prepare("SELECT id FROM producten WHERE naam = ?");
	$stmtpre->bind_param('s', $naam);
	$stmtpre->execute();

	$result = $stmtpre->get_result();
	$productid = '';
	while($row = $result->fetch_assoc()){
		$productid = $row['id'];
		echo $row['id'];
	}
	echo "dit is id" . $productid;

	$stmt2 = $conn->prepare("INSERT INTO promoties(datum, product_id) VALUES(?,?)");
	$stmt2->bind_param('si', $promotie, $productid);
	$stmt2->execute();
	header('location:paneel.php');
?>