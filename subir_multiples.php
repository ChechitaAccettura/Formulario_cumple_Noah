<?php
include('connection.php');
$con = connection();

foreach ($_FILES['foto']['tmp_name'] as $key => $tmp_name) {

    // Verifica que exista un archivo
    if ($_FILES['foto']['error'][$key] === UPLOAD_ERR_OK) {

        $nombreArchivo = $_FILES['foto']['name'][$key];
        $tmp = $_FILES['foto']['tmp_name'][$key];

        // Carpeta destino
        $carpeta = "uploads/";

        // Crear carpeta si no existe
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        // Ruta final del archivo
        $rutaFinal = $carpeta . $nombreArchivo;

        // Mover archivo
        if (move_uploaded_file($tmp, $rutaFinal)) {

            // Insertar nombre en BD
            $sql = "INSERT INTO fotos (fotos) VALUES ('$nombreArchivo')";
            mysqli_query($con, $sql);

            Header("Location: index.php");
        } else {
            echo "❌ Error al mover el archivo: $nombreArchivo<br>";
        }
    }
}
?>
