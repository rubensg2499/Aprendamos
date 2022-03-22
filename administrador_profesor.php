<?php

    session_start();
    if (isset($_SESSION['usuario'])) {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=aplicacion_web', 'root', '');

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql="SELECT AES_DECRYPT(nick_usuario,'llave') AS nick_usuario,grado_maximo_estudios, cvu,nombre, ape_pat,ape_mat FROM usuario,profesor WHERE
                    AES_DECRYPT(nick_usuario,'llave') = AES_DECRYPT(nick_profesor,'llave') AND estado = 1";

            $statement = $conexion->prepare($sql);

            $statement->execute();

            $registro = $statement->fetchAll();

            $sql2="SELECT AES_DECRYPT(nick_usuario,'llave') AS nick_usuario,grado_maximo_estudios,
             cvu,nombre, ape_pat,ape_mat FROM usuario,profesor WHERE
                    AES_DECRYPT(nick_usuario,'llave') = AES_DECRYPT(nick_profesor,'llave') AND estado = 0";

            $statement = $conexion->prepare($sql2);

            $statement->execute();

            $registro2 = $statement->fetchAll();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

        require "views/administrador_profesor.view.php";
    } else {
        header('Location: index.php');
        die();
    }
