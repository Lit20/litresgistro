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
$nombre = $_POST['Nombre'];
$correo = $_POST['Correo'];
$compania = $_POST['Compañia'];
$entrega = $_POST['Visita'];
$aceptacion = isset($_POST['gender']) && $_POST['gender'] == 'yes' ? 1 : 0;

// Insertar los datos en la tabla
$sql = "INSERT INTO registros (nombre, correo, compania, entrega, aceptacion)
        VALUES ('$nombre', '$correo', '$compania', '$entrega', $aceptacion)";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>