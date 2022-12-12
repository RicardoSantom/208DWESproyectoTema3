<!DOCTYPE html>
<html lang="en">
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
        <title>Ejercicio 03.php</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 03.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Mostrar en tu página index la fecha y hora actual formateada en castellano.</h3>
                <h4>Fecha establecida con date.timezone</h4>
                <?php
                //formato date.
                //estableciendo zona horaria.
                ini_set('date.timezone', 'Europe/Madrid');
                echo "<p>La fechay hora locales son = " . date("d-m-Y H:i:s A</p>");
                date_default_timezone_set("Europe/Madrid");
                echo "<h4>Salida formateada de hora en Madrid establecida como objeto datetime.</h4>";
                //Construcción objeto DateTime.
                $oFechaActualMadrid = new DateTime("now", new DateTimeZone("Europe/Madrid"));
                printf("<p>La fecha mostrada a continuación es de tipo %s y está contenida en la variable %s  %s", gettype($oFechaActualMadrid), '$oFechaActualMadrid', ".</p>");
                print("<p>Mostrando con datetime un objeto de tipo DateTime con la fecha y hora local en Madrid  : " . $oFechaActualMadrid->format("l, j F Y H:i:s </p>"));
                //Dando formato como string al objeto datetime.
                echo "<h4>Salida convertida en cadena de hora en Madrid establecida anteriormente como objeto datetime.</h4>";
                $sFechaActualMadrid = $oFechaActualMadrid->format("l, j F Y H:i:s");
                printf("<p>La fecha mostrada a continuación es de tipo %s y está contenida en la variable %s  %s", gettype($sFechaActualMadrid), '$sFechaActualMadrid', ".</p>");
                print("<p>Mostrando con datetime un objeto de tipo string con la fecha actual en Madrid: $sFechaActualMadrid</p>");
                //estableciendo idioma local con setlocale
                $locale = "es_ES.utf8";
                setlocale(LC_ALL, $locale);
                //preparando cadena con formato de idioma usando strftime.
                print "<h4>Salida formateada en castellano de fecha con strftime</h4>";
                $fechaFormateada = strftime("%A, %d de %B de %G %T");
                printf("<p>Mostrando con strftime la fecha actual en castellano: %s = %s %s", '$fechaFormateada', $fechaFormateada, "</p>");
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