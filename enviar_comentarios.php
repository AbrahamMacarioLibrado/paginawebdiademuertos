<?php
// Configuración del correo
$destinatario = "mala081206hmccbba7@soycecytem.mx"; // REEMPLAZA con tu correo
$asunto = "Nuevo comentario - Página Día de Muertos";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$calificacion = $_POST['calificacion'];
$comentarios = $_POST['comentarios'];
$como_nos_conocio = $_POST['como_nos_conocio'];

// Validar datos
if(empty($nombre) || empty($email) || empty($calificacion) || empty($comentarios)) {
    echo "error";
    exit;
}

// Construir el mensaje
$mensaje = "Has recibido un nuevo comentario desde la página del Día de Muertos:\n\n";
$mensaje .= "Nombre: " . htmlspecialchars($nombre) . "\n";
$mensaje .= "Email: " . htmlspecialchars($email) . "\n";
$mensaje .= "Calificación: " . htmlspecialchars($calificacion) . "\n";
$mensaje .= "Comentarios: " . htmlspecialchars($comentarios) . "\n";
$mensaje .= "Cómo nos conoció: " . htmlspecialchars($como_nos_conocio) . "\n\n";
$mensaje .= "Fecha: " . date('d/m/Y H:i:s');

// Cabeceras del correo
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviar el correo
if(mail($destinatario, $asunto, $mensaje, $headers)) {
    echo "success";
} else {
    echo "error";
}
?>
