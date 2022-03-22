<?php

include("conexion.php");
include("php-mailer/enviar-mail.php");
$banderaMsg = '';
$llave = 'llave';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        //Primera validación: insertar una pregunta válida
        if ($_POST['pregunta'] != 0) {
            $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
            $pregunta = filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING);
            $respuesta = filter_var($_POST['respuesta'], FILTER_SANITIZE_STRING);
            echo $usuario;
            $statement = $conexion->prepare("SELECT nick_usuario, tipo, estado FROM
      usuario WHERE nick_usuario = AES_ENCRYPT('$usuario','$llave')");
            $statement->execute();
            $resultado = $statement->fetch();
            //var_dump($resultado);
            //Segunda validación: validar que el usuario esté dado de alta
            if ($resultado != false) {
                //Tercera validación: los usuario deshabilitados no pueden recuperar su contraseña porque
                //de cualquier forma no pueden acceder a la aplicación
                if ($resultado['estado'] == 0) {
                    $banderaMsg = 'usuarioInhabilitado';
                } else {
                    if ($resultado['tipo'] == 'alumno') {
                        $statement2 = $conexion->prepare("SELECT AES_DECRYPT(nick_usuario,'$llave') as nick_usuario, AES_DECRYPT(pass,'$llave') as pass, nombre, correo, pregunta_seguridad, respuesta_pregunta
            FROM usuario, alumno WHERE nick_usuario = nick_alumno AND nick_usuario = AES_ENCRYPT('$usuario','$llave')");
                        $statement2->execute();
                        $resultado2 = $statement2->fetch();
                    } else {
                        $statement2 = $conexion->prepare("SELECT AES_DECRYPT(nick_usuario,'$llave') as nick_usuario, AES_DECRYPT(pass,'$llave') as pass, nombre, correo, pregunta_seguridad, respuesta_pregunta
            FROM usuario, profesor WHERE nick_usuario = nick_profesor AND nick_usuario = AES_ENCRYPT('$usuario','$llave')");
                        $statement2->execute();
                        $resultado2 = $statement2->fetch();
                    }
                    if ($resultado2 != false) {
                        //Cuarta validación: validar si la pregunta insertada es la asociada con la cuenta
                        if ($pregunta == $resultado2['pregunta_seguridad']) {
                            //Quinta validación: validar si la respuesta es la asociada con la cuenta
                            if ($respuesta == $resultado2['respuesta_pregunta']) {
                                $banderaMsg = enviar_correo(
                                    $resultado2['correo'],
                                    $resultado2['nombre'],
                                    $resultado2['nick_usuario'],
                                    $resultado2['pass']
                                );
                            } else {
                                $banderaMsg = 'respIncorrecta';
                            }
                        } else {
                            $banderaMsg = 'pregIncorrecta';
                        }
                    }
                }
            } else {
                $banderaMsg = 'usuarioInvalido';
            }
        } else {
            $banderaMsg = 'pregNovalida';
        }
    }
}

require "views/recuperar_contrasena.view.php";
