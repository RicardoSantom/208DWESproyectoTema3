<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Ejercicio 05</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 05.php</h2>F
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h3>
                <h4>Fecha establecida con date.timezone</h4>
                <?php
                /*                 * Este es un archivo php embebido en código html que inicializa y muestra una marca
                 * de tiempo timestamp.
                 */
                include '../core/libreriaCalculadora.php';
                include '../core/libreriaFormatoCastellano.php';
                //Estableciendo zona horaria por defecto.
                date_default_timezone_set("Europe/Madrid");
                //Guardando en variable $fechaActual un objeto DateTime con el parámetro now.
                $oFechaActual = new DateTime("now");
                //Guardando con timestamp el objeto datetime en variable de tipo int.
                $enteroFechaActual = $oFechaActual->getTimestamp();
                $sFechaActual = $oFechaActual->format("l, j F Y H:i:s");
                echo "<p>La variable \$oFechaActual convertida a cadena como \$sFechaActual contiene la fecha actual= $sFechaActual "
                . " y como cadena es convertida a entero con timestamp= $enteroFechaActual<br>";
                echo "\$oFechaActual formateada = " . $oFechaActual->format('d - m - o H:i:s </p><br>');
                //Nueva variable para guardar solo la hora formateada.
                $oHoraActual = $oFechaActual->format('H:i:s ');
                printf("<p> Variable %s de tipo %s formateada = %s", '$oHoraActual', gettype($oHoraActual), $oHoraActual . "</p>");
                //Guardando en variable $fechaActualNow un objeto DateTime con el parámetro de una fecha pasada.
                $oFechaPasada = new DateTime('2000-01-01');
                //Guardando en variable string el objeto datetime $oFechaPasada.
                $sFechaPasada = $oFechaPasada->format("l, j F Y H:i:s");
                //Guardando en variable de tipo entero el objeto datetime $oFechaPasada.
                $enteroFechaPasada = date_timestamp_get($oFechaPasada);
                printf("<p>La variable %s de tipo %s y valor = %s convertida a timestamp = %s", '$oFechaPasada', gettype($oFechaPasada), $sFechaPasada, $enteroFechaPasada . "</p>");
                //restando al timestamp de  fecha actual el timestamp de la fecha pasada.
                $diferenciaFechas = $oFechaActual->diff($oFechaPasada);
                $enteroDiferenciaFechas = $diferenciaFechas->format('%R%a días');
                echo "<p>La diferencia entre la fecha actual y la pasada es de $enteroDiferenciaFechas</p>";
                //Calculando la diferencia entre timestamp como entero.
                $enteroRestaFechas = $enteroFechaActual - $enteroFechaPasada;
                echo "<p>La diferencia entre el timestamp de la fecha actual y el timestamp de la fecha pasada es de"
                . " $enteroRestaFechas</p>";
                //En desarollo la función sumaTimestampCastellano;
                /* $sFuncionSumaTimestampCastellano = sumaTimestampCastellano($oFechaActual, $enteroRestaFechas);
                  echo "<p>Prueba función sumaTimestampCastellano. Recibe la fecha actual y la diferencia entre esta y la fecha pasada= $sFuncionSumaTimestampCastellano</p>"; */
                /* Convirtiendo diferencia entre timestamp en fecha. Un tanto inútil, pero se puede hacer.
                  $diferenciaFormatoDateTime =new DateTime();
                  $timestamp1 = $enteroRestaFechas;
                  $diferenciaFormatoDateTime->setTimestamp($timestamp1);
                  $diferenciaFormatoDateTimeSalidaFormateada = $diferenciaFormatoDateTime-> format('Y-m-d H:i:s');
                  echo "<p>El valor timestamp convertido a objeto DateTime de la diferencia entre las dos fechas es =  $diferenciaFormatoDateTimeSalidaFormateada</p>"; */
                //Con formato castellano.
                //Estableciendo locale a español en España.
                $locale = "es_ES.utf8";
                //Aplicándo locale a todas las posibles variables(fecha,moneda,etc.).
                setlocale(LC_ALL, $locale);
                //preparando cadena con formato de idioma usando strftime.
                print "<h4>Salida formateada en castellano de fecha con strftime</h4>";
                $fechaFormateada = strftime("%A, %d de %B de %G %T");
                printf("<p>Mostrando con strftime la fecha actual en castellano: %s = %s y su conversion a timestamp= %s",
                        '$fechaFormateada', $fechaFormateada, $enteroFechaActual . "</p>");
                ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema3" target="blank"  class="enlaces" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">&#xE87C;</span></a>
            <a href="../indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>