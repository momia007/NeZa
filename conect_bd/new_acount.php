<?php
echo "Se ejecutó hasta aquí.";
$Dni = $_POST['dni'];
$Nom = $_POST['nombres'];
$Apell = $_POST['apellido'];
$Tel = $_POST['telefono'];
$Func = $_POST['funcion'];
$Act = $_POST[1]; // Esto puede necesitar corrección si estás intentando obtener otro valor.
$Fecha_A = $_POST['fecha_a'];
$Fecha_B = $_POST[empty]; // Esto debe ser corregido para obtener el valor correcto.
$User = $_POST['user'];
$Pass = $_POST['password'];
$F_nac = $_POST['F_nac'];
$Tutor = $_POST['tutor'];

if (
    isset($_POST['dni']) && !empty($_POST['dni']) &&
    isset($_POST['nombres']) && !empty($_POST['nombres']) &&
    isset($_POST['apellido']) && !empty($_POST['apellido']) &&
    isset($_POST['telefono']) && !empty($_POST['telefono']) &&
    isset($_POST['funcion']) && !empty($_POST['funcion']) &&
    isset($_POST['fecha_a']) && !empty($_POST['fecha_a']) &&
    isset($_POST['F_nac']) && !empty($_POST['F_nac'])
) {
    // Conexión a la base de datos usando mysqli
    $mysqli = new mysqli("localhost", "root", "02chi08", "gscout-233");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("No se pudo conectar a la Base de datos: " . $mysqli->connect_error);
    }

    // Escapar y validar los datos antes de usarlos en la consulta SQL
    $Dni = $mysqli->real_escape_string($Dni);
    $Nom = $mysqli->real_escape_string($Nom);
    $Apell = $mysqli->real_escape_string($Apell);
    $Tel = $mysqli->real_escape_string($Tel);
    $Func = $mysqli->real_escape_string($Func);
    $Act = $mysqli->real_escape_string($Act);
    $Fecha_A = $mysqli->real_escape_string($Fecha_A);
    $Fecha_B = $mysqli->real_escape_string($Fecha_B);
    $User = $mysqli->real_escape_string($User);
    $Pass = $mysqli->real_escape_string($Pass);
    $F_nac = $mysqli->real_escape_string($F_nac);
    $Tutor = $mysqli->real_escape_string($Tutor);

    // Consulta SQL
    $query = "INSERT INTO users (DNI, Nombre, Apellido, Telefono, Funcion, Activo, Fecha_A, Fecha_B, User, Password, F_nac, Tutor) 
              VALUES ('$Dni', '$Nom', '$Apell', '$Tel', '$Func', '$Act', '$Fecha_A', '$Fecha_B', '$User', '$Pass', '$F_nac', '$Tutor')";

    if ($mysqli->query($query) === TRUE) {
        echo "Datos enviados correctamente";
    } else {
        echo "Error en guardar el registro: " . $mysqli->error;
    }

    // Cerrar la conexión
    $mysqli->close();
} else {
    echo "Error en guardar el registro: Campos requeridos no completados.";
}
?>

