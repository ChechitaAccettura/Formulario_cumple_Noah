<?php 
include('connection.php');
$con = connection();

$id=$_GET['id']; //obtiene el id del registro que se quiere modificar

$sql = "DELETE FROM encuesta_usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query) {
    Header("Location: index.php");
};

?>