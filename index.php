<?php
include('connection.php');
$con = connection();

// Primera consulta
$sql = "SELECT * FROM encuesta_usuarios";// despues del FROM va el nombre de la tabla
$query = mysqli_query($con, $sql);

// Segunda consulta
$sql2 = "SELECT * FROM fotos";
$r = mysqli_query($con, $sql2);  //son dos consultas porque son dos tablas diferentes. 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="static/ardea-transparente-sintexto.png">
    <script src="https://kit.fontawesome.com/020c2b5f5e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Formulario para usuarios</title>
</head>
<body>
    <header>
        <img class="logo" src="static/ardea-transparente-sintexto.png" alt="logo1">
        <h2 class="marca">ARdea <span class="atelier">Atelier Web</span></h2>
    </header>
    <aside>
        <a href="https://wa.me/5492235258303?text=¡Hola!%20Necesito%20ayuda%20con%20el%20formulario%20clientes." target=_blank class="whatsapp"> <i class="fa-brands fa-square-whatsapp"></i></a>
    </aside>
    <div>
        <form class="formulario_cuerpo"   action="insert_encuesta.php" method="POST">  <!--action= archivo // method="post"  porque actualiza datos -->
        <h1 class="titulo">Encuesta para Usuarios</h1>
            <label for="name" class="form-label">Nombre y apellido</label>
            <input class="form-control" type="text" name="name" placeholder="Escribí tu Nombre" required>

            <label for=phone"" class="form-label">Teléfono de contacto</label>
            <input class="form-control" type="number" name="phone" placeholder="Teléfono (sólo números)" required>

            <label for="mail" class="form-label">E-mail</label>
            <input class="form-control" type="text" name="mail" placeholder="Correo electrónico" required>

            <label for="evento" class="form-label">¿Qué tipo de evento estás organizando?</label>
            <input class="form-control" type="text" name="evento" placeholder="¿Qué celebramos? Cumple... boda.. XV" required>


            <label for="date" class="form-label">¿Cuándo será?</label>
            <input class="form-control" type="date" name="date" required>


            <label for="time" class="form-label">¿A qué hora?</label>
            <input class="form-control" type="time" name="time" required>

            <label for="colors" class="form-label">Escribí colores o temática de la invitación. Puede incluir personajes, deportes, lo que quieras.</label>
            <input class="form-control" type="text" name="colors" placeholder="Colores preferidos" required>

            <label for="comments" class="form-label">Dejá comentarios acerca del estilo. Más formal, más divertido, qué te gustaría. </label>
            <input class="form-control" type="text" name="comments" placeholder="Comentarios" required>

            <input class="form-control" type="submit" value="Enviar encuesta">
        </form>


        <form class="formulario_cuerpo" action="subir_multiples.php" method="POST" enctype="multipart/form-data">
            <h1 class="titulo" >Fotos para la galería.</h1>

            <div class="mb-3">

            <label for="foto">Subí las fotos que quieras que no falten en la invitación </label>
            <br>
            <input class="form-control" type="file" name="foto[]" accept="image/*" multiple required>
            
            <!-- esta parte es para el album virtual 
            <input class="form-control" type="text" name="nombre_usuario" required placeholder="Nombre">
            <input class="form-control" type="text" name="mensaje" required placeholder="Deja un mensaje">
-->


            <button class="form-control"  type="submit">Subir foto</button>
            </div>
        </form>
    </div>

    <div>
    <div>
        <?php while($row = mysqli_fetch_array($query)): ?>
            <h2 class="titulo">Resultados</h2>  

            <div class="form-control">Tu respuesta</div>
            <div class="form-control"> <?= $row['name'] ?> </div>
            <div class="form-control"> <?= $row['phone'] ?></div>
            <div class="form-control"><?= $row['mail'] ?></div>
            <div class="form-control"><?= $row['evento'] ?></div>
            <div class="form-control"><?= $row['date'] ?></div>
            <div class="form-control"><?= $row['time'] ?></div>
            <div class="form-control"><?= $row['colors'] ?></div>
            <div class="form-control"><?= $row['comments'] ?></div>
            <div class="form-control">
                <a class="form-control" href="update.php?id=<?= $row['id'] ?>">Editar Datos</a>
                <a class="form-control" href="delete.php?id=<?= $row['id'] ?>">Eliminar Encuesta</a>
            </div>

                <?php endwhile ?>

    </div>       
        <div class="container-fluid">
                <?php

                while ($f = $r->fetch_assoc()):?>
                    <div>
                        <div class="card" >
                            <img src="uploads/<?php echo $f['fotos']; ?>"  class="rounded img-fluid img-thumbnail" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $f['id_usuario']; ?></h5>
                                <p class="card-text"> <?php echo $f['mensaje']; ?> </p>
                            </div>
                            <div class="card-footer"> 
                                <a class="form-control eliminar_foto" href="delete_foto.php?id=<?=$f['id']?>>">Eliminar Foto</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>       


        </div> 

    </div>
    <footer>     
        <div class="fila_en_footer">
        <p class="atelier_footer" >Hecho con ❤️ por</p>
        </div>
        <div class="fila_en_footer">
        <img class="logo" src="static/ardea-transparente-sintexto.png" alt="Logo">
        <p class="marca"> Ardea <span class="atelierr"> Atelier Web</span> <a href="https://www.instagram.com/ardea_atelierweb?igsh=MW5keHdjaW02d3hodw==" class="net-item" target="_blank"><i class="fa-brands fa-square-instagram"></i></a></p>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

</body>
</html>