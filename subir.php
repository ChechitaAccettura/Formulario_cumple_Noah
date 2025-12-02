<?php
include('connection.php');
$con = connection();

// nombre del archivo
$id = null;
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$mensaje = $_POST['mensaje'];

// carpeta donde se guardan
$carpeta = "uploads/";

if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

move_uploaded_file($tmp, $carpeta.$foto);

// guardar solo el nombre del archivo en la base
$usuario = $_POST["nombre_usuario"];

$sql = "INSERT INTO fotos (id, id_usuario, fotos, mensaje) VALUES ('$id', '$usuario', '$foto', '$mensaje')";
$query = mysqli_query($con, $sql);


if ($query) {
    echo "Foto subida correctamente ❤️";
    Header("Location: index.php");
} else {
    echo "Error al guardar la foto 😢: " . mysqli_error($con);
    Header("Location: index.php");
}


?>

