<?php
$username="root";
$servername="localhost";
$password="";
$dbname="reunion_island";

$conn=new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8','root','');

$conn=new mysqli($servername,$username,$password);
if ($conn->connect_error){
die("connection failed:".$conn->connect_error);
}else {
    $conn->select_db($dbname);

    $sql = 'SELECT * FROM hiking';
    $result = $conn->query($sql);

    ?>


    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Randonnées</title>
        <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
    <h1>Liste des randonnées</h1><hr>
    <table>

        <td id="id">id</td>
        <td id="nom">nom</td>
        <td id="diff">Difficulté</td>
        <td id="distance">distance</td>
        <td id="durée">durée</td>
        <td id="déni">Dénivelé</td>
        <a href="create.php"> ajouter une randonnée</a>
        <?php
        while ($row = $result->fetch_assoc()) {
            $val0 = $row['id'];
            $val1 = $row['name'];
            $val2 = $row['difficulty'];
            $val3 = $row['distance'];
            $val4 = $row['duration'];
            $val5 = $row['height_difference'];


            ?>

            <tr>

                <td> <?= $row['id'] ?></td>

                <td><a href="delete.php?id=<?=$val0?>">supprimer</a> <a href="update.php?name=<?=$val1 ?>&amp;difficulty=<?= $val2 ?>&amp;distance=<?= $val3 ?>&amp;duration=<?= $val4 ?>&amp;height_difference=<?= $val5 ?>&amp;id=<?= $val0 ?>"> <?= $row['name']  ?>
                    </a>
                </td>

                <td><?= $row['difficulty'] ?></td>

                <td><?= $row['distance'] ?></td>

                <td><?= $row['duration'] ?></td>

                <td><?= $row['height_difference'] ?></td>
            </tr>

            <?php
        }
        ?>


    </table>

    </body>
    </html>

    <?php
}