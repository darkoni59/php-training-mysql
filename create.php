<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="get">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="tres facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="tres difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
<?php
$username="root";
$servername="localhost";
$password="";
$dbname="reunion_island";


try {
    $conn = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ' connecté ';
}
catch(PDOException $e)
    {

    }




    $name=(isset($_GET['name'])?$_GET['name']:null);
    $difficulty=(isset($_GET['difficulty'])?$_GET['difficulty']:null);
    $distance=(isset($_GET['distance'])?$_GET['distance']:null);
    $duration=(isset($_GET['duration'])?$_GET['duration']:null);
    $height_difference=(isset($_GET['height_difference'])?$_GET['height_difference']:null);



if (!empty($name)) {
    $stmt = $conn->prepare("INSERT INTO hiking(`name`,`difficulty`,`distance`,`duration`,`height_difference`)
VALUES (?,?,?,?,?) ");


    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $difficulty);
    $stmt->bindParam(3, $distance);
    $stmt->bindParam(4, $duration);
    $stmt->bindParam(5, $height_difference);
    $stmt->execute();
}





