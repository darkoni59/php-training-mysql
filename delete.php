<?php
/**** Supprimer une randonnée ****/
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


}


$id=$_GET['id'];
$id=filter_var($id,FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE from hiking where id=$id";
$result = $conn->query($sql);
header("location:read.php");
