<?php
include('connection.php');
$con = connection();

$id = null;
$name = $_POST['name'];  //los nombres de las varibles tiene que ser los mismos que los de las columnas de la tabla
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$evento = $_POST['evento'];
$date = $_POST['date'];
$time = $_POST['time'];
$colors = $_POST['colors'];
$comments = $_POST['comments'];


$sql = "INSERT INTO encuesta_usuarios VALUES ('$id', '$name', '$phone', '$mail', '$evento', '$date', '$time', '$colors', '$comments' )";
$query = mysqli_query($con, $sql);

if($query) {
    Header("Location: index.php");
};

?>

