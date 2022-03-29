<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');
} catch (PDOException $e) {
    echo "Error:" . $e->getMessage();
}
