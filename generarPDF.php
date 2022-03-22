<?php

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';

    include("formato.php");
    // Create an instance of the class:
    $mpdf = new \Mpdf\Mpdf(
    );
    $contenido = format();
    $estilo = file_get_contents('estilos.css');
    // Write some HTML code:
    $mpdf->WriteHTML($estilo, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($contenido, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output();
