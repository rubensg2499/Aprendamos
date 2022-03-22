<?php


function format()
{
    include("conexion.php");
    $id_cuestionario = $_SESSION['id_cue'];
    $consulta = $conexion->prepare("SELECT c.id_cuestionario,c.nombre,
    r.id_reactivo,r.enunciado,r.inciso_a_texto,r.inciso_b_texto,
    r.inciso_c_texto,r.inciso_d_texto, r.respuesta, u.nick_usuario,
    u.nombre as n, u.ape_pat as ap,u.ape_mat as am, m.nombre as mat FROM cuestionario c,reactivo r,
    cuestionario_reactivo cr, usuario u, materia m WHERE c.id_cuestionario=cr.id_cuestionario
    AND r.id_reactivo = cr.id_reactivo AND c.id_cuestionario=$id_cuestionario AND u.nick_usuario=c.nick_profesor
    AND m.clave=c.clave;");
    $consulta->execute();
    $registro1 =  $consulta->fetch();
    $materia = utf8_encode($registro1['mat']);
    $profesor = utf8_encode($registro1['n'].' '.$registro1['ap'].' '. $registro1['am']);
    $consulta->execute();
    $registros =  $consulta->fetchAll();
    //var_dump($registros);
    $contenido = '<body>
    <div class="cuestionario">
        <div class="imagenes">
            <div class="izquierda">
                <img src="images/tit.png" alt="UNISTMO" width="100%" height="">
            </div>
        </div>
        <div class="datos-cuestionario">
            <p>Asignatura: ';
    $contenido.=$materia;
    $contenido.='</p>
            <p>Profesor: ';
    $contenido.=$profesor;
    $contenido.='</p><p>Nombre del alumno:</p>
        </div>
        <div class="preguntas">';
    $i=1;
    foreach ($registros as $registro) {
        $enunciado = utf8_encode($registro['enunciado']);
        $a = utf8_encode($registro['inciso_a_texto']);
        $b = utf8_encode($registro['inciso_b_texto']);
        $c = utf8_encode($registro['inciso_c_texto']);
        $d = utf8_encode($registro['inciso_d_texto']);
        $contenido.="<div class='pregunta'>
            <p>$i.-$enunciado</p>
                <ul type='a'>
                <li>$a</li>
                <li>$b</li>
                <li>$c</li>
                <li>$d</li>
                </ul>
            </div>";
        $i++;
    }
    $contenido.='</div>
    </div>
</body>';

    return $contenido;
}
