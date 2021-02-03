<?php
    //Credenciales de la Base de datos
    define('DB_USUARIO','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');
    define('DB_PUERTO','33066');
    define('DB_NOMBRE','agendacontactos');

    $conn = new mysqli(DB_HOST,DB_USUARIO,DB_PASSWORD,DB_NOMBRE,DB_PUERTO);

    echo $conn->ping();

?>