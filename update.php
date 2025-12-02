<?php 
include('connection.php');
$con = connection();

$id=$_GET['id']; //obtiene el id del registro que se quiere modificar

$sql = "SELECT * FROM encuesta_usuarios WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = $row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Editar Encuesta</title>
</head>
<body>
    <div>
        <h1 class="titulo">Editá los datos que consideres necesarios </h1>
        <form class="formulario_cuerpo" action="edit_user.php" method="POST">
            <input class="form-control" type="hidden" name="id" value="<?= $row['id'] ?>">
            <input class="form-control" type="text" name="name" value="<?= $row['name'] ?>">
            <input class="form-control" type="number" name="phone" value="<?= $row['phone'] ?>">
            <input class="form-control" type="text" name="mail" value="<?= $row['mail'] ?>">
            <input class="form-control" type="text" name="evento" value="<?= $row['evento'] ?>">
            <input class="form-control" type="date" name="date" value="<?= $row['date'] ?>">
            <input class="form-control" type="time" name="time" value="<?= $row['time'] ?>">
            <input class="form-control" type="text" name="colors" value="<?= $row['colors'] ?>">
            <input class="form-control" type="text" name="comments" value="<?= $row['comments'] ?>">


            <input class="form-control" type="submit" value="Actualizar Información">
        </form>
    </div>
</body>
</html>