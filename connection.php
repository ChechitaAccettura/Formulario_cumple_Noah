<?php
function connection() {

    // Detecta si es local (XAMPP)
    $isLocal = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1']);

    if ($isLocal) {
        // LOCAL
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "crud_php_usuarios";
    } else {
        // PRODUCCIÓN (HOSTINGER)
        $host = "auth-db1196.hstgr.io";
        $user = "u521052769_ardeaatelier";
        $pass = "&hg@9eqnE+HE4X=";
        $bd = "u521052769_ARdea";
    }

    $connect = mysqli_connect($host, $user, $pass, $db);

    if (!$connect) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $connect;
}
?>
