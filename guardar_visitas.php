<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FormularioRegistro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$compania = $_POST['compania'];
$visita = $_POST['visita'];
$aceptacion = $_POST['aceptacion'];

// Insertar los datos en la tabla "visitas"
$sql = "INSERT INTO visitas (nombre, correo, compania, visita, aceptacion)
        VALUES ('$nombre', '$correo', '$compania', '$visita', '$aceptacion')";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>