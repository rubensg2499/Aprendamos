<?php

    session_start();
    include("conexion.php");
    //echo $_SESSION['id'];
    $cadena = (string)$_SESSION['id2'];
    //echo $cadena;
    $var1 = 0;
    $id_cuest='';
    $id_alumno = '';
    for ($i=0;$i<strlen($cadena);$i++) {
        if ($cadena[$i]!=' ') {
            $id_cuest.=$cadena[$i];
            $var1++;
        } else {
            break;
        }
    }
    for ($i=($var1+1);$i<strlen($cadena);$i++) {
        $id_alumno.=$cadena[$i];
    }

    $consulta = $conexion->prepare("UPDATE alumno_solicita_cuestionario
    SET estado='Denegado' where nick_alumno = AES_ENCRYPT('$id_alumno','llave')
    AND id_cuestionario=$id_cuest");
    $consulta->execute();

    header("Location: profesor_avisos.php");
