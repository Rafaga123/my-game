<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_registro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$sql = "INSERT INTO usuarios (nombre, apellido, correo, usuario, password) VALUES ('$nombre', '$apellido', '$correo', '$usuario', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
    header("Location: login.html"); 
} else {
    echo "Error: " . $sql . " " . $conn->error;
}

$conn->close();
?>
