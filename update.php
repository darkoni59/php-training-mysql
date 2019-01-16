<?php

$username="root";
$servername="localhost";
$password="";
$dbname="reunion_island";


$conn=new mysqli($servername,$username,$password);

if ($conn->connect_error){
die("connection failed:".$conn->connect_error);

}else {
$conn->select_db($dbname);

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Changer une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>modifier</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?= $_GET['name']  ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
                <option selected="selected"><?= $_GET['difficulty']  ?></option>
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>

			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?= $_GET['distance'] ?> ">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?= $_GET['duration']   ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $_GET['height_difference'] ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>



<?php

$id = (isset($_POST['id']) ? $_POST['id'] : null);
$id=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$name=(isset($_POST['name'])?$_POST['name']:null);
$name=filter_var($name,FILTER_SANITIZE_STRING);
$duration=(isset($_POST['duration'])?$_POST['duration']:null);
$duration=filter_var($duration,FILTER_SANITIZE_STRING);
$height_difference=(isset($_POST['height_difference'])?$_POST['height_difference']:null);
$height_difference=filter_var($height_difference,FILTER_SANITIZE_STRING);
$distance=(isset($_POST['distance'])?$_POST['distance']:null);
$distance=filter_var($height_difference,FILTER_SANITIZE_NUMBER_INT);
$difficulty=(isset($_POST['difficulty'])?$_POST['difficulty']:null);
$difficulty=filter_var($difficulty,FILTER_SANITIZE_STRING);

echo $id;


function update($id,$name,$duration,$height_difference,$distance,$difficulty){
    global $conn;



    $sql="UPDATE `hiking` set `name`='$name',`duration`='$duration',`height_difference`='$height_difference',`distance`='$distance',`difficulty`='$difficulty' WHERE `id`='$id'";


    $conn->query($sql);


}


if(isset( $_POST['id'])) {
    update($id,$name,$duration,$height_difference,$distance,$difficulty);
}



