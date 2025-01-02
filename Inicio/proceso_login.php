<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_registro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}

$usuario = isset( $_POST['usuario'] ) ? $_POST['usuario'] :'';
$password = isset( $_POST['password'] ) ? $_POST['password'] :'';

$sql = "SELECT password FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($stmt->num_rows>0){
    $stmt->bind_result($stored_password);
    $stmt->fetch();

    if ($password == $stored_password){
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: ../Menu/Mainmenu.html");
        exit();
    } else {
        echo "Contraseña incorrecta";
    } 
} else {
    echo "Usuario no encontrado"; 
}
$stmt->close();
$conn->close();
?>
