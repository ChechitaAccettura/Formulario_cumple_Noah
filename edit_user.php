<?php 

include('connection.php');
$con = connection();

$id = $_POST['id'];
$name = $_POST['name'];  //los nombres de las varibles tiene que ser los mismos que los de las columnas de la tabla
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$evento = $_POST['evento'];
$date = $_POST['date'];
$time = $_POST['time'];
$colors = $_POST['colors'];
$comments = $_POST['comments'];


$sql = "UPDATE encuesta_usuarios SET name='$name', phone='$phone', mail='$mail', evento='$evento', date='$date', time='$time', colors='$colors', comments='$comments' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query) {
    Header("Location: index.php");
};


?>