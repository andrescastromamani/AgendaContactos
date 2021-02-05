<?php

    function obtenerContactos(){
        include('bdconexion.php');
        try {
            return $conn->query("SELECT * FROM contactos");
        } catch (Exception $e) {
            echo "Error!!".$e->getMessage()."<br>";
        }
    }

    function obtenerContacto($id){
        include('bdconexion.php');
        try {
            return $conn->query("SELECT * FROM contactos WHERE id='$id'");
        } catch (Exception $e) {
            echo "Error!!".$e->getMessage()."<br>";
        }
    }

?>